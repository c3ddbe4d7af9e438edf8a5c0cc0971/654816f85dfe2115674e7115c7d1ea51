
<?php
$ins=$data['instruction'];
$user=$data['user'];
//echo '<pre>';print_r($user); die;
$res=$data['res'];

$is_start=$data['user_details']->is_start;
if($is_start==1){
  $time=time()-$_SESSION['start_time'];
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
    <img src="/uploads/logo/<?=$user->logo?>" width="100px" height="100px" style="position: relative;
    margin:-10px 15px 15px 10px;">
     <h3 class="text-center" style="color:#fff;position: relative; margin:-80px -13px 0px 10px;"><?=$user->quiz_title?></h3>
      <h4 class="text-center" style="color:#fff;"><?=$user->quiz_name?></h4>
    </div>
    <div class="row">
      <div class="col-md-9 col-xs-12 left" style="height:560px">
        <div class="terms_condition">
          <div class="lang" style="margin-top: 5px;text-align:right;">
            <select>
              <option value="1" <?=$data['language']=='1'?'selected':''?>>English</option>
              <option value="2" <?=$data['language']=='2'?'selected':''?>>Hindi</option>
            </select>
          </div>
          <p class="condition_custom2 english <?=$data['language']=='1'?'show':'hide'?>">Test Format:</p>
          <p class="condition_custom2 hindi <?=$data['language']=='2'?'show':'hide'?>">टेस्ट प्रारूप:</p>
          <ul class="terms english <?=$data['language']=='1'?'show':'hide'?>">
            <?php
            foreach ($ins as $key => $value) { if($value->type==1){  ?>
            <li><?=$value->instruction?></li>
            <?php  } } ?>
          </ul>
          <ul class="terms hindi <?=$data['language']=='2'?'show':'hide'?>">
            <?php
            foreach ($ins as $key => $value) { if($value->type==1){  ?>
            <li><?=$value->instruction_h?></li>
            <?php  } } ?>
          </ul>
        </div>
        <div class="terms_condition">
          <p class="condition_custom2 english <?=$data['language']=='1'?'show':'hide'?>">Navigation To Questions:</p>
          <p class="condition_custom2 hindi <?=$data['language']=='2'?'show':'hide'?>">नेविगेशन टू प्रश्न:</p>
          <ul class="terms english <?=$data['language']=='1'?'show':'hide'?>">
            <?php
            foreach ($ins as $key => $value) { if($value->type==2){  ?>
            <li><?=$value->instruction?></li>
            <?php  } } ?>
          </ul>
          <ul class="terms hindi <?=$data['language']=='2'?'show':'hide'?>">
            <?php
            foreach ($ins as $key => $value) { if($value->type==2){  ?>
            <li><?=$value->instruction_h?></li>
            <?php  } } ?>
          </ul>
        </div>
        <div class="row response_bar">
          <div class="checkbox <?=$is_start?'hide':''?>">
            <label><input type="checkbox" id="accept" ><p class="cl_red">Accept Terms & Conditions</p></label>
            
          </div>
          <div class="lang_ins">
            <label>If You Want Question in Hindi Or English Please Select Language</label>
            <select>
              <option value=0>Please select</option>
              <option value=1>English</option>
              <option value=2>Hindi</option>
            </select>
            </div>

            <?php if(!$is_start){  ?>
              <br><div class="col-md-2 col-md-offset-5 col-xs-12 custom_default_btn accept  <?=$is_start?'hide':''?>" style="cursor:pointer"> I'm Ready To Begin</div>
            <?php  }else{ ?>
              <div class="col-md-2 col-md-offset-5 col-xs-12 custom_default_btn goto_test " style="cursor:pointer"> <a href="/test" style="color:#fff"> Go To Test</a></div>
            <?php    } ?>
        </div>
      </div><!-- left end here -->
      <!-- right -->
      <?php if($is_start==0) { ?>
      <div class="col-md-3 col-xs-12 right">
        <div class="row profile">
          <h2 class="text-center" style="border-bottom:1px solid black;">  
            Candidate Profile</h2>
            <div class="col-md-10 col-md-offset-1">
              <div class="profile_info">
                <p for=""><b>Name :</b></p>
                <p for=""><?=$user->name?></p>
              </div>
              <div>
                <div class="profile_info">
                  <p for=""><b>Roll Number :</b></p>
                  <p for=""><?=$user->roll_num?></p>
                </div>
                <div>
                  <div class="profile_info">
                    <p for=""><b>Center code :</b></p>
                    <p for=""><?=$user->roll_code?></p>
                  </div>
                  <div class="profile_info">
                     <b>Recent Photo:</b> 
                     <img src="uploads/photo/<?=$user->profile_pic?>" width="120px" height="100px">
                     </div>
                    <div class="profile_info">
                      <b>Signature: </b> 
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="uploads/sign/<?=$user->sig_pic?>" width="120px" height="60px">
                      </div>

                    </div>
                    <div class="profile_info">
                      <p for=""><b>Authority Signature:</b></p>
                    </div>
                    <div>
                    </div>
                  </div>
                </div>
                
              </div>

              
            </div>
            <?php } else {?>
            <div class="col-md-3 col-xs-12 right">
         <!--<div class=" col-md-12 col-xs-12 text-center custom_timer">
         <img src="/uploads/photo/<?=$user->profile_pic?>" width="100px" height="100px" style="margin-top:10px;">
          <div class="pic">
            <p class="">Welcome :<?=$user->name?> </p>
            <p class="timer-style">Time left : </p> <p class='timer timer-style' data-seconds-left="<?=$left?>"></p>
            
           </div>-->

           <div class=" col-md-12 col-xs-12 text-center custom_timer">
        <img src="/uploads/photo/<?=$user->profile_pic?>" width="85" height="85" style="margin-top:5px;margin-bottom:5px;margin-left: -25px; float:left;">
          <div class="pic">
            <p class="" style="font-size:12px; min-width:20px;"><b><span style="font-size:1.7em;">Welcome</span></b> &nbsp;<br><strong><?=$user->name?></strong></p>
            <p class="timer-style" style="margin-left:15px;font-size:1.4em;"><b>Time left </b>:&nbsp;</p><p class='timer timer-style' data-seconds-left="<?=$left?>" style="font-size:1.5em;"></p>
            
          </div>
          
           <section class='actions'></section>
         </div>

        <div class="ures">
        
        </div>
      </div>
      <?php }?>
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
    $(document).ready(function(){
      loadUres();
      $(document).on('click','.status_text',function(){
        var type=$(this).attr("data-type");
        loadUres(type);
      });
    })
    function loadUres(type=''){
     $.ajax({
      url:'/res?type='+type,
    }).done(function(data){
      $(".ures").html(data);
      sc();
    });
  }
  $(document).on('change',function(){
    var a=$('.lang option:selected').val();
    if(a=='1'){
      $('.english').addClass('show').removeClass('hide');
      $('.hindi').addClass('hide').removeClass('show');
    } else{
      $('.english').addClass('hide').removeClass('show');
      $('.hindi').addClass('show').removeClass('hide');
    }
  })
  });
</script>
</body>
</html>