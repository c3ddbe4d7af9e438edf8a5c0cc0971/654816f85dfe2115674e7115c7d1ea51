<?php
View::make('admin/includes/header');
$authority=$data['authority'];

//echo '<pre>';print_r($authority); echo '<pre>';
?>
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
	 <?php foreach($authority as $key => $value) { ?>
	<form action="<?php echo '/update_authority/'.$value->id ?>" method="POST" class="smart-forms">
		<h3 class="title heading">Authorities
			<span class="title-end"></span> 
			<div class="pull-right">
			</div>       
		</h3>

		<input type="text" name="authority_id" id="authority_id" value="<?php echo $value->id ?>">
		<div class="content_area">
			<div class="row">
				<div class="col-lg-8 col-md-10 col-sm-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0">
					<div class="row padd30">
						<div class="col-sm-12">
							<div class="section">
							
								<label class="field_name">Authority Name </label>
								<label class="field">
									<input type="text" name="authority_name" placeholder="Authority Name" value="<?php echo $value->authority_name; ?>" class="gui-input">
								</label>
								<span style="color:red;" class="jsonerror jsonaut_name"></span>
							</div>
							
							
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