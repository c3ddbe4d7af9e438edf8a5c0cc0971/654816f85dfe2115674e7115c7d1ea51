<?php
$user=$data['user'];
$last_ques=$data['last_ques'][0]->ques_num;
$time=time()-$_SESSION['start_time'];
$duration=$user->duration*60;
$button_timer=$user->button_timer*60;
$show_button=$duration-$button_timer;
$left=($duration-$time);
$showb=$left-$show_button;
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
    <script src="js/dojo.js"></script>
    <title><?=$user->quiz_name?></title>
  </head>
<body>
  <div class="container-fluid">
    <div class="custom_nav" >
      <img src="/uploads/logo/<?=$user->logo?>" width="100px" height="100px" style="position: relative;
    margin:-10px 15px 15px 10px;">
      <h3 class="text-center" style="color:#fff;position: relative; margin:-80px -13px 0px 10px;"><?=$user->quiz_title?></h3>
      <h4 class="text-center" style="color:#fff;"><?=$user->quiz_name?></h4>
    </div>
    <div class="row">
      <div class="col-md-9 col-xs-12">
        <div class="row ">
          <div class="col-md-6 col-xs-6 section_rows">
            <ul id = "myTab" class = "nav nav-tabs">
              <li class = "active">
                <a href = "#section1" data-toggle = "tab">
                  Objective Section
                </a>
              </li>
              <!-- <li><a href = "#section2" data-toggle = "tab">Section 2</a></li> -->
            </ul>
          </div>

          <div class="col-md-6 col-xs-6 section_rows">
            <ul id = "myTab" class = "nav nav-tabs">
              <li class = "active pull-right">
                <a href = "/" style="cursor: pointer;">
                  Instruction
                </a>
              </li>
              <li class = "active pull-right ">
                <a href = "#" class="profile11" style="cursor: pointer;">
                  Profile
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div id = "myTabContent" class = "tab-content">
          <div class = "tab-pane fade in active" id = "section1">
            <div class="row section_rows ">
              <div class="col-md-12 sub_section">
                <h4  class="text-center">Question Type: Multiple Choice Questions</h4>
                
              </div>
            </div>
            <div class="ques_holder" data-id="1">
            </div>
          </div>
          <div class = "tab-pane fade" id = "section2">
            <div class="col-md-4 col-md-offset-4">
              <p>this is our testing section.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-xs-12 right">
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
    </div>
  </div>
<script type="text/javascript">
var last_ques="<?=$last_ques?$last_ques:'1'?>";
$(document).ready(function(){
  loadQues(last_ques);
  loadUres();
})
function loadQues(ques_num){
  $.ajax({
    url:'/ques/'+ques_num,
  }).done(function(data){
    loadUres();
    $(".ques_holder").html(data);
  });
}
function loadUres(type=''){
 $.ajax({
    url:'/res?type='+type,
  }).done(function(data){
    $(".ures").html(data);
    sc();
  });
}
$(document).on('click','.qsrn',function(){
  loadQues($(this).attr('data-ques_num'));
  var cl=$(this).attr('data-color');
  if(cl=='#fff'){
    $(this).css({"background-color":"#b23c45"});
  }
});

$(document).on('click','.mrn',function(){
  var q=$(this).parents('.ques');
  var formData=$(".rest").serializeArray();
  formData.push({ name: "mark", value: "1" });
  formData.push({ name: "answer", value: "" });
  var id=q.attr('data-id');
  $.ajax({
    url:'/ques/save',
    method:'POST',
    data:formData,
  }).done(function(data){
    result=$.parseJSON(data);
    if (result.success=='1') {
      if (q.attr('data-last')=='0') {
        loadQues(parseInt(q.attr('data-ques_num'))+1);
      }else{
        loadUres();
        alert("This is Last Question");
      }
      //loadUres();
    }
  });
  return false;
});


$(document).on('click','.mrns',function(){
  var q=$(this).parents('.ques');
  var formData=$(".rest").serializeArray();
  formData.push({ name: "mark", value: "1" });
  var id=q.attr('data-id');
  $.ajax({
    url:'/ques/save',
    method:'POST',
    data:formData,
  }).done(function(data){
    result=$.parseJSON(data);
    if (result.success=='1') {
      if (q.attr('data-last')=='0') {
        loadQues(parseInt(q.attr('data-ques_num'))+1);
      }else{
        loadUres();
        alert("This is Last Question");
      }
      //loadUres();
    }
  });
  return false;
});

