<?php
$res=$data['res'];
$user=$data['user'];
$marked=0;
$attemped=0;
$total=count($res);
foreach ($res as $key => $value) {
  if ($value->res->res!='') {
    $attemped+=1;
  }elseif ($value->res->marked) {
    $marked+=1;
  }
}
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



<title>Binsyis</title>

</head>

<body>

<div class="container-fluid">


<div class="custom_nav"><h1 class="text-center">Binsyis</h1></div>


<div class="row">

<div class="col-md-9 col-xs-12 left">
	
<!-- section_rows -->
<div class="row ">
	<div class="col-md-6 col-xs-6 section_rows">
		<ul id = "myTab" class = "nav nav-tabs">
   <li class = "active">
      <a href = "#section1" data-toggle = "tab">
         Section 1
      </a>
   </li>
   
   <li><a href = "#section2" data-toggle = "tab">Section 2</a></li>
	
  
	
</ul>


	</div>

	

</div>
	
	<!-- section_rows -->


<div id = "myTabContent" class = "tab-content">

<!--section 1  -->


   <div class = "tab-pane fade in active" id = "section1">

   <div class="row section_rows ">


	<div class="col-md-12 sub_section">

	<h4  class="text-center">Sections</h4>

	<p class="section_active">section 1</p>
		
		
	</div>

</div>
<!-- section_rows -->

<div class="row">
<div class="col-md-2 col-md-offset-10">

<p class="section_back text-center"><a href="/test"> <-Back</a></p>
	
</div>
</div>


<!--back -->

<div class="row">
<div class="col-md-6 col-md-offset-3">

<table>
  <tr>
    <th class="table_head">Section Name</th>
    <th class="table_head2">Total <br/> Question</th>
    <th class="table_head2">Total Question Attempeted</th>
<th class="table_head2">Marked For Review</th>
    
  </tr>
  <tr>
    <td>Section 1</td>
    <td><?=$total?></td>
    <td><?=$attemped?></td>
    <td><?=$marked?></td>
  </tr>
 
</table>

	
</div>
</div>
<!--result -->


<div class="col-md-6 col-md-offset-3 submit" style="display: <?=$user->submit=='1'?'none':''?>">


<p class="danger_color">Are you sure you want to submit? </p>

<p class="Yes_no" id="yes"><a href="/submit?submit=1">YES</a></p>


<p class="Yes_no"><a href="/test">NO</a></p>



</div>

<!--submit -->

</div>
<!--section 1 end -->


<!--section 2  -->
   <div class = "tab-pane fade" id = "section2">
     <div class="col-md-4 col-md-offset-4">
      <p>this is our testing section.</p>
         </div>
   </div>
<!--section 2 end  -->
</div>

<!--tab fuction end here  -->

</div>
   
<!-- left end here -->

<!-- right -->

<div class="col-md-3 col-xs-12 right">

<div class=" col-md-12 col-xs-12 text-center custom_timer">
     <p class="timer-style">Time left : </p> <p class='timer timer-style' data-minutes-left=<?=$user->time?>></p>
      <section class='actions'></section>
   </div>



<div class="ures">
          
</div>


<!-- rightend here-->






</div>

</div>

<script type="text/javascript">
	
function loadUres(){
 $.ajax({
    url:'/res/',
  }).done(function(data){
    $(".ures").html(data);
  });
}
loadUres();
</script>
</body>

</html>