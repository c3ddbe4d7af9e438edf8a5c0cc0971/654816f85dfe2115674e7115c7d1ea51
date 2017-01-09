<?php 
/**
* 
*/
class AdminController
{
	
	public function __construct(){
		if (!isset($_SESSION['user'])) {
			header('location:/admin');
			die;
		}
	}

	public function adminHome(){
		return View::make('adminhome');
	}

	public function authorityList()
	{
		if($authorities=Authorities::authority_list())
		{
			return View::make('authority/authority',['authorities' => $authorities ]);
		}
	}
	public function addAuthority()
	{
		return View::make('authority/add_authority');	
	}
	public function postAuthority()
	{
		$details=Input::post(['authority_name']);
		if($authority=Authorities::add_authority($details))
		{
			
		header('location:/authority');
		}
	}
	public function editAuthority($id)
	{
		if($authority=Authorities::get_single_authority($id))
		{
			return View::make('authority/edit_authority',['authority' => $authority ]);
		}
	}

	public function updateAuthority($id)
	{
		$details=Input::post(['authority_name']);
		if($authority=Authorities::updatesingle_authority($details,$id))
		{
			//return View::make('edit_authority',['authority' => $authority ]);
			header('location:/authority');
		}
	}

	public function deleteAuthority($id)
	{
		if($authority=Authorities::delete_authority($id))
		{
			header('location:/authority');
		}
	}

	

	public function examinationList($authority_id)
	{
		if($examinations=Examinations::examination_list($authority_id))
		{
			return View::make('examination/examination',['examinations' => $examinations,'authority_id' => $authority_id ]);
		}
	}
	public function addExamination($authority_id)
	{
		return View::make('examination/add_examination',['authority_id' => $authority_id ]);	
	}
	public function postExamination()
	{
		$details=Input::post(['authority_id','examination_name','examination_desc','no_of_ques','time_duration']);

		if($examination=Examinations::add_examination($details))
		{
			
		header('location:/examination/'.$details["authority_id"]);
		}
	}
	public function editExamination($authority_id,$exam_id)
	{
		if($examinations=Examinations::get_single_examination($exam_id))
		{
			return View::make('examination/edit_examination',['examinations' => $examinations,'authority_id' => $authority_id ]);
		}
	}
	public function updateExamination($authority_id,$exam_id)
	{
		$details=Input::post(['exmination_name','examination_desc','no_of_ques','time_duration']);
		//print_r($details);die;
		if($examinations=Examinations::updatesingle_examination($details,$authority_id,$exam_id))
		{
			//return View::make('edit_authority',['authority' => $authority ]);
			header('location:/examination/'.$authority_id);
			// return "hello";
		}
	}
	public function deleteExamination($authority_id,$exam_id)
	{
		if($examination=Examinations::delete_examination($authority_id,$exam_id))
		{
			header('location:/examination/'.$authority_id);
		}
	}

	public function getQuiz($authority_id,$quiz_id)
	{
		if($quizzes=Quizzes::quiz_list($authority_id,$quiz_id))
		{
			return View::make('quiz/quiz',['quizzes' =>$quizzes,'authority_id' => $authority_id,'quiz_id' =>$quiz_id ]);
		}
	}
	public function addQuiz($authority_id,$quiz_id)
	{
		return View::make('quiz/add_quiz',['authority_id' => $authority_id,'quiz_id' =>$quiz_id ]);	
	}
	public function postQuiz($authority_id,$quiz_id)
	{
		$details=Input::post(['quiz_name','quiz_desp','start_time','end_time','time_duration','pass_percentage','credit','view_answer','max_attempt','correct_score','incorrect_score','ip_address','quiz_type','camera_req','practice_test']);

		if($quiz=Quizzes::add_quiz($authority_id,$quiz_id,$details))
		{
			
		header('location:/quiz/'.$authority_id.'/'.$quiz_id);
		}
	}

	public function editQuiz($authority_id,$quiz_id,$quiz_id)
	{
		if($quizzes=Quizzes::get_single_quiz($quiz_id))
		{
			return View::make('quiz/edit_quiz',['quizzes' => $quizzes,'authority_id' => $authority_id,'quiz_id' => $quiz_id ]);
		}
	}

	public function updateQuiz($authority_id,$quiz_id,$quiz_id)
	{
		$details=Input::post(['quiz_name','quiz_desp','start_time','end_time','time_duration','pass_percentage','credit','view_answer','max_attempt','correct_score','incorrect_score','	quiz_type','ip_address','camera_req','practice_test']);
		//print_r($details);die;
		if($quizzes=Quizzes::updatesingle_quiz($details,$authority_id,$quiz_id,$quiz_id))
		{
			//return View::make('edit_authority',['authority' => $authority ]);
			header('location:/quiz/'.$authority_id.'/'.$quiz_id);
			// return "hello";
		}
	}

	public function deleteQuiz($authority_id,$examination_id,$quiz_id)
	{
		if($quiz=Quizzes::delete_quiz($authority_id,$examination_id,$quiz_id))
		{
			header('location:/quiz/'.$authority_id.'/'.$examination_id);
		}
	}
	
	public function getQuestion_manager($authority_id,$quiz_id,$quiz_id)
	{
		if($questions=Questions::question_list($authority_id,$quiz_id,$quiz_id))
		{
		return View::make('questions/question_manager',['authority_id' => $authority_id,'quiz_id' =>$quiz_id,'quiz_id' =>$quiz_id,'questions'=>$questions ]);	
		}
	}
	public function addQuestion($authority_id,$quiz_id,$quiz_id)
	{
	   return View::make('questions/add_question',['authority_id' => $authority_id,'quiz_id' =>$quiz_id,'quiz_id' =>$quiz_id ]);	
	}
	public function postQuestion($authority_id,$quiz_id,$quiz_id)
	{
		$details=Input::post(['question','option1','option2','option3','option4','correct_ans_english']);

		if($question=Questions::add_question($authority_id,$quiz_id,$quiz_id,$details))
		{
			
		header('location:/quiz/'.$authority_id.'/'.$quiz_id);
		}
	}
	public function editQuestion($authority_id,$quiz_id,$quiz_id,$ques_id)
	{
		if($ques=Questions::get_single_ques($ques_id))
		{
			return View::make('quiz/edit_question',['ques' => $ques,'authority_id' => $authority_id,'quiz_id' => $quiz_id,'quiz_id'=>$quiz_id ]);
		}
	}
	public function upload_csv($authority_id,$quiz_id,$quiz_id)
	{
		return View::make('questions/csv',['authority_id' => $authority_id,'quiz_id' =>$quiz_id,'quiz_id' =>$quiz_id]);
	}
	public function post_csv($authority_id,$quiz_id,$quiz_id)
	{
		if($questions=Questions::post_csv_file1())
		{
		header('location:/question_manager/'.$authority_id.'/'.$quiz_id.'/'.$quiz_id);	
		}
	}
}
?>