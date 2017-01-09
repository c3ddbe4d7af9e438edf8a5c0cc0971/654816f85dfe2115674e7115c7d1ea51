
<?php
$user=$_SESSION['user'];
?>
<div class="col-md-3 col-xs-12 right">
	<div class=" col-md-12 col-xs-12 text-center custom_timer">
		<p class="timer-style">Time left : </p> <p class='timer timer-style' data-minutes-left=<?=$user->time?>></p>
		<section class='actions'></section>
	</div>
	<div class="ures">
	</div>
</div>