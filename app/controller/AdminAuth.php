<?php 
/**
* 
*/
class AdminAuth
{
	public function __construct(){
		if (isset($_SESSION['user'])) {
			header('location:/admindashboard');
			die;
		}
	}
	public function getAdminLogin(){
		// return 'hello'; die;
		return View::make('adminLogin');
	}

	public function postAdminLogin()
	{

		$details=Input::post(['email','password']);
		if ($user=Admins::login($details)) 
		{

			$_SESSION['user']=json_encode($user);
			//return View::make('adminhome');
			//header('location:/admindashboard');
		}
		else
		{
			header('location:/admin?error=1');
			die;
		}
		header('location:/admindashboard');
		
	}
	
	
}
?>