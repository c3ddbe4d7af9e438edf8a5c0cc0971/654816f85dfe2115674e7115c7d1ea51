<?php
View::make('admin/includes/header');
?>

      <div class="container">
	  	<div class="row">
      		<div class="col-sm-10 col-sm-offset-1">
			  		<form class="smart-forms">
			 			<h3 class="title heading">Create User
							<span class="title-end"></span>        
					     </h3>
						 <div class="content_area">
				 	    <div class="row">
			  			  <div class="col-lg-8 col-md-10 col-sm-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0">
				 			 <div class="row padd30">
					 		    <div class="col-sm-6">
								  <div class="section">
										<label class="field_name">Name </label>
										<label class="field">
											<input type="text" placeholder="" class="gui-input">
										</label>
									</div>
									
								  <div class="section">
										<label class="field_name">Phone </label>
										<label class="field">
											<input type="text" placeholder="" class="gui-input">
										</label>
									</div>
															  
						 		  <div class="section">
							<label class="field_name">Designation</label>
							<label class="field select">
								<select>
								  <option value=""></option>
								  <option value="Actor">Actor</option>
								  <option value="Dancer">Dancer</option>
								  <option value="Singer">Singer</option>
								  <option value="Comedian">Comedian</option>
								  <option value="Cartoonist">Cartoonist</option>
								  <option value="Writer">Writer</option>
								</select>
								<i class="arrow double"></i> 
							</label>  
						  </div>	
					            </div>
					  			<div class="col-sm-6">
								  <div class="section">
									<label class="field_name">Email </label>
									<label class="field">
										<input type="text" placeholder="" class="gui-input">
									</label>
								  </div>
								  
								  <div class="section">
									<label class="field_name">Department</label>
										<label class="field select">
											<select>
												<option value="">Health</option>
												<option value="">Education</option>
												<option value="">Envorment</option>
											</select>
											<i class="arrow double"></i>                            
										</label>  
								  </div>
								  <div class="section">
									<label class="field_name"> Account Type </label>
										<label class="field select">
											<select>
												<option value="">Health</option>
												<option value="">Education</option>
												<option value="">Envorment</option>
											</select>
											<i class="arrow double"></i>                            
										</label>  
								  </div>
					  </div>
				 			 </div>
							
			  			 </div>
				 	   </div>
					 	<div class="text-center marB20">
					  	   <button type="button" class="btn btn-primary"> Submit </button>	
						</div>
					   </div><!--content-area end--> 	
				   </form>
				
      		</div>
	  	</div>
      </div><!--container end-->
   
    <script src="js/jquery.min.js"></script> 
    <script src="js/bootstrap.min.js"></script> 
   
  </body>
</html>