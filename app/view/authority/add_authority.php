<?php
View::make('admin/includes/header');
?>
<style type="text/css">
  label.error {
    color: #FB3A3A;
    display: inline-block;
    /*margin: 4px 0 5px 125px;*/
    padding: 0;
    text-align: left;
    width: 220px;
}
</style>
<div class="container">
<div class="row">
  <div class="col-sm-10 col-sm-offset-1">

  <form class="smart-forms" action="/post_authority" method="post" id="add_authority">
    <h3 class="title heading">Authorities
      <span class="title-end"></span> 
      <div class="pull-right">
      </div>       
    </h3>
    <div class="content_area">
      <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0">
          <div class="row padd30">
            <div class="col-sm-12">
              <div class="section">
                <label class="field_name">Authority Name </label>
                <label class="field">
                  <input type="text" name="authority_name" placeholder="Authority Name" value="" class="gui-input">
                </label>
                
                
              </div>
            </div>
            <!-- <div class="col-sm-12">
              <div class="section">
                <label class="field_name">Authority Name </label>
                <label class="field">
                  <textarea rows="5" cols="70" id="editor" class="" name="authority_desp" ></textarea>
                </label>
                <span style="color:red;" class="jsonerror jsonaut_desp"></span>
               
              </div>
            </div> -->
          </div>
        </div>
      </div>
      <div class="text-center marB20">
        <input type="submit" class="btn btn-primary" value="Submit">	
      </div>
    </div>	
   </form>
  </div>
</div>
</div>

<script type="text/javascript">
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#add_authority").validate({
             
                rules: {
                    authority_name: "required",
                },
                messages: {
                    authority_name: "Please enter your authority name",
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);
</script>