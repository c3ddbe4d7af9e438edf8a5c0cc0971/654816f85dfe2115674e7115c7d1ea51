<?php 
/**
* 
*/
class Users extends Model
{
	public static function login($details){
		$model=new self;
		return $model->first("SELECT a.*,b.exam_id,b.name as quiz_name,b.duration,b.total_ques,b.status as quiz_status FROM users a
			left join quizzes b on b.id=a.quiz_id
		 WHERE reference_id=:reference_id and is_login=0",array('reference_id'=>$details['reference_id']));
	}
	public static function auth(){
		if (isset($_SESSION['user'])) {
			return json_decode($_SESSION['user']);
		}
		return false;
	}

	public static function getQues($details){
		$sql="SELECT a.*,b.*,b.id as user_answer_id from questions a left join user_answers b on a.id=b.ques_id where b.user_id=:user_id and a.quiz_id=:quiz_id and b.ques_num=:ques_num";
		$model=new self;
		return $model->first($sql,array('user_id'=>$details['user_id'],'quiz_id'=>$details['quiz_id'],'ques_num'=>$details['ques_num']));
	}
	public static function updateVisited($id,$details){
		//Helper::pre($details);
		$model=new self;
		$model->sql("INSERT INTO user_logs (user_id,ques_id,ques_num,answer,mark,visited) values (:user_id,:ques_id,:ques_num,:answer,:mark,:visited)",array('user_id'=>$details['user_id'],'ques_id'=>$details['ques_id'],'ques_num'=>$details['ques_num'],'answer'=>$details['answer'],'mark'=>$details['mark'],'visited'=>1));

		return $model->update("UPDATE user_answers set visited=1 where id=:id",array('id'=>$id));
	}

	public static function insertQues($details){
		$model=new self;
		$sql="SELECT * FROM questions where quiz_id=:quiz_id order by rand()";
		$result=$model->select($sql,array('quiz_id'=>$details['quiz_id']));
		$sql=Self::make_insert($details,$result);
		$d=$model->sql_insert($sql);
		if($d!==false){
			$u=$model->update("UPDATE users set is_start=1 where id=:id and quiz_id=:quiz_id",array('id'=>$details['user_id'],'quiz_id'=>$details['quiz_id']));
			return $u;
		}
		return false;
		
	}

	public static function getStatus($details){
		return (new self)->first("SELECT is_start from users where id=:id",array('id'=>$details['user_id']))->is_start;
	}

	private static function make_insert($details,$result){
		$sql="INSERT INTO user_answers (user_id,ques_id,ques_num,answer,mark) values";
		foreach ($result as $key => $value) {
			$sql.="(".$details['user_id'].",".$value->id.",".($key+1).",''".",''"."),";
		}
		$sql=rtrim($sql,',');
		return $sql;
	}
	public static function getRes($details){
		return (new self)->SELECT("SELECT b.*,a.id as q_id FROM questions a
		 left join user_answers b on b.ques_id=a.id and b.user_id=:user_id where a.quiz_id=:quiz_id order by b.ques_num asc",array('user_id'=>$details['user_id'],'quiz_id'=>$details['quiz_id']));
	}

	public static function postMark($id){
		$model=new self;
		$user=self::auth();
		$ures=$model->first("SELECT * FROM user_ques WHERE user_id=? AND ques_id=?",[$user->id,$id]);
		if ($ures) {
			return true;
		}
		return $model->insert(['user_id'=>$user->id,'ques_id'=>$id,'marked'=>1],'user_ques');
	}
	public static function postSave($details){
		$model=new self;
		$model->sql("INSERT INTO user_logs (user_id,ques_id,ques_num,answer,mark) values (:user_id,:ques_id,:ques_num,:answer,:mark)",$details);

		return $model->sql("INSERT INTO user_answers (user_id,ques_id,ques_num,answer,mark) values (:user_id,:ques_id,:ques_num,:answer,:mark) ON DUPLICATE KEY UPDATE answer=:answer,mark=:mark",$details);
	}
	public static function submit($details){
		return (new self)->update("UPDATE users SET completed=1 WHERE id=:id and quiz_id=:quiz_id",array('id'=>$details['user_id'],'quiz_id'=>$details['quiz_id']));
	}
	public static function getInstruction ($id){
		return (new self)->select("SELECT * FROM instructions where quiz_id=:quiz_id",array('quiz_id'=>'1'));
	}

	private static function get_ans($details){
		$user_ans= (new self)->select("SELECT * FROM user_answers where user_id=:user_id",array('user_id'=>$details['user_id']));
		return $user_ans;
	}

	private static function set_in($details){
		$in='(';
		foreach ($details as $key => $value) {
			$in.=$value->ques_id.',';
		}
		return rtrim($in,',').')';
		
	}


	public static function completed($details){
		$model=new self;
		return $model->update("UPDATE users set completed=1 where id=:id and quiz_id=:quiz_id",array('id'=>$details['user_id'],'quiz_id'=>$details['quiz_id']));
	}
	public static function is_login($details){
		$model=new self;
		return $model->update("UPDATE users set is_login=1 where id=:id and quiz_id=:quiz_id",array('id'=>$details['user_id'],'quiz_id'=>$details['quiz_id']));
	}


	public static function user_details($id){
		return (new self)->select("SELECT * from users where id=:id",array('id'=>$id));
	}
}
?>