<?php
View::make('admin/includes/header');
$authority_id=$data['authority_id'];
?>
<style type="text/css">
  label.error {
    color: #FB3A3A;
    display: inline-block;
    /*margin: 4px 0 5px 125px;*/
    padding: 0;
    text-align: left;
    width: 220px;
}
</style>
<div class="container">
<div class="row">
  <div class="col-sm-10 col-sm-offset-1">
  <form class="smart-forms" action="/post_examination" method="post" id="add_examination">
  <input type="text" name="authority_id" value="<?php echo $authority_id; ?>">
    <h3 class="title heading">Examinations
      <span class="title-end"></span> 
      <div class="pull-right">
      </div>       
    </h3>
    <div class="content_area">
      <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0">
          <div class="row padd30">
            <div class="col-sm-12">
              <div class="section">
                <label class="field_name">Test Name </label>
                <label class="field">
                  <input type="text" name="examination_name" placeholder="Test Name" value="" class="gui-input">
                </label>
                </div>
            </div>
            <div class="col-sm-12">
              <div class="section">
                <label class="field_name">Test Description </label>
                <label class="field">
                  <textarea name="examination_desc" placeholder="Test Desc" value="" class="gui-input"></textarea>
                </label>
                </div>
            </div>
           <div class="col-sm-12">
              <div class="section">
                <label class="field_name">No of  Questions </label>
                <label class="field">
                   <input type="text" name="no_of_ques" placeholder="No Of Questions" value="" class="gui-input">
                </label>
                <span style="color:red;" class="jsonerror jsonaut_desp"></span>
               
              </div>
            </div> 

            <div class="col-sm-12">
              <div class="section">
                <label class="field_name">Time  </label>
                <label class="field">
                   <input type="text" name="time_duration" placeholder="time" value="" class="gui-input">
                </label>
                <span style="color:red;" class="jsonerror jsonaut_desp"></span>
               
              </div>
            </div> 
          </div>
        </div>
      </div>
      <div class="text-center marB20">
        <input type="submit" class="btn btn-primary" value="Submit">	
      </div>
    </div>	
   </form>
  </div>
</div>
</div>

<script type="text/javascript">
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#add_examination").validate({
             
                rules: {
                    examination_name: "required",
                    no_of_ques:{
                      required: true,
                        number: true
                      },
                      time_duration:"required",
                },
                messages: {
                    examination_name: "Please enter your authority name",
                    no_of_ques:{
                      required: "Please enter no of Questions",
                        number: "Please enter number only"
                    },
                    time_duration:"Please enter the time duration"
                    
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);
</script>