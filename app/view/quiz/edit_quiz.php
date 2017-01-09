<?php
View::make('admin/includes/header');
 $quizzes=$data['quizzes'];
 $authority_id=$data['authority_id'];
 $quiz_id=$data['quiz_id'];
  // echo $examination_id;die;
 // print_r($quizzes);die;

?>
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
	<?php foreach($quizzes as $key=>$value) {?>
	<form action="<?php echo '/update_quiz/'.$authority_id.'/'.$quiz_id.'/'.$value->id ?>" method="POST" class="smart-forms">
		<h3 class="title heading">Quiz
			<span class="title-end"></span> 
			<div class="pull-right">
				
			</div>       
		</h3>
		<input type="text" name="authority_id" id="aut_id" value="<?php echo $value->authority_id; ?>"> 
		<input type="text" name="examination_id" id="examination_id" value="<?php echo $value->quiz_id?>"> 
		<input type="text" name="quiz_id" id="quiz_id" value="<?php echo $value->id?>"> 
		<div class="content_area">
			<div class="row">
				<div class="col-lg-8 col-md-10 col-sm-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0">
					<div class="row padd30">
						<div class="col-sm-12">
							<div class="section">
								<label class="field_name">Quiz Name </label>
								<label class="field">
									<input type="text" name="quiz_name" placeholder="Quiz Name " value="<?php echo $value->quiz_name; ?>" class="gui-input">
								</label>
								<span style="color:red;" class="jsonerror jsonquiz_name"></span>
							</div>
						</div>
						<div class="section">
							<label class="field_name">Description </label>
							<label class="field">
								<textarea id="editor" class="gui-input" name="quiz_desp"><?php echo $value->quiz_desp; ?>
								</textarea>
								<!-- <script type="text/javascript">
									CKEDITOR.replace( 'quiz_desp' );
									CKEDITOR.add;           
								</script> -->
							</label>
							<span style="color:red;" class="jsonerror jsonquiz_desp"></span>

						
						</div>
					</div>
					<div class="section">
						<label class="field_name">Start Time</label>
						<label class="field">
							<input type="text" name="start_time" placeholder="Start Time" value="<?php echo $value->start_time; ?>" class="gui-input">
						</label>
						<span style="color:red;" class="jsonerror jsonstart_time"></span>
						
					</div>
					<div class="section">
						<label class="field_name">End Time </label>
						<label class="field">
							<input type="text" name="end_time" placeholder="End Time" value="<?php echo $value->end_time; ?>" class="gui-input">
						</label>
						<span style="color:red;" class="jsonerror jsonend_time"></span>
						
					</div>
					<div class="section">
						<label class="field_name">Time Duration </label>
						<label class="field">
							<input type="text" name="time_duration" placeholder="Time Duration" value="<?php echo $value->time_duration; ?>" class="gui-input">
						</label>
						<span style="color:red;" class="jsonerror jsontime_duration"></span>
					</div>
					<div class="section">
						<label class="field_name">Pass Percentage </label>
						<label class="field">
							<input type="text" name="pass_percentage" placeholder="Pass Percentage" value="<?php echo $value->pass_percentage; ?>" class="gui-input">
						</label>
						<span style="color:red;" class="jsonerror jsonpass_percentage"></span>
					</div>
					<div class="section">
						<label class="field_name">Credit</label>
						<label class="field">
							<input type="text" name="credit" placeholder="Credit" value="<?php echo $value->credit; ?>" class="gui-input">
						</label>
						<span style="color:red;" class="jsonerror jsoncredit"></span>
						
					</div>
					<div class="section">
						<label class="field_name">View Answer </label>
						<label class="field">
							<input type="radio" name="view_answer" value="1" <?php  if($value->view_answer=='1') echo 'checked'; ?>> Yes
							<br>
							<input type="radio" name="view_answer" <?php  if($value->view_answer=='0') echo 'checked'; ?>> No
						</label>
						<span style="color:red;" class="jsonerror jsonview_answer"></span>
					</div>
					<div class="section">
						<label class="field_name">Maximum Attempt </label>
						<label class="field">
							<input type="text" name="max_attempt" placeholder="Maximum Attempt" value="<?php echo $value->max_attempt; ?>" class="gui-input">
						</label>
						<span style="color:red;" class="jsonerror jsonmax_attempt"></span>
					</div>
					<div class="section">
						<label class="field_name">Correct Score </label>
						<label class="field">
							<input type="text" name="correct_score" placeholder="Correct Score" value="<?php echo $value->correct_score; ?>" class="gui-input">
						</label>
						<span style="color:red;" class="jsonerror jsoncorrect_score"></span>
					</div>
					<div class="section">
						<label class="field_name">Incorrect Score</label>
						<label class="field">
							<input type="text" name="incorrect_score" placeholder="Incorrect Score" value="<?php echo $value->incorrect_score; ?>" class="gui-input">
						</label>
						<span style="color:red;" class="jsonerror jsonincorrect_score"></span>
					</div>
					<div class="section">
						<label class="field_name">Ip Address</label>
						<label class="field">
							<input type="text" name="ip_address" placeholder="Ip Address" value="<?php echo $value->ip_address; ?>" class="gui-input">
						</label>
						<span style="color:red;" class="jsonerror jsonip_address"></span>
					</div>
					<div class="section">
						<label class="field_name">Quiz Type</label>
						<label class="field select">
							<select name="quiz_type" id="quiz_type" class="text-uppercase">
								<option value="">Salect Quiz Type</option>
								<option value="1" <?php if($value->quiz_type==1) echo 'selected'; ?>>Easy</option>
								<option value="2" <?php if($value->quiz_type==2) echo 'selected'; ?>>Medium</option>
								<option value="3" <?php if($value->quiz_type==3) echo 'selected'; ?>>Hard</option>
							</select>
							<i class="arrow double"></i> </label>
							<span style="color:red;" class="jsonerror jsonquiz_type"></span>
							
						</div>
						<div class="section">
							<label class="field_name">Camera Required</label>
							<label class="field select">
								<select name="camera_req" id="camera_req" class="text-uppercase">
									<option value="">Salect Camera</option>
									<option value="1" <?php if($value->camera_req==1) echo 'selected'; ?>>Yes</option>
									<option value="0" <?php if($value->camera_req==0) echo 'selected'; ?>>No</option>
								</select>
								<i class="arrow double"></i> </label>
								<span style="color:red;" class="jsonerror jsoncamera_req"></span>
							</div>
							<div class="section">
								<label class="field_name">Practice Test</label>
								<label class="field select">
									<select name="practice_test" id="practice_test" class="text-uppercase">
										<option value="">practice Test</option>
										<option value="0" <?php if($value->practice_test==0) echo 'selected'; ?>>Yes</option>
										<option value="1" <?php if($value->practice_test==1) echo 'selected'; ?>>No</option>
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
				<?php } ?>
				</div>
			</div>
