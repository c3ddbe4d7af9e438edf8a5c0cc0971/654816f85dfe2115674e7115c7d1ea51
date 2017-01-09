<?php
View::make('admin/includes/header');
$examinations=$data['examinations'];
$authority_id=$data['authority_id'];
//print_r($authority_id); die;
?>
<div class="container">
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
		<h3 class="title heading"> Examination
			<span class="title-end"></span>        
		 </h3>
        
        <div class="content_area binsy_marB">
			<div class="binsy_question binsy_barB15">
				<ul class="binsy_next_back_addbtn">
					<li>
					<a href="/authority"><button type="button" class="btn btn-warning">
						<i class="fa fa-caret-left btn_back" aria-hidden="true"></i> Back </button></a>
					</li>
					<li><button type="button" class="btn btn-warning"> Next 
						<i class="fa fa-caret-right btn_next" aria-hidden="true"></i></button>
					</li>
					<li>
					<a href="/add_examination/<?php echo $authority_id; ?>"><button type="button" class="btn btn-success">  
						<i class="fa fa-plus-circle btn_add" aria-hidden="true"></i> Add </button></a>
					</li>
					<li><input type="text" name="authority_id" value="<?php echo $authority_id; ?>"></li>
				</ul>	
			</div>
          <div class="row">
            <div class="col-lg-12 col-md-11 col-sm-12">
              <div class="row  marB150">
                <div class="col-sm-12">
					<div class="col-xs-12 col-sm-10 col-sm-offset-1">
						<div class="text-center marB30">
						<p>Authorities Examination It is a long established fact that a reader will be distracted
							by the readable content of a page when looking at its layout. The point of using  	 	 							Lorem is that it has a more-or-less normal distribution</p>
					</div>
					</div>
					<?php if($examinations!='null') {?>
					<?php foreach($examinations as $key => $value) {?>
					<div class="col-xs-12 col-sm-3 col-md-3 marB20">
						<div class="binsy_ntpc_border"> 
						<a href="/quiz/<?php echo $authority_id.'/'.$value->id; ?>">
							<div class="bg-primary ntpc_height">
								<h3 class="text-center"> <?php echo $value->test_name; ?></h3>
								<ul class="question_time">
									<li> NO. of Questions  : <?php echo $value->no_of_ques; ?></li>
									<li> Time              : <?php echo $value->duration; ?></li>
								</ul>
							</div>
							</a>
							<div class="bisny_edit_btn_group clearfix">
							<a href="/edit_examination/<?php echo $authority_id.'/'.$value->id; ?>">
								<button type="button" class="btn binsy_editbtn pull-left">
									<i class="fa fa-pencil-square" aria-hidden="true"></i> Edit </button></a>
								<form action="<?php echo '/delete_examination/'.$authority_id.'/'.$value->id ?>" method="POST" class="smart-forms">
						
								<button type="submit" class="btn binsy_remobtn pull-right">
									<i class="fa fa-minus-circle" aria-hidden="true"></i> Remove </button>
						
						</form>
							 </div>
						</div>
					</div>
					<?php } ?>
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
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--content-area end-->
    </div>
  </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
