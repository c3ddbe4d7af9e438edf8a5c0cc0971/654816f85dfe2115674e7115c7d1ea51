<?php 
/**
* 
*/
class Quizzes extends Model
{

	public static function add_quiz($authority_id,$quiz_id,$details)
	{
		$model 					= new self;
		$authority_id 			= $authority_id;
		$quiz_id 				= $quiz_id;
		$quiz_name 				= $details['quiz_name'];
		$quiz_desp 				= $details['quiz_desp'];
		$start_time 			= $details['start_time'];
		$end_time 				= $details['end_time'];
		$time_duration 			= $details['time_duration'];
		$pass_percentage 		= $details['pass_percentage'];
		$credit 				= $details['credit'];
		$view_answer 			= $details['view_answer'];
		$max_attempt 			= $details['max_attempt'];
		$correct_score 			= $details['correct_score'];
		$incorrect_score 		= $details['incorrect_score'];
		$quiz_type 				= $details['quiz_type'];
		$ip_address 			= $details['ip_address'];
		$camera_req 			= $details['camera_req'];
		$practice_test 			= $details['practice_test'];
		$current_date 			= date("Y-m-d H:i:s");
		return $model->insert([
			'quiz_name' 	=> $quiz_name,
			'quiz_desp' 	=> $quiz_desp,
			'start_time' 	=> $start_time,
			'end_time' 		=> $end_time,
			'time_duration' => $time_duration,
			'pass_percentage'=>$pass_percentage,
			'authority_id' 	=> $authority_id,
			'quiz_id'       => $quiz_id,
			'credit' 		=> $credit,
			'credit' 		=> $credit,
			'view_answer'   => $view_answer, 
			'max_attempt'   => $max_attempt,
			'correct_score' => $correct_score,
			'incorrect_score'=>$incorrect_score,
			'quiz_type'     => $quiz_type,
			'ip_address'    => $ip_address, 
			'camera_req' 	=> $camera_req,
			'practice_test' => $practice_test,
			'created_at'    => $current_date, 
			'updated_at'    => $current_date],
			'quizzes');
	}
	public static function quiz_list($authority_id,$quiz_id){
		$model=new self;
		$quizzes=$model->SELECT("SELECT * FROM quizzes WHERE authority_id=$authority_id AND quiz_id=$quiz_id ORDER BY id ASC");
		if($quizzes)
		{
			return $quizzes; die;
		}
		else
		{
			return 'null';
		}
	}
public static function get_single_quiz($quiz_id)
{
	$model=new self;
		$quizzes=$model->SELECT("SELECT * FROM 	quizzes WHERE id=$quiz_id LIMIT 1");
		
		return $quizzes;
}
public static function updatesingle_quiz($details,$authority_id,$quiz_id,$quiz_id)
{
	$model=new self;
		$quiz_name 			= $details['quiz_name'];
	    $quiz_desp          = $details['quiz_desp'];
		$start_time	  		= $details['start_time'];
		$end_time	  		= $details['end_time'];
		$time_duration	  	= $details['time_duration'];
		$pass_percentage	= $details['pass_percentage'];
		$credit	  			= $details['credit'];
		$view_answer	  	= $details['view_answer'];
		$max_attempt	  	= $details['max_attempt'];
		$correct_score	  	= $details['correct_score'];
		$incorrect_score	= $details['incorrect_score'];
		$quiz_type	  		= $details['quiz_type'];
		$ip_address	  		= $details['ip_address'];
		$camera_req	  		= $details['camera_req'];
		$practice_test	  	= $details['practice_test'];
		

		// echo $quiz_name;die;
		$quiz=$model->UPDATE("UPDATE quizzes SET quiz_name=?,quiz_desp=?,start_time=?,end_time=?,time_duration=?,pass_percentage=?,credit=?,view_answer=?,max_attempt=?,correct_score=?,incorrect_score=?,quiz_type=?,ip_address=?,camera_req=?,practice_test=? WHERE id=?",[$quiz_name,$quiz_desp,$start_time,$end_time,$time_duration,$pass_percentage,$credit,$view_answer,$max_attempt,$correct_score,$incorrect_score,$quiz_type,$ip_address,$camera_req,$practice_test,$quiz_id]);
		return $quiz;

}
public static function delete_quiz($authority_id,$examination_id,$quiz_id)
{
	$model=new self;
		$quiz=$model->DELETE("DELETE FROM quizzes WHERE id=?",[$quiz_id]);
		return $quiz;
}

	
}
?>