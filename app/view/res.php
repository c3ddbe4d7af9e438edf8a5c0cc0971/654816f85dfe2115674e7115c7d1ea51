<?php 
$res=$data['res'];
$user=$data['user'];
//Helper::pre($res);die();
?>

<style type="text/css">
  .ract{
    border-radius: 0;
    width: 10px;
    height: 27px;
    text-align: center;
    margin: 2% 5%;
  }
</style>
<div>
<div class="right_down">
  <!-- <h1 class="text-center">Objective Section</h1> -->
  <p><b>Question palette:</b></h1>
  <div class="row text-center numbers" style="width: 100%;height: 225px;overflow-y: scroll;overflow-x: hidden;">
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
        if (@!empty($value->answer) && @$value->mark ) {
          $color='#9fbdac';
        }
        
    ?>
    <div data-ques_num="<?=$value->ques_num?>" class="col-md-3 col-xs-3 <?=$color=='#fff'?'ract':'cirle'?> qsrn" data-color="<?=$color?>" style="background: <?=$color?>;cursor: pointer">
      <p class="digit"><?=$value->ques_num?></p>
    </div>
    <?php }
    ?>
  </div>
  <br>
  <div class="status" style="position:relative;left:-30px;">
   <div class="col-md-12 col-xs-12">
    <div class="row">
<div class="col-md-6 col-xs-12">
<div class="row">
    <div class="col-md-2 col-xs-2">
     
        <div class="col-md-12 col-xs-12 Review green">
        </div>
        </div>
         <div class="col-md-10 col-xs-10" style="margin-bottom:3px;">
        <div class="col-md-12 col-xs-12 status_text" data-type="1" style="margin-left:38px;margin-top:-23px;">
          Answered
        </div>
        </div>
        
        <div class="col-md-2 col-xs-2" style="margin-bottom:2px;">
     
        <div class="col-md-12 col-xs-12 Review cyan">
        </div>
        </div>

         <div class="col-md-10 col-xs-10">
        <div class="col-md-12 col-xs-12 status_text" data-type="3" style="margin-left:38px;margin-top:-27px;">
          Review
        </div>
        </div>
        <div class="col-md-2 col-xs-2">
     
        <div class="col-md-12 col-xs-12  Review white" style="border-radius: 0">
        </div>
        </div>

         <div class="col-md-10 col-xs-10">
        <div class="col-md-12 col-xs-12 status_text" data-type="5" style="margin-left:38px;margin-top:-27px; padding-bottom:2px;">
         Not&nbsp;Viewed
        </div>
        </div>
        </div>
        </div>

        <div class="col-md-6 col-xs-12">
 <div class="row">
    <div class="col-md-2 col-xs-2">
     
        <div class="col-md-12 col-xs-12 Review blue">
        </div>
        </div>

         <div class="col-md-10 col-xs-10">
        <div class="col-md-12 col-xs-12 status_text" data-type="2" style="margin-left:38px;margin-top:-20px; padding-bottom:2px;">
          Marked
        </div>
        </div>
        <div class="col-md-1 col-xs-1">

          <div class="col-md-12 col-xs-12 Review red">
          </div>
        </div>

        <div class="col-md-11 col-xs-11">
          <div class="col-md-12 col-xs-12 status_text" data-type="4" style="margin-left:38px;margin-top:-27px;">
           Not&nbsp;Answered
         </div>
       </div>
         <div class="col-md-1 col-xs-1">

          <div class="col-md-12 col-xs-12 Review aqua">
          </div>
        </div>

        <div class="col-md-11 col-xs-11">
          <div class="col-md-12 col-xs-12 status_text" data-type="" style="margin-left:38px;margin-top:-27px;">
           All
        </div>
        </div>
        </div>
        </div>


<div class="col-md-6 col-xs-12">
 <div class="row">
    
        </div>
        </div>
        </div>

   


        <!-- <div class="col-md-12 col-xs-12 Review cyan">
        </div>
        <div class="col-md-12 col-xs-12 Review blue">
        </div>
        <div class="col-md-12 col-xs-12 Review red">
        </div>
        <div class="col-md-12 col-xs-12 Review white" style="border-radius: 0">
        </div> -->
      </div>
    </div>
    <!-- <div class="col-md-10 col-xs-10">
      <div class="row">
        <div class="col-md-12 col-xs-12 status_text">
          Answered
        </div>
        <div class="col-md-12 col-xs-12 status_text">
          Review
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
    </div> -->
    <div class="row">
      <div class="col-md-12">
        <!-- <button type="button" class="btn btn-default cus_btn sbmt">Submit</button> -->
      </div>
    </div>
  </div>
  <!-- <div class="status">
    <div class="col-md-3 col-xs-3">
      <div class="row">
        <div class="col-md-12 col-xs-12 Review green">
        </div>
        <div class="col-md-12 col-xs-12 Review cyan" style="margin-left:150px; margin-top:-25px;">
        </div>
        <div class="col-md-12 col-xs-12 Review blue">
        </div>
        <div class="col-md-12 col-xs-12 Review red" style="margin-left:150px; margin-top:-25px;">
        </div>
        <div class="col-md-12 col-xs-12 Review white" style="border-radius: 0">
        </div>
      </div>
    </div>
    <div class="col-md-9 col-xs-9">
      <div class="row">
        <div class="col-md-12 col-xs-12 status_text">
          Answered
        </div>
        <div class="col-md-12 col-xs-12 status_text" style="margin-left:117px; margin-top:-35px;">
          Review
        </div>
        <div class="col-md-12 col-xs-12 status_text">
          Marked
        </div>
        
        <div class="col-md-12 col-xs-12 status_text" style="margin-left:112px; margin-top:-25px;">
          Not Answered
        </div>
        <div class="col-md-12 col-xs-12 status_text">
          Not Viewed
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
         <button type="button" class="btn btn-default cus_btn sbmt">Submit</button> 
      </div>
    </div>
  </div> -->
</div>
</div>