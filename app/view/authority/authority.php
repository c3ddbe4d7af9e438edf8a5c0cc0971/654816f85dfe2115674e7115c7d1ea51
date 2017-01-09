<?php
View::make('admin/includes/header');
?>
<?php 
$authorities=$data['authorities'];
//echo '<pre>';print_r($authorities); echo '<pre>';die;
?>
<div class="container">
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
		<h3 class="title heading"> Authorities
			<span class="title-end"></span>        
		 </h3>
        
        <div class="content_area binsy_marB">
			<div class="binsy_question">
				<ul class="binsy_next_back_addbtn">
					<li><button type="button" class="btn btn-warning">
						<i class="fa fa-caret-left btn_back" aria-hidden="true"></i> Back </button>
					</li>
					<li><button type="button" class="btn btn-warning"> Next 
						<i class="fa fa-caret-right btn_next" aria-hidden="true"></i></button>
					</li>
					<li>
					<a href="/add_authority">
					<button type="button" class="btn btn-success">  
						<i class="fa fa-plus-circle btn_add" aria-hidden="true"></i> Add </button></a>
					</li>
				</ul>	
			</div>
          <div class="row">
            <div class="col-lg-12 col-md-11 col-sm-12">
              <div class="row  marB150">
              
                <div class="col-sm-12">
                <?php foreach($authorities as $key => $value) { ?>
                <a href="<?php echo '/examination/'.$value->id ?>">
					<div class="col-xs-12 col-sm-3 col-md-3 marB20">
						<div class="binsy_ntpc_border">
						
							<div class="bg-primary ntpc_height">
								<span class="ntpc"><?php echo $value->authority_name?></span> 
							</div>
				</a>
							<div class="bisny_edit_btn_group clearfix">
						<a href="edit_authority/<?php echo $value->id?>">
								<button type="button" class="btn binsy_editbtn pull-left">
									<i class="fa fa-pencil-square" aria-hidden="true"></i> Edit </button>
						</a>
						<form action="<?php echo '/delete_authority/'.$value->id ?>" method="POST" class="smart-forms">
						
								<button type="submit" class="btn binsy_remobtn pull-right">
									<i class="fa fa-minus-circle" aria-hidden="true"></i> Remove </button>
						
						</form>
							 </div>
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
