<?php 
/**
* 
*/
class Examinations extends Model
{

	public static function examination_list($authority_id){
		$model=new self;
		$examinations=$model->SELECT("SELECT * FROM tests WHERE authority_id=$authority_id ORDER BY authority_id DESC");
		if($examinations)
		{
			return $examinations; die;
		}
		else
		{
			return 'null';
		}
	}

	public static function add_examination($details)
	{
		$model=new self;
		$authority_id 		= $details['authority_id'];
		$examination_name 	= $details['examination_name'];
		$examination_desc 	= $details['examination_desc'];
		$no_of_ques 		= $details['no_of_ques'];
		$time_duration 		= $details['time_duration'];
		$current_date 		= date("Y-m-d H:i:s");
		return $model->insert(['test_name'=>$examination_name,'test_desc'=>$examination_desc,'no_of_ques'=>$no_of_ques,'duration'=>$time_duration,'authority_id'=>$authority_id,'created_at'=>$current_date,'updated_at'=>$current_date,'is_active'=>'1'],'tests');
	}
	public static  function get_single_examination($exam_id)
	{
		$model=new self;
		$examinations=$model->SELECT("SELECT * FROM tests WHERE id=$exam_id LIMIT 1");
		
		return $examinations;
	}
	public static function updatesingle_examination($details,$authority_id,$exam_id)
	{
		$model=new self;
		$examination_name 	= $details['exmination_name'];
		$examination_desc 	= $details['examination_desc'];
		$no_of_ques       	= $details['no_of_ques'];
		$time_duration	  	= $details['time_duration'];
		$examination=$model->UPDATE("UPDATE tests SET test_name=?,test_desc=?,no_of_ques=?,duration=? WHERE id=?",[$examination_name,$examination_desc,$no_of_ques,$time_duration,$exam_id]);
		return $examination;

	}
	public static function delete_examination($authority_id,$exam_id){
		$model=new self;
		$examination=$model->DELETE("DELETE FROM tests WHERE id=?",[$exam_id]);
		return $examination;
	}

	
}
?>