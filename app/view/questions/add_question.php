<?php
View::make('admin/includes/header');
// $examinations=$data['examinations'];
$authority_id  =  $data['authority_id'];
$quiz_id       =  $data['quiz_id'];
$quiz_id       =  $data['quiz_id'];
?>
<div class="container">
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
      <form class="smart-forms" action="/post_question/<?php echo $authority_id.'/'.$quiz_id.'/'.$quiz_id?>" method="POST">
        <div class="content_area">
          <h3 class="binsy_question"> Add new Question </h3>
          <div class="row">
            <div class="col-lg-10 col-md-10 col-sm-12 col-lg-offset-01 col-md-offset-1 col-sm-offset-0">
              <div class="row padd30">
                <div class="col-sm-10 col-sm-offset-1">
                  <input type="text" name="authority_id" value="<?php echo $authority_id; ?>"> 
                  <input type="text" name="examination_id" value="<?php echo $quiz_id; ?>">
                  <input type="text" name="quiz_id" value="<?php echo $quiz_id; ?>">
                  <div class="section">
                    <label class="field_name">Questions</label>
                    <label class="field">
                      <textarea id="editor" class="gui-input" name="question"></textarea>
<!-- <script type="text/javascript">
CKEDITOR.replace( 'ques_eng' );
CKEDITOR.add;           
</script> -->
</label>
</div>
<div class="section">
  <label class="field_name">Option 1</label>
  <label class="field">
    <input type="radio" id="radiobtn" value="1" name="correct_ans_english" selected="selected" >
    <textarea id="optionEng1" class="gui-input" name="option1"></textarea>
  </label>
  <span style="color:red;" class="jsonerror jsonoptionEng1"></span>
</div>
<div class="section">
  <label class="field_name">Option 2</label>
  <label class="field">
    <input type="radio" id="radiobtn" value="2" name="correct_ans_english" selected="selected" >
    <textarea id="optionEng2" class="gui-input" name="option2"></textarea>
  </label>
  <span style="color:red;" class="jsonerror jsonoptionEng2"></span>
</div>
<div class="section">
  <label class="field_name">Option 3</label>
  <label class="field">
    <input type="radio" id="radiobtn" value="3" name="correct_ans_english" selected="selected" >
    <textarea id="optionEng3" class="gui-input" name="option3"></textarea>
  </label>
</div>
<div class="section">
  <label class="field_name">Option 4</label>
  <label class="field">
    <input type="radio" id="radiobtn" value="4" name="correct_ans_english" selected="selected" >
    <textarea id="optionEng4" class="gui-input" name="option4"></textarea>
  </label>
</div>
</div>
</div>
</div>
</div>
<div class="text-center marB20">
  <button type="submit" class="btn btn-primary btn-lg"> Submit </button>
</div>
</div>
<!--content-area end-->
</form>
</div>
</div>
</div>
</div>
