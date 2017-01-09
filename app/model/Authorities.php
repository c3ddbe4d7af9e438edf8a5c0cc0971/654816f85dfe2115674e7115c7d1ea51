<?php 
/**
* 
*/
class Authorities extends Model
{
	
	public static function getAuthorities(){
		$model=new self;
		$authorities=$model->SELECT("SELECT * FROM authorities");
		
		return $authorities;
	}

	public static function add_authority($details)
	{
		$model=new self;
		$authority_name = $details['authority_name'];
		$current_date = date("Y-m-d H:i:s");
		return $model->insert(['authority_name'=>$authority_name,'created_at'=>$current_date,'updated_at'=>$current_date],'authorities');
	}

	public static function authority_list(){
		$model=new self;
		$authorities=$model->SELECT("SELECT * FROM authorities ORDER BY id DESC");
		
		return $authorities;
	}

	public static function get_single_authority($id){
		$model=new self;
		$authorities=$model->SELECT("SELECT * FROM authorities WHERE id=$id LIMIT 1");
		
		return $authorities;
	}

	public static function updatesingle_authority($details,$id){
		$model=new self;
		$authority_name = $details['authority_name'];
		$authority=$model->UPDATE("UPDATE authorities SET authority_name=?  WHERE id=?",[$authority_name,$id]);
		return $authority;
	}

	public static function delete_authority($id){
		$model=new self;
		$authority=$model->DELETE("DELETE FROM authorities WHERE id=?",[$id]);
		return $authority;
	}

	
}
?>