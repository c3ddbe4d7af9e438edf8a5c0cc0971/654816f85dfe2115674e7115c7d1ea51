<?php 
/**
* 
*/
class Questions extends Model
{

	public static function add_question($authority_id,$quiz_id,$quiz_id,$details)
	 {
	 	$model 					=new self;
	 	$authority_id 			= $authority_id;
	 	$quiz_id 				= $quiz_id;
	 	$quiz_id				= $quiz_id;
	 	$question				= $details['question'];
	 	$option1 				= $details['option1'];
	 	$option2 				= $details['option2'];
	 	$option3 				= $details['option3'];
	 	$option4 				= $details['option4'];
	 	$correct_ans_english 	= $details['correct_ans_english'];
	 	return $model->insert([
	 		'question' 				=> $question,
	 		'authority_id' 			=> $authority_id,
			'quiz_id' 				=> $quiz_id,
	 		'quiz_id'				=> $quiz_id,
	 		'option1'				=> $option1,
	 		'option2'				=> $option2,
	 		'option3'				=> $option3,
	 		'option4'				=> $option4,
	 		'answer'   				=> $correct_ans_english],
	 		'ques');
	 }
	public static function question_list($authority_id,$quiz_id,$quiz_id)
	{
		$model=new self;
		$questions=$model->SELECT("SELECT * FROM ques JOIN authorities ON ques.authority_id=authorities.id JOIN tests ON tests.id=ques.quiz_id WHERE ques.authority_id=$authority_id AND ques.quiz_id=$quiz_id AND ques.quiz_id=$quiz_id");
		
		if($questions)
		{
			return $questions; die;
		}
		else
		{
			return 'null';
		}
	}

	public static function get_single_ques($ques_id)
	{
		$model=new self;
		$ques=$model->SELECT("SELECT * FROM ques WHERE id=? LIMIT 1",[$ques_id]);
		
		return $ques;
	}

	public static function post_csv_file1()
	{
		if($_FILES['import_file']['name']){
	   $arrFileName = explode('.',$_FILES['import_file']['name']);
	   if($arrFileName[1] == 'csv'){
	    $handle = fopen($_FILES['import_file']['tmp_name'], "r");
	    $row = 0;
	    
	    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
	    	$row++;
	    	if($row == 1){ $row++; continue; }
	    	 $model=new self;
	      	 $col1 = $data[0];
			 $col2 = $data[1];
			 $col3 = $data[2];
			 $col4 = $data[3];
			 $col5 = $data[4];
			 $col6 = $data[5];
			 $col7 = $data[6];
			 $col8 = $data[7];
			 $col9 = $data[8];
			 $col10 = $data[9];
			 

			 
			 $model->INSERT(['question'=>$col2,'authority_id'=>$col3,'quiz_id'=>$col4,'quiz_id'=>$col5,'option1'=>$col6,'option2'=>$col7,'option3'=>$col8,'option4'=>$col9,'answer'=>$col10],'ques');
	    
	    }
	    fclose($handle);
	    return "Import done";
	   }
	  }
	}
}