<?php
View::make('admin/includes/header');
$authority_id  =  $data['authority_id'];
$quiz_id       =  $data['quiz_id'];
$quiz_id       =  $data['quiz_id'];
?>


<div class="container">
<input type="text" name="authority_id" value="<?php echo $authority_id; ?>"> 
                  <input type="text" name="examination_id" value="<?php echo $quiz_id; ?>">
                  <input type="text" name="quiz_id" value="<?php echo $quiz_id; ?>">

	<form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="/post_csv/<?php echo $authority_id.'/'.$quiz_id.'/'.$quiz_id?>" class="form-horizontal" method="post" enctype="multipart/form-data">
		<input type="file" required="required"  name="import_file" />
		<button class="btn btn-primary" type="submit">Import File</button>
	</form>
</div>

