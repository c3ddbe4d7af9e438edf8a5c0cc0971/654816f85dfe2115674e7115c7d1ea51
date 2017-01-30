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
			header('location:/login?error=1');
			die;
		}
		$user_details=Users::user_details(Users::auth()->id);
		if($user_details->completed=='1'){
			header('location:/submit');die();
		}
		header('location:/');
	}
}
?>