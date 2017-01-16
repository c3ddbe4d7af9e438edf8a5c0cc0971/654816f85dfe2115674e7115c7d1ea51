<?php 
$ques=$data['ques'];
//Helper::pre($ques);
$arra=array();
$arra['option1']=$ques->{$ques->opt1};
$arra['option2']=$ques->{$ques->opt2};
$arra['option3']=$ques->{$ques->opt3};
$arra['option4']=$ques->{$ques->opt4};
$ques->option1=$arra['option1'];
$ques->option2=$arra['option2'];
$ques->option3=$arra['option3'];
$ques->option4=$arra['option4'];
$user=$data['user'];
$is_last='0';
if($ques->ques_num==$user->total_ques){
  $is_last='1';
}
?>
<div class="ques" data-id="<?=$ques->ques_num?>" data-last="<?=$is_last?>" data-ques_num="<?=$ques->ques_num?>">
<div class="question_type">
  <p class="heading_custom"> Question Type - Objective</p>
  <p class="heading_custom2"> Question no.<span id="ques_num"><?=$ques->ques_num?></span></p>
</div>

<ul class="questions">
  <?=$ques->question?>
  <form id="rest">
  <!-- <p>Options</p> -->
    <input type="radio" class="nameres" name="answer" <?=$ques->answer==$ques->option1?'checked':''?> value="<?=$ques->option1?>"> <?=$ques->option1?><br>
    <input type="radio" class="nameres" name="answer" <?=$ques->answer==$ques->option2?'checked':''?> value="<?=$ques->option2?>"> <?=$ques->option2?><br>
    <input type="radio" class="nameres" name="answer" <?=$ques->answer==$ques->option3?'checked':''?> value="<?=$ques->option3?>"> <?=$ques->option3?><br>
    <input type="radio" class="nameres" name="answer" <?=$ques->answer==$ques->option4?'checked':''?> value="<?=$ques->option4?>"> <?=$ques->option4?><br>
    <input type="hidden" name="ques_num" value="<?=$ques->ques_num?>">
    <input type="hidden" name="ques_id" value="<?=$ques->ques_id?>">
  </form>
</ul>
<div class="row response_bar">
  <a href="javascript:void(0)"><div class="col-md-3 col-xs-12 custom_default_btn mrn"> Mark for Review & Next</div></a>

  <a href="javascript:void(0)"><div class="col-md-3 col-xs-12 custom_default_btn mrns"> Answer and Review & Next</div></a>

  <a href="javascript:void(0)"><div class="col-md-2 col-xs-12 custom_default_btn clr">Clear response</div></a>
  <a href="javascript:void(0)"><div data-is_last="<?=$is_last?>" class="col-md-2 col-xs-12 custom_default_btn sn">Save & Next</div></a>
</div>
</div>