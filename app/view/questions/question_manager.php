<?php
View::make('admin/includes/header');
 // $examinations=$data['examinations'];
   $authority_id 	=  $data['authority_id'];
   $quiz_id			=  $data['quiz_id'];
   $quiz_id 		=  $data['quiz_id'];
   $questions 		=  $data['questions'];
   // echo '<pre>';print_r($questions); echo '<pre>';die;
   //echo $questions['id'];die;
?>

<div class="container">
  <div class="row">
    <div class="col-sm-12">
    <input type="text" name="authority_id" value="<?php echo $authority_id; ?>"> 
		<input type="text" name="examination_id" value="<?php echo $quiz_id; ?>">
		<input type="text" name="quiz_id" value="<?php echo $quiz_id; ?>">
        <div class="content_area">
			<h4 class="add_edit"> Questions Manager </h4>
        </div>
		<table class="table table-striped binsy_table">
		  <thead>
			<tr>        
			  <th>Id</th>
			  <th>Question</th>
			  <th>Authority Name</th>
			  <th>Examination Name</th>
			  <th>Action</th>
			</tr>
		  </thead>
		  <tbody>
		  <?php if($questions!='null') { $i=0;?>
		  <?php foreach($questions as $key => $value){ ?>
			<tr>
			  <th scope="row"><?php $value->id; ?></th>
			  <td> <?php echo $value->question; ?> </td>
			  <td><?php echo $value->authority_name; ?></td>
			  <td><?php echo $value->test_name; ?></td>
			  <td style="width:150px;">
				<button type="button" class="btn btn-danger marB10"> Remove </button>
				<a href="/edit_question/<?php echo $authority_id.'/'.$quiz_id.'/'.$quiz_id.'/'.$value->id?> ">
												<button type="button" class="btn btn-info marB10"> Edit </button></a>
			  </td>
			</tr>
			<?php }?>
			<?php } else {?>
						<div class="col-xs-12 col-sm-3 col-md-3 marB20 col-sm-offset-4">
						<div class="binsy_ntpc_border"> 
							<div class="bg-primary ntpc_height">
								<h3 class="text-center"> Not Found</h3>
								<br>
								<a href="/authority"><h3 class="text-center"> Go Back</h3></a>
								
							</div>
						</div>
						<?php } ?>
			
			
			
			
		  </tbody>
		</table>
		<div class="text-center">
		<a href="/upload_csv/<?php echo $authority_id.'/'.$quiz_id.'/'.$quiz_id?>">
			<button type="button" class="btn btn-primary marB30"> Import Exel File </button></a>
			<a href="/add_question/<?php echo $authority_id.'/'.$quiz_id.'/'.$quiz_id?>">
			<button type="button" class="btn btn-primary marB30"> Add Question Manually </button></a>
		</div>
       <!--content-area end-->
    </div>
  </div>
</div>