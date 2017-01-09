<?php 
$res=$data['res'];
$user=$data['user'];
//Helper::pre($res);die();
?>
<div style="width: 100%;height: 500px;overflow-y: scroll;overflow-x: hidden;">
<div class="right_down">
  <h1 class="text-center">Objective Section</h1>
  <p><b>Question palette:</b></h1>
  <div class="row text-center numbers">
    <?php
    foreach ($res as $key => $value) {
        $color='#fff';
        if(@$value->visited){
          $color='#b23c45';
        }
        if(@$value->mark){
          $color='#3d78ae';
        }
        if (@$value->answer) {
          $color='#38b46c';
        }
        
    ?>
    <div data-ques_num="<?=$value->ques_num?>" class="col-md-3 col-xs-3 cirle qsrn" data-color="<?=$color?>" style="background: <?=$color?>;cursor: pointer">
      <p class="digit"><?=$value->ques_num?></p>
    </div>
    <?php }
    ?>
  </div>
  <div class="status">
    <div class="col-md-3 col-xs-3">
      <div class="row">
        <div class="col-md-12 col-xs-12 Review green">
        </div>
        <div class="col-md-12 col-xs-12 Review blue">
        </div>
        <div class="col-md-12 col-xs-12 Review red">
        </div>
        <div class="col-md-12 col-xs-12 Review white">
        </div>
      </div>
    </div>
    <div class="col-md-9 col-xs-9">
      <div class="row">
        <div class="col-md-12 col-xs-12 status_text">
          Answered
        </div>
        <div class="col-md-12 col-xs-12 status_text">
          Marked
        </div>
        
        <div class="col-md-12 col-xs-12 status_text">
          Not Answered
        </div>
        <div class="col-md-12 col-xs-12 status_text">
          Not Viewed
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <!-- <button type="button" class="btn btn-default cus_btn sbmt">Submit</button> -->
      </div>
    </div>
  </div>
</div>
</div>