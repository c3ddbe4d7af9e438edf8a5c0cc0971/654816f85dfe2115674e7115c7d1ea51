<?php
$user=$data['user'];
?>

<html>
<head>

<meta name="viewport" content="width=device-width">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">

<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.simple.timer.js"></script>
<script src="js/dojo.js"></script>



<title><?=$user->quiz_name?></title>

</head>

<body>

<div class="container-fluid">
	<!-- <div class="custom_nav_submit">
		<img src="/uploads/logo/<?=$user->logo?>">
		<h1 class="text-center"><?=$user->quiz_name?></h1>
	</div> -->

	    <div class="custom_nav" >
      <img src="/uploads/logo/<?=$user->logo?>" width="100px" height="100px" style="position: relative;
    margin:-10px 15px 15px 10px;">
      <h3 class="text-center" style="color:#fff;position: relative; margin:-80px -13px 0px 10px;"><?=$user->quiz_title?></h3>
      <h4 class="text-center" style="color:#fff;"><?=$user->quiz_name?></h4>
    </div>


<div class="row">

<div class="col-md-6 col-md-offset-3">

<h1 class="exit_page">
     THANK YOU !!<br>
You Have Successfully Completed the Exam. You Should leave Now.

</h1>

<div class="col-md-6 col-md-offset-5 col-xs-5 col-xs-offset-5">
<!-- <button type="button" class="btn btn-primary">Exit</button> -->
</div>

</div>



</div>






</div>

</div>


</body>

</html>