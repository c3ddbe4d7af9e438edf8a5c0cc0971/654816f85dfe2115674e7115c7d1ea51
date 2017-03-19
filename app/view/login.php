<?php
$is_login=(isset($data['is_login'])&&$data['is_login']=='1')?'1':'0';
$is_login_error=(isset($data['is_login_error'])&&$data['is_login_error']=='1')?'1':'0';
?>
<html>
<head>
  <meta name="viewport" content="width=device-width">
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
  <script src="js/jquery.js"></script> 
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.simple.timer.js"></script>

  <!-- keyboard widget css & script (required) -->

  <link href="monty_virtual/css/jquery-ui.css" rel="stylesheet">
  <script src="monty_virtual/js/jquery.js"></script>


  <link href="monty_virtual/css/keyboard.css" rel="stylesheet">
  <script src="monty_virtual/js/jquery.keyboard.js"></script>

  <!-- keyboard extensions (optional) -->
  <script src="monty_virtual/js/jquery.mousewheel.js"></script>


  <!-- *************************** -->
  <script>

    $(function(){
      $('#text').keyboard();
      $('#password').keyboard();
    });
  </script>
  <title>Binsys</title>

</head>
<body>
  <div id="wrap"> <!-- wrapper only needed to center the input -->
    <div class="container-fluid">
      <div class="custom_nav"><h1 class="text-center">Binsys</h1></div>
      <div class="row">
        <div class="login_form">
          <p style="color:red;display:<?=$is_login_error=='1'?'':'none'?>">Invalid reference id/password/already login</p>
          <form action="/login" method="POST">
            <div class="form-group">
              <label for="exampleInputEmail1">Refrence Id:</label>
              <input type="text" class="form-control" id="text" placeholder="Refrence Id" name="reference_id" style="background:white; color:black;">
      
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password:</label>
              <input type="password" class="form-control" id="password" placeholder="Password" name="password" style="background:white; color:black;">
             
            </div>
            <div class="col-md-4 col-md-offset-4 col-xs-4 col-xs-offset-4">
              <button type="submit" class="login_btn">Sign in</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
     function openerNew(e){
            var params =  'top=0, left=0';
            params += ', width='+screen.width+', height='+screen.height+',statusbar=no,toolbar=no,location=no,directories=no,menubar=no,resizable=no';
            params += ', scrollbars=yes, status=no, fullscreen=yes';
            newwin=window.open("/","_blank",params);
            if (window.focus) {newwin.focus()}
              return false;
        }
        var is_login="<?=$is_login?>";
        if(is_login=='1'){
          openerNew();
        }
    </script>
</body>
</html>