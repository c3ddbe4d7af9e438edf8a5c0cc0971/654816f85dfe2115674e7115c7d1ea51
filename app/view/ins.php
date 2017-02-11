
<?php
$ins=$data['instruction'];
$user=$data['user'];
$is_start=$data['user_details']->is_start;
//Helper::pre($is_start);die();
?>
<head>
  <meta name="viewport" content="width=device-width">
  <meta charset="UTF-8">
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
    <div class="custom_nav">
    <img src="/image/<?=$user->logo?>" width="100px" height="100px">
      <h1 class="text-center"><?=$user->quiz_name?></h1>
    </div>
    <div class="row">
      <div class="col-md-9 col-xs-12 left">
        <div class="terms_condition">
          <p class="condition_custom2">Test Format:</p>
          <ul class="terms">
            <?php
            foreach ($ins as $key => $value) { if($value->type==1){  ?>
            <li><?=$value->instruction?></li>
            <?php  } } ?>
          </ul>
        </div>
        <div class="terms_condition">
          <p class="condition_custom2">Navigation To Questions:</p>
          <ul class="terms">
            <?php
            foreach ($ins as $key => $value) { if($value->type==2){  ?>
            <li><?=$value->instruction?></li>
            <?php  } } ?>
          </ul>
        </div>
        <div class="row response_bar">
          <div class="checkbox <?=$is_start?'hide':''?>">
            <label><input type="checkbox" id="accept" ><p class="cl_red">Accept Terms & Conditions</p></label>
            <div class="lang_ins">
            <select>
              <option value=0>Please select</option>
              <option value=1>English</option>
              <option value=2>Hindi</option>
            </select>
            </div>
          </div>
            <?php if(!$is_start){  ?>
              <div class="col-md-2 col-md-offset-5 col-xs-12 custom_default_btn accept  <?=$is_start?'hide':''?>" style="cursor:pointer"> I'm Ready To Begin</div>
            <?php  }else{ ?>
              <div class="col-md-2 col-md-offset-5 col-xs-12 custom_default_btn goto_test " style="cursor:pointer"> <a href="/test" style="color:#fff"> Go To Test</a></div>
            <?php    } ?>
        </div>
      </div><!-- left end here -->
      <!-- right -->
      <div class="col-md-3 col-xs-12 right">
        <div class="row profile">
          <h2 class="text-center">  
            Profile</h2>
            <div class="col-md-10 col-md-offset-2">
              <div class="profile_info">
                <p for="">Name :</p>
                <p for=""><?=$user->name?></p>
              </div>
              <div>
                <div class="profile_info">
                  <p for="">Roll Number :</p>
                  <p for=""><?=$user->roll_num?></p>
                </div>
                <div>
                  <div class="profile_info">
                    <p for="">Center code :</p>
                    <p for=""><?=$user->roll_code?></p>
                  </div>
                  <div class="profile_info">
                    <img src="/image/<?=$user->profile_pic?>" width="100px" height="100px"> </div>
                    <div class="profile_info">
                      <p for="">sign:</p>
                    </div>
                    <div class="profile_info">
                      <p for="">Auth sign:</p>
                    </div>
                    <div>
                    </div>
                  </div>
                </div>
                <!-- rightend here-->
              </div>
            </div>
<script type="text/javascript">
  $(document).ready(function(){
    $(".accept").click(function(){
      var val=$('.lang_ins option:selected').val();
      if(val=='0'){
        alert('please select language first');
        return false;
      }
      if($("#accept").is(":checked")){
        $.ajax({
          url:'/insertQues',
          method:"POST"
        }).done(function(data){
          result=$.parseJSON(data);
          if (result.success=='1') {
            window.location.href='/test';
          }else{
            alert('Server Error');
          }
        });
      }
      else{
        alert("Please Accept Terms & Conditions");
      }
    })

    $('.lang_ins').on('change',function(){
      var v=$('.lang_ins option:selected').val();
      if(v=='0'){
        alert('Please Select language');
      }
      $.ajax({
          url:'/langsubmit',
          method:"POST",
          data:'language='+v
        }).done(function(data){
          result=$.parseJSON(data);
          if (result.success=='1') {
            console.log(result.data.language);
          }else{
            alert('Server Error');
          }
        });
      
    });







  })
</script>
</body>
</html>