$(document).on('click','.sn',function(){
  var q=$(this).parents('.ques');
  var id=q.attr('data-id');
  var is_last=$(this).attr('data-is_last');
  var res=$(".nameres input[type='radio']:checked").val();
  var formData=$(".rest").serializeArray();
  $.ajax({
    url:'/ques/save',
    method:'POST',
    data:formData,
  }).done(function(data){
    result=$.parseJSON(data);
    if (result.success=='1'){
      if (q.attr('data-last')=='0') {
        loadQues(parseInt(q.attr('data-ques_num'))+1);
      }else{
        loadUres();
        alert("This is Last Question");
      }
        //loadUres();
      }
    
  });
  return false;
})
$(document).on('click','.clr',function(){
  $("input:radio").attr("checked", false);
  var q=$(this).parents('.ques');
  var formData=$(".rest").serializeArray();
  formData.push({ name: "mark", value: "0" });
  $.ajax({
    url:'/ques/save',
    method:'POST',
    data:formData,
  }).done(function(data){
    result=$.parseJSON(data);
    if (result.success=='1') {
      /*$('.qsrn[data-ques_num="'+id+'"]').css('background-color', '#b23c45');*/
      $(".nameres input[type='radio']:checked").prop('checked', false);
      if (q.attr('data-last')=='0') {
        loadQues(parseInt(q.attr('data-ques_num'))+1);
      }
      else{
        loadUres();
        alert("This is Last Question");
      }
      //loadUres();
    }
  });
  return false;
});

/*$(document).ready(function() {
    $(document)[0].oncontextmenu = function() { return false; }
    $(document).mousedown(function(e) {
        if( e.button == 2 ) {
            alert('Sorry, this functionality is disabled!');
            return false;
        } else {
            return true;
        }
    });
});*/
var d=0;
$(document).ready(function(){


  $(document).on('click',function(){
    clearInterval(b);
    if (d!=0) {
      clearInterval(d);
    }
    d=setInterval(function(){
      $.ajax({
        url:'/alertsubmit',
        method:'POST',
      }).done(function(data){
        result=$.parseJSON(data);
        if (result.success=='1') {
          if(result.data[0].count<4){
            alert('please do somthing');
            $(document).trigger('click');
            return false;
          }
          else{
            window.location.href="/submit";
            return false;
          } 
        }
      });
    },600000);
  });
  var b=setInterval(function(){
   $.ajax({
    url:'/alertsubmit',
    method:'POST',
  }).done(function(data){
    result=$.parseJSON(data);
    if (result.success=='1') {
      if(result.data[0].count<4){
        alert('please do somthing');
        $(document).trigger('click');
        return false;
      }
      else{
        window.location.href="/submit";
        return false;
      }
    }
  });
  },600000);


  $(document).on('change',function(){
    var a=$('.lang option:selected').val();
    if(a=='1'){
      $('.english').addClass('show').removeClass('hide');
      $('.hindi').addClass('hide').removeClass('show');
    } else{
      $('.english').addClass('hide').removeClass('show');
      $('.hindi').addClass('show').removeClass('hide');
    }
  });

    var ft=setInterval(function(){
   $.ajax({
    url:'/failure_time',
    method:'POST',
  }).done(function(data){
    result=$.parseJSON(data);
    if (result.success=='1') {
      //alert('hello');
     /* if(result.data[0].count<4){
        alert('please do somthing');
        $(document).trigger('click');
        return false;
      }
      else{
        window.location.href="/submit";
        return false;
      }*/
    }
  });
  },2000);

});


</script>

<script type="text/javascript">
$(document).ready(function(){
  $(document).on('click','.status_text',function(){
    var type=$(this).attr("data-type");
    loadUres(type);
  });
});
function sc(){
  var total_ques=<?=$user->total_ques?>;
  var ques_num=$('.ques').attr('data-id');
  var h=($('.numbers')[0].scrollHeight);
  h=h*(ques_num-4)/(total_ques);
  $('.numbers').scrollTop(h);
}
$(document).on('click','.profile11',function(){
 $.ajax({
    url:'/profile',
    method:'GET',
  }).done(function(data){

      window.location.href="/profile";
     

  });
  return false;
});

</script>


<script type="text/javascript">
var showb="<?=$showb*1000?>";
  $(document).ready(function(){
    $(document).on('click','#mybutton',function(){
      if(confirm("Do you really want to do submit?")){
        window.location.href="/submit";
      }
      else{
        return false;
      }
    })

    setInterval(function(){
      $('#mybutton').addClass('show');
    },showb);
  })
</script>


</body>
</html>