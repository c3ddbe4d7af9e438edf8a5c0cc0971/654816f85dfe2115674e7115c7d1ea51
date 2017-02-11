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
  <!-- <script src="js/dojo.js"></script> -->

  <!-- script for virtual keyboard virtual keyboard css and js start-->

  <link href="virtual_docs/css/jquery-ui.min.css" rel="stylesheet">
  <!-- still using jQuery v2.2.4 because Bootstrap doesn't support v3+ -->
  <script src="virtual_docs/js/jquery-latest.min.js"></script>
  <script src="virtual_docs/js/jquery-ui.min.js"></script>
  <!-- <script src="virtual_docs/js/jquery-migrate-3.0.0.min.js"></script> -->

  <!-- keyboard widget css & script (required) -->
  <link href="virtual_keyboard_css/keyboard.css" rel="stylesheet">
  <script src="virtual_js/jquery.keyboard.js"></script>

  <!-- keyboard extensions (optional) -->
  <script src="virtual_js/jquery.mousewheel.js"></script>
  <script src="virtual_js/jquery.keyboard.extension-typing.js"></script>
  <script src="virtual_js/jquery.keyboard.extension-autocomplete.js"></script>
  <script src="virtual_js/jquery.keyboard.extension-caret.js"></script>

  <!-- demo only -->
  <!-- <link rel="stylesheet" href="virtual_docs/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="virtual_docs/css/font-awesome.min.css">
  <link href="virtual_docs/css/demo.css" rel="stylesheet">
  <link href="virtual_docs/css/tipsy.css" rel="stylesheet">
  <link href="virtual_docs/css/prettify.css" rel="stylesheet">
  <script src="virtual_docs/js/bootstrap.min.js"></script>
  <script src="virtual_docs/js/demo.js"></script>
  <script src="virtual_docs/js/jquery.tipsy.min.js"></script>
  <script src="virtual_docs/js/prettify.js"></script><!-- syntax highlighting -->
  <!-- script for virtual keyboard virtual keyboard css and js end-->


  <!-- *************************** -->
  <title>Binsys</title>
</head>
<body>
  <div class="container-fluid">
    <div class="custom_nav"><h1 class="text-center">Binsys</h1></div>
    <div class="row">
      <div class="login_form">
        <p style="color:red;display:<?=Input::get('error')=='1'?'':'none'?>">Invalid reference id/password/already login</p>
        <form action="/login" method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1">Refrence Id:</label>
            <input type="text" class="form-control" id="text" placeholder="Refrence Id" name="reference_id" style="background:white; color:black;">
            <br>
    <div class="code ui-corner-all">
      <h4>HTML</h4>
      <pre class="prettyprint lang-html">&lt;input id="text" type="text" placeholder=" Enter something..."&gt;</pre>
      <h4>Script</h4>
      <pre class="prettyprint lang-js">// Autocomplete demo
var availableTags = ["ActionScript", "AppleScript", "Asp", "BASIC", "C", "C++", "Clojure",
  "COBOL", "ColdFusion", "Erlang", "Fortran", "Groovy", "Haskell", "Java", "JavaScript",
  "Lisp", "Perl", "PHP", "Python", "Ruby", "Scala", "Scheme" ];

$('#text')
  .keyboard({ layout: 'qwerty' })
  .autocomplete({
    source: availableTags
  })
  // position options added after v1.23.4
  .addAutocomplete({
    position : {
      of : null,        // when null, element will default to kb.$keyboard
      my : 'right top', // 'center top', (position under keyboard)
      at : 'left top',  // 'center bottom',
      collision: 'flip'
    }
  })
  .addTyping();</pre>
    </div>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password:</label> <img id="password-opener" class="tooltip-tipsy" title="Click to open the virtual keyboard" src="virtual_keyboard_css/images/keyboard.svg">
            <input type="password" class="form-control" id="password" placeholder="Password" name="password" style="background:white; color:black;">
            <br>
    <div class="code ui-corner-all">
      <h4>HTML</h4>
      <pre class="prettyprint lang-html">&lt;img id="passwd" class="tooltip-tipsy" title="Click to open the virtual keyboard" src="css/images/keyboard.svg"&gt;
&lt;input id="password" type="password"&gt;</pre>
      <h4>Script</h4>
      <pre class="prettyprint lang-js">$('#password')
  .keyboard({
    openOn : null,
    stayOpen : true,
    layout : 'qwerty'
  })
  .addTyping();

$('#password-opener').click(function(){
  var kb = $('#password').getkeyboard();
  // close the keyboard if the keyboard is visible and the button is clicked a second time
  if ( kb.isOpen ) {
    kb.close();
  } else {
    kb.reveal();
  }
});</pre>
    </div>
          </div>
          <div class="col-md-4 col-md-offset-4 col-xs-4 col-xs-offset-4">
            <button type="submit" class="login_btn">Sign in</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>