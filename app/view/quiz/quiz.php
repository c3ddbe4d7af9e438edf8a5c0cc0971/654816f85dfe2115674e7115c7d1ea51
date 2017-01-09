<?php
View::make('admin/includes/header');
//$examinations=$data['examinations'];
$quizzes=$data['quizzes'];
$quiz_id=$data['quiz_id'];
$authority_id=$data['authority_id'];
//print_r($quizzes); die;
?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="marB20 padd015">
				<a href="/add_quiz/<?php echo $authority_id.'/'.$quiz_id?>">
					<button type="button" class="btn btn-success"> Add New </button></a>
					<button type="button" class="btn btn-warning"> Search </button>
				</div>
				<div class="content_area">
					<h4 class="add_edit"> Exam </h4>
				</div>
				<table class="table table-striped binsy_table">
					<thead>
						<tr>        
							<th>Id</th>
							<th>Quiz name</th>
							<th>Start time</th>
							<th>End time</th>
							<th>Duration</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($quizzes as $key => $value) {?>
							<tr>
								<th scope="row"><?php echo $value->id ?></th>
								<td><?php echo $value->quiz_name ?> </td>
								<td><?php echo $value->start_time ?></td>
								<td><?php echo $value->end_time ?></td>
								<td><?php echo $value->time_duration ?></td>
								<td style="width:230px;">
									<a href="/question_manager/<?php echo $authority_id.'/'.$quiz_id.'/'.$value->id?>">
										<button type="button" class="btn btn-warning marB10"> Questions </button></a>
											<a href="/edit_quiz/<?php echo $authority_id.'/'.$quiz_id.'/'.$value->id?> ">
												<button type="button" class="btn btn-info marB10"> Edit </button></a>
										<form action="<?php echo '/delete_quiz/'.$authority_id.'/'.$quiz_id.'/'.$value->id ?>" method="POST" class="smart-forms">
											<button type="submit" class=" btn btn-danger marB10">
												<i class="fa fa-minus-circle" aria-hidden="true"></i> Remove </button>
											</form>
											</td>
										</tr>
										<?php }?>
									</tbody>
								</table>
								<button type="button" class="btn btn-primary marB30"> Questions Manager </button>
								<!--content-area end-->
							</div>
						</div>
					</div>
