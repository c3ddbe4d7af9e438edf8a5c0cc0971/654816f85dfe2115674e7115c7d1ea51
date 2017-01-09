<?php 
/**
* 
*/
class Admins extends Model
{
	public static function login($details){
		$model=new self;
		//$details['password'] = md5($details['password']);
		return $model->first("SELECT * FROM admins WHERE email=:email AND password=:password AND status='1'",$details);
	}
	public static function auth(){
		if (isset($_SESSION['user'])) {
			return json_decode($_SESSION['user']);
		}
		return false;
	}
	
}
?>