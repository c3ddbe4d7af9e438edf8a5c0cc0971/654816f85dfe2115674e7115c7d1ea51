<?php
/**
* 
*/
class Helper
{
	
	public static function pre($arr)
	{
		echo "<pre>";
		print_r($arr);
		echo "</pre>";
		//die();
	}
	public static function unique($id){
		$replace=array('a','b','c','d','e','f','g','h','i','j','k');
		$time=time().$id;
		$time[0]=$replace[0];
		$time[1]=$replace[1];
		$time[1]=$replace[1];
		$time[5]=$replace[5];
		echo $time;
	}
	public static function make_set(Array $details, Array $escape=array()){
		$set='';
		foreach ($details as $key => $value) {
			if (!in_array($key, $escape)) {
				$set.=$key.'=:'.$key.',';
			}
		}
		return rtrim($set,',');
	}

	public static function format_ques($ques){
		$arra=array();
		$arra['A']=$ques->{$ques->opt1};
		$arra['B']=$ques->{$ques->opt2};
		$arra['C']=$ques->{$ques->opt3};
		$arra['D']=$ques->{$ques->opt4};

		$ques->option1=$arra['A'];
		$ques->option2=$arra['B'];
		$ques->option3=$arra['C'];
		$ques->option4=$arra['D'];


		$arra['h_A']=$ques->{'h_'.$ques->opt1};
		$arra['h_B']=$ques->{'h_'.$ques->opt2};
		$arra['h_C']=$ques->{'h_'.$ques->opt3};
		$arra['h_D']=$ques->{'h_'.$ques->opt4};

		$ques->h_option1=$arra['h_A'];
		$ques->h_option2=$arra['h_B'];
		$ques->h_option3=$arra['h_C'];
		$ques->h_option4=$arra['h_D'];
		return $ques;
	}

	
	
}
?>