<?php 
/**
* 
*/
class Account
{
	
	public function __construct(){
		if (isset($_SESSION['user'])) {
			header('location:/');
			die;
		}
	}

	public function getLogin(){
		return View::make('login');
	}
	public function postLogin(){
		$details 				=	Input::post(['reference_id','password']);
		$user 					=	Users::login($details);

		/*if(1){
			$dif=5min;
			$user->duraion=10;
			$user->duraion=10-dif;
		}*/
		if (sha1($details['password'])==$user->password) {
			$login_at 			=	date("d-m-Y h:i:s");
			$update_user 		=	Users::update_login_time($user->id,$login_at);
			//$update_user1 		=	Users::update_login_time_user_quizzes($user->id,$login_at);
			$_SESSION['user'] 	=	json_encode($user);
		}else{
			//header('location:/login?error=1');
			return View::make('login',array('is_login_error'=>'1','is_login'=>'0'));
		}
		$user_details 			=	Users::user_details(Users::auth()->id);
		if($user_details->completed=='1'){
			header('location:/submit');die();
		}
		return View::make('login',array('is_login_error'=>'0','is_login'=>'1'));
	}
}
?>