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
		if($user->is_fail==1){
			$user->duration=$user->duration-$user->prev_duration;
		}
		if (sha1($details['password'])==$user->password) {
			$login_at 			=	date("d-m-Y h:i:s");
			$update_user 		=	Users::update_login_time($user->id,$login_at);
			$_SESSION['user'] 	=	json_encode($user);
		}else{
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