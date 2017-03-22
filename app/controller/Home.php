<?php 
/**
* 
*/
class Home
{
	
	public function __construct(){
		if (!isset($_SESSION['user'])) {
			header('location:/login');
			die;
		}
	}

	public function getHome(){
		$details=Input::get(array('type'));
		$user=Users::auth();
		$details['quiz_id']=$user->quiz_id;
		$details['user_id']=$user->id;
		$res=Users::getRes($details);
		$language=Users::getLang($details);
		//return View::make('res',['res'=>$res,'user'=>$user]);
		$user=Users::auth();
		$data=Users::getInstruction($user->quiz_id);
		return View::make('ins',['res'=>$res,'instruction'=>$data,'user'=>$user,'language'=>$language,'user_details'=>Users::user_details()]);
	}

	public function getProfile(){
		$details=Input::get(array('type'));
		$user=Users::auth();
		$details['quiz_id']=$user->quiz_id;
		$details['user_id']=$user->id;
		$res=Users::getRes($details);
		//return View::make('res',['res'=>$res,'user'=>$user]);
		$user=Users::auth();
		//$data=Users::getInstruction($user->quiz_id);
		return View::make('profile',['res'=>$res,'user'=>$user,'user_details'=>Users::user_details()]);
	}
	public function getTest(){
		$user=Users::auth();
		$user_details=Users::user_details($user->id);
		$last_ques=Users::getLastquest($user);
		if($user_details->is_start=='0'){
			header('location:/');die();
		}
		return View::make('test',['user'=>$user,'last_ques'=>$last_ques]);
	}
	public function insertQues(){
		$user=Users::auth();
		$_SESSION['start_time']=time();
		$details['quiz_id']=$user->quiz_id;
		$details['user_id']=$user->id;
		if(!Users::getStatus($details)){
			$ques=Users::insertQues($details);
			$is_login=Users::is_login($details);
		}else{
			$ques=true;
		}
		return Json::make('1','inserted',$ques)->response();
	}

	public function getQues($id){
		$user=Users::auth();
		$details['quiz_id']=$user->quiz_id;
		$details['user_id']=$user->id;
		$details['ques_num']=$id;
		$ques=Helper::format_ques(Users::getQues($details));
		$language=Users::getLang($details);
		Users::updateVisited($ques->user_answer_id,(array)$ques);
		return View::make('ques',['ques'=>$ques,'user'=>$user,'language'=>$language]);
	}
	public function getRes(){
		$details=Input::get(array('type'));
		$user=Users::auth();
		$details['quiz_id']=$user->quiz_id;
		$details['user_id']=$user->id;
		$res=Users::getRes($details);
		return View::make('res',['res'=>$res,'user'=>$user]);
	}

	public function postMark($id){
		if (Users::postMark($id)) {
			return Json::make('1','Success')->response();
		}
		return Json::make('0','Error')->response();
	}

	public function postSave(){
		$details=Input::post(array('answer','ques_id','mark','ques_num'));
		$details['user_id']=Users::auth()->id;
		if (Users::postSave($details)) {
			return Json::make('1','Success')->response();
		}
		return Json::make('0','Error')->response();
	}
/*	public function getSubmit_old(){
		$res=Users::getRes();
		$user=Users::auth();
		if (Input::get('submit')=='1') {
			Users::submit();
			header('location:/submit?submit=2');
			die;
		}
		if (Input::get('submit')=='2') {
			return View::make('submits');	
		}
		return View::make('submits',['res'=>$res,'user'=>$user]);
	}*/

	public function getSubmit(){
		session_destroy();
		$user=Users::auth();
		$details['quiz_id']=$user->quiz_id;
		$details['user_id']=$user->id;
		Users::submit($details);
		return View::make('submits',array('user'=>$user));
	}

	public function alertSubmit(){
		$user=Users::auth();
		$details['quiz_id']=$user->quiz_id;
		$details['user_id']=$user->id;
		$data=Users::alert_submit($details);
		if(false!==$data){
			return Json::make('1','details are',$data)->response();
		}
		return Json::make('0','Server Error')->response();
	}

	public function langSubmit(){
		$details=Input::post(array('language'));
		$user=Users::auth();
		$details['quiz_id']=$user->quiz_id;
		$details['user_id']=$user->id;
		$data=Users::langSubmit($details);
		if(false!==$data){
			return Json::make('1','details are',$details['language'])->response();
		}
		return Json::make('0','Server Error')->response();
	}
}
?>