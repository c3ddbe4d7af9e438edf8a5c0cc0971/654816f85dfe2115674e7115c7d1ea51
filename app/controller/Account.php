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
		$details=Input::post(['reference_id','password']);
		$user=Users::login($details);
		if (password_verify($details['password'],$user->password)) {
			$_SESSION['user']=json_encode($user);
		}else{
			//header('location:/login?error=1');
			return View::make('login',array('is_login_error'=>'1','is_login'=>'0'));
		}
		$user_details=Users::user_details(Users::auth()->id);
		if($user_details->completed=='1'){
			header('location:/submit');die();
		}
		return View::make('login',array('is_login_error'=>'0','is_login'=>'1'));
	}
}
?>