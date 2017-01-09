<?php
View::make('admin/includes/header');
$authority_id=$data['authority_id'];
$quiz_id=$data['quiz_id'];
//print_r($authority_id); die;
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
		<form class="smart-forms" action="/post_quiz/<?php echo $authority_id.'/'.$quiz_id?>" method="POST" id="add_quiz">
		<h3 class="title heading">Quiz
			<span class="title-end"></span> 
			<div class="pull-right">
				<a class="btn btn-primary" href=""> Back</a>
			</div>       
		</h3>
		<input type="text" name="authority_id" value="<?php echo $authority_id; ?>"> 
		<input type="text" name="quiz_id" value="<?php echo $quiz_id; ?>"> 
		<div class="content_area">
			<div class="row">
				<div class="col-lg-8 col-md-10 col-sm-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0">
					<div class="row padd30">
						<div class="col-sm-12">
							<div class="section">
								<label class="field_name">Quiz Name </label>
								<label class="field">
									<input type="text" name="quiz_name" placeholder="Quiz Name " value="" class="gui-input">
								</label>
								<span style="color:red;" class="jsonerror jsonquiz_name"></span>
								
							</div>
						</div>
						<div class="section">
							<label class="field_name">Description </label>
							<label class="field">
								<textarea class="gui-input" placeholder="Description" name="quiz_desp"></textarea>

</label>
<span style="color:red;" class="jsonerror jsonquiz_desp"></span>

</div>
</div>
<div class="section">
	<label class="field_name">Start Time</label>
	<label class="field">
		<input type="text" name="start_time" placeholder="Start Time" value="" class="gui-input">
	</label>
	<span style="color:red;" class="jsonerror jsonstart_time"></span>
</div>
<div class="section">
	<label class="field_name">End Time </label>
	<label class="field">
		<input type="text" name="end_time" placeholder="End Time" value="" class="gui-input">
	</label>
	<span style="color:red;" class="jsonerror jsonend_time"></span>
</div>
<div class="section">
	<label class="field_name">Time Duration </label>
	<label class="field">
		<input type="text" name="time_duration" placeholder="Time Duration" value="" class="gui-input">
	</label>
	<span style="color:red;" class="jsonerror jsontime_duration"></span>
	
</div>
<div class="section">
	<label class="field_name">Pass Percentage </label>
	<label class="field">
		<input type="text" name="pass_percentage" placeholder="Pass Percentage" value="" class="gui-input">
	</label>
	<span style="color:red;" class="jsonerror jsonpass_percentage"></span>
	
</div>
<div class="section">
	<label class="field_name">Credit</label>
	<label class="field">
		<input type="text" name="credit" placeholder="Credit" value="" class="gui-input">
	</label>
	<span style="color:red;" class="jsonerror jsoncredit"></span>
</div>
<div class="section">
	<label class="field_name">View Answer </label>
	<label class="field">
		<input type="radio" name="view_answer" value="1"> Yes
		<br>
		<input type="radio" name="view_answer" value="0" > No
	</label>
	<span style="color:red;" class="jsonerror jsonview_answer"></span>
	
</div>
<div class="section">
	<label class="field_name">Maximum Attempt </label>
	<label class="field">
		<input type="text" name="max_attempt" placeholder="Maximum Attempt" value="" class="gui-input">
	</label>
	<span style="color:red;" class="jsonerror jsonmax_attempt"></span>
	
</div>
<div class="section">
	<label class="field_name">Correct Score </label>
	<label class="field">
		<input type="text" name="correct_score" placeholder="Correct Score" value="" class="gui-input">
	</label>
	<span style="color:red;" class="jsonerror jsoncorrect_score"></span>
	
</div>
<div class="section">
	<label class="field_name">Incorrect Score</label>
	<label class="field">
		<input type="text" name="incorrect_score" placeholder="Incorrect Score" value="" class="gui-input">
	</label>
	<span style="color:red;" class="jsonerror jsonincorrect_score"></span>
</div>
<div class="section">
	<label class="field_name">Ip Address</label>
	<label class="field">
		<input type="text" name="ip_address" placeholder="Ip Address" value="" class="gui-input">
	</label>
	<span style="color:red;" class="jsonerror jsonip_address"></span>
</div>
<div class="section">
	<label class="field_name">Quiz Type</label>
	<label class="field select">
		<select name="quiz_type" id="quiz_type" class="text-uppercase">
			<option value="">Select Quiz Type</option>
			<option value="1">Easy</option>
			<option value="2">Medium</option>
			<option value="3">Hard</option>
		</select>
		<i class="arrow double"></i> </label>
		<span style="color:red;" class="jsonerror jsonquiz_type"></span>
	</div>
	<div class="section">
		<label class="field_name">Camera Required</label>
		<label class="field select">
			<select name="camera_req" id="camera_req" class="text-uppercase">
				<option value="">Select Camera</option>
				<option value="1">Yes</option>
				<option value="2">No</option>
			</select>
			<i class="arrow double"></i> </label>
			<span style="color:red;" class="jsonerror jsoncamera_req"></span>
		</div>
		<div class="section">
			<label class="field_name">Practice Test</label>
			<label class="field select">
				<select name="practice_test" id="practice_test" class="text-uppercase">
					<option value="">practice Test</option>
					<option value="1">Yes</option>
					<option value="2">No</option>
				</select>
				<i class="arrow double"></i> </label>
				<span style="color:red;" class="jsonerror jsonpractice_test"></span>
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
            $("#add_quiz").validate({
             
                rules: {
                    quiz_name: "required",
                    quiz_desp: "required",
                    start_time:"required",
                    end_time: "required",
                    time_duration:"required",
                    credit:  "required",
                    pass_percentage:"required",
                    view_answer:
                    {
                    	required:true,
                    },
                    max_attempt:"required",
                    correct_score:"required",
                    incorrect_score:"required",
                    ip_address:"required",
                    quiz_type:"required",
                    camera_req:"required",
                    practice_test:"required",
                },
                messages: {
                    quiz_name: "Please enter your quiz name",
                    quiz_desp: "Please enter the quiz description",
                    start_time: "Please enter the start time",
                    end_time:   " Please enter the end time",
                    time_duration:"Please enter the time duration",
                    credit:  "Please enter the credit",
                    pass_percentage:"Please enter the pass percentage",
                    view_answer:{
                    	required:"Please select the view answer"
                    },
                    max_attempt:    "Please enter the max attempt",
                    correct_score: "Please enter the correct score",
                    incorrect_score: "Please enter the incorrect score",
                    ip_address :     "Please enter the ip address",   
                    quiz_type:     "Please enter the quiz type",
                    camera_req:   "Please enter the  camera required",
                    practice_test: "Please enter the practice test",

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