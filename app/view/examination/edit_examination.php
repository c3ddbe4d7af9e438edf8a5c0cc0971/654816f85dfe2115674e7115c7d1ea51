<?php
View::make('admin/includes/header');
$examinations=$data['examinations'];
$authority_id=$data['authority_id'];
// echo '<pre>';print_r($examinations); die;
?>
<div class="row">
	<div class="col-sm-10 col-sm-offset-1" >
		<?php foreach($examinations as $key => $value) { ?>
			<form action="<?php echo '/update_examination/'.$authority_id.'/'.$value->id ?>" method="POST" class="smart-forms">
				<h3 class="title heading">Examination
					<span class="title-end"></span> 
					<div class="pull-right">
						<input type="text" name="authority_id" id="id" value="<?php echo $authority_id ?>">
						<input type="text" name="id" id="exm_id" value="<?php echo $value->id; ?> ">
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
											<input type="text" name="exmination_name" placeholder="Examination Name" value="<?php echo $value->test_name; ?>" class="gui-input">
										</label>
										<span style="color:red;" class="jsonerror jsonexm_name"></span>
									</div>
									<div class="section">
										<label class="field_name">Test Description </label>
										<label class="field">
											<textarea name="examination_desc" placeholder="Test Desc" class="gui-input"><?php echo $value->test_desc; ?></textarea>
										</label>
									</div>
									<div class="section">
										<label class="field_name">Number Of Questions </label>
										<label class="field">
											<input type="text" name="no_of_ques" placeholder="Number Of Questions" value="<?php echo $value->no_of_ques ?>" class="gui-input">
										</label>
										<span style="color:red;" class="jsonerror jsonno_of_ques"></span>
									</div>
									<div class="section">
										<label class="field_name">Time Duration </label>
										<label class="field">
											<input type="text" name="time_duration" placeholder="Time Duration" value="<?php echo $value->duration; ?>" class="gui-input">
										</label>
										<span style="color:red;" class="jsonerror jsontime_duration"></span>
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
			<?php } ?>
		</div>
	</div>
