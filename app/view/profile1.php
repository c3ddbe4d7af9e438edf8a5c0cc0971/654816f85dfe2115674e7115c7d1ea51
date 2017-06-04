
<?php
$ins=$data['instruction'];
$user=$data['user'];
$user_details=$data['user_details'];
$res=$data['res'];
// echo '<pre>';print_r($user_details); die;

$is_start=$data['user_details']->is_start;
if($is_start==1){
  $time=time()-$_SESSION['started_time'];
$duration=$user->duration*60;
$left=($duration-$time);
}
else{
  $is_start='';
}


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
    <img src="/image/<?=$user->logo?>" width="100px" height="100px" style="position: relative;
    margin:-10px 15px 15px 10px;">
      <h1 class="text-center" style="position: relative; margin:-63px -13px 0px 10px;"><?=$user->quiz_name?></h1>
    </div>
    <div class="row">
      <div class="col-md-9 col-xs-12 left" style="height:586px">
      
        <div class="row">
          <h2 class="text-center">  
             Profile Details</h2>
            <div class="col-md-12 col-md-offset-3" style="border:3px solid black; width :483px; height:200px;">

              <div class="profile_info">
                <p for="">Name :</p>
                <p for=""><?=$user->name?></p>
              </div>
              <div class="profile_info">
                <p for=""> Father's Name :</p>
                <p for=""><?=$user->father_name?></p>
              </div>
      
                <div class="profile_info">
                  <p for="">Roll Number :</p>
                  <p for=""><?=$user->roll_num?></p>
                </div>
                <div class="profile_info">
                  <p for="">Registration Number :</p>
                  <p for=""><?=$user->reg_num?></p>
                </div>
                
                  <div class="profile_info">
                    <p for="">Center code :</p>
                    <p for=""><?=$user->roll_code?></p>
                  </div>
                   <div class="profile_info">
                    <p for="">Center code :</p>
                    <p for=""><?=$user->category?></p>
                  </div>
                  <div class="" style="position:relative; left:341px; top:-180px;">
                     <br><img src="uploads/photo/<?=$user->profile_pic?>" width="120px" height="100px">
                     </div>
                    <div class="" style="position:relative; left:341px; top:-194px;">
                     <br><img src="uploads/sign/<?=$user->sig_pic?>" width="120px" height="60px">
                      </div>
                    </div>
                    
                    <div>
                    </div>
                  </div>
                </div>
                  <div class="col-md-3 col-xs-12 right">
        <div class=" col-md-12 col-xs-12 text-center custom_timer">
        <img src="/uploads/photo/<?=$user->profile_pic?>" width="100px" height="100px" style="margin-top:10px;">
          <div class="pic">
            <p class="">Welcome :<?=$user->name?> </p>
            <p class="timer-style">Time left : </p> <p class='timer timer-style' data-seconds-left="<?=$left?>"></p>
            
          </div>
          
          <section class='actions'></section>
        </div><div class="ures">
        <?php include('res.php');?>
        </div>
       
      </div>

                
              </div>

              
        
          
      
      </div>
     
             
           
              <div class="col-md-2 col-md-offset-4 col-xs-12 custom_default_btn goto_test " style="cursor:pointer;position:relative;right:50px;top:-308px;"> <a href="/test" style="color:#fff;"> Go To Test</a></div>
        
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

function loadUres(type=''){
 $.ajax({
    url:'/res?type='+type,
  }).done(function(data){
    $(".ures").html(data);
    sc();
  });
}





  })
</script>
</body>
</html>