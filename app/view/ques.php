<?php 

//Helper::pre($data['language']);die();
$ques=$data['ques'];
$arra=array();
$arra['option1']=$ques->{$ques->opt1};
$arra['option2']=$ques->{$ques->opt2};
$arra['option3']=$ques->{$ques->opt3};
$arra['option4']=$ques->{$ques->opt4};

$ques->option1=$arra['option1'];
$ques->option2=$arra['option2'];
$ques->option3=$arra['option3'];
$ques->option4=$arra['option4'];


$arra['h_option1']=$ques->{'h_'.$ques->opt1};
$arra['h_option2']=$ques->{'h_'.$ques->opt2};
$arra['h_option3']=$ques->{'h_'.$ques->opt3};
$arra['h_option4']=$ques->{'h_'.$ques->opt4};

$ques->h_option1=$arra['h_option1'];
$ques->h_option2=$arra['h_option2'];
$ques->h_option3=$arra['h_option3'];
$ques->h_option4=$arra['h_option4'];
$user=$data['user'];
$is_last='0';
if($ques->ques_num==$user->total_ques){
  $is_last='1';
}
?>
<div class="ques" data-id="<?=$ques->ques_num?>" data-last="<?=$is_last?>" data-ques_num="<?=$ques->ques_num?>">
<div class="question_type">
  <div class="lang" style="margin-bottom: 5px;text-align:right;">
    <select>
      <option value="1" <?=$data['language']=='1'?'selected':''?>>English</option>
      <option value="2" <?=$data['language']=='2'?'selected':''?>>Hindi</option>
    </select>
  </div>
  <div class="left" style="height:385px;">
  <p class="heading_custom"> Question Type - Objective</p>

  <p style="text-align: justify;" class="heading_custom1 hindi <?=$data['language']=='2'?'show':'hide'?>"> <?php if($ques->h_passage =='') {?> <?=$ques->passage ?><?php } else {?> <?=$ques->h_passage ?> <?php }?></p>
  <p style="text-align: justify;" class="heading_custom1 english <?=$data['language']=='1'?'show':'hide'?>"> <?=$ques->passage?></p>

  <p class="heading_custom2"> Question no.<span id="ques_num"><?=$ques->ques_num?></span></p>
<!-- </div> -->


<ul class="questions">
  <div class="hindi <?=$data['language']=='2'?'show':'hide'?>"><?=$ques->h_question?></div>
  <div class="english <?=$data['language']=='1'?'show':'hide'?>"><?=$ques->question?></div>
  <form class="rest">
  <p style="margin-top: 10px" class="hindi <?=$data['language']=='2'?'show':'hide'?>"><b>विकल्प</b></p>
  <p style="margin-top: 10px" class="english <?=$data['language']=='1'?'show':'hide'?>"><b>Options</b></p>
    A. <input type="radio" class="nameres" name="answer" <?=$ques->answer=='1'?'checked':''?> value='1'> <div style="margin-left: 35px; margin-top:-20px;" class="hindi <?=$data['language']=='2'?'show':'hide'?>"><?=$ques->h_option1?></div> <div style="margin-left: 35px; margin-top:-20px;" class="english marginl35 <?=$data['language']=='1'?'show':'hide'?>"><?=$ques->option1?></div> <br>
    B. <input type="radio" class="nameres" name="answer" <?=$ques->answer=='2'?'checked':''?> value='2'> <div style="margin-left: 35px; margin-top:-20px;" class="hindi <?=$data['language']=='2'?'show':'hide'?>"><?=$ques->h_option2?></div> <div style="margin-left: 35px; margin-top:-20px; " class="english marginl35 <?=$data['language']=='1'?'show':'hide'?>"><?=$ques->option2?></div> <br>
    C. <input type="radio" class="nameres" name="answer" <?=$ques->answer=='3'?'checked':''?> value='3'> <div style="margin-left: 35px; margin-top:-20px;" class="hindi <?=$data['language']=='2'?'show':'hide'?>"><?=$ques->h_option3?></div> <div style="margin-left: 35px; margin-top:-20px;" class="english marginl35 <?=$data['language']=='1'?'show':'hide'?>"><?=$ques->option3?></div> <br>
    D. <input type="radio" class="nameres" name="answer" <?=$ques->answer=='4'?'checked':''?> value='4'> <div style="margin-left: 35px; margin-top:-20px;" class="hindi <?=$data['language']=='2'?'show':'hide'?>"><?=$ques->h_option4?></div> <div style="margin-left: 35px; margin-top:-20px;" class="english marginl35 <?=$data['language']=='1'?'show':'hide'?>"><?=$ques->option4?></div> <br>
    <input type="hidden" name="ques_num" value="<?=$ques->ques_num?>">
    <input type="hidden" name="ques_id" value="<?=$ques->ques_id?>">
  </form>
</ul>
</div>
<div class="row response_bar">
  <a href="javascript:void(0)"><div class="col-md-3 col-xs-12 custom_default_btn mrn"> Mark for Review & Next</div></a>

  <a href="javascript:void(0)"><div class="col-md-3 col-xs-12 custom_default_btn mrns"> Answer and Review & Next</div></a>

  <a href="javascript:void(0)"><div class="col-md-2 col-xs-12 custom_default_btn clr">Clear response</div></a>
  <a href="javascript:void(0)"><div data-is_last="<?=$is_last?>" class="col-md-2 col-xs-12 custom_default_btn sn">Save & Next</div></a>
</div>
</div>