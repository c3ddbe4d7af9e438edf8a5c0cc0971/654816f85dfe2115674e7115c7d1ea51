<?php 
View::make('includes/header');
?>
<div class="container-fluid">


<div class="custom_nav"><h1 class="text-center">Binsys</h1>

</div>


<div class="row">



<div class="login_form">
<p style="color:red;display:<?=Input::get('error')=='1'?'':'none'?>">Invalid reference id/password</p>
<form action="/adminlogin" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Refrence Id:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Refrence Id" name="email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password:</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
  

  <div class="col-md-4 col-md-offset-4 col-xs-4 col-xs-offset-4">
  <button type="submit" class="login_btn">Sign in</button>
  </div>


</form>






</div>






</div>

</div>

<?php 
View::make('includes/footer');
?>