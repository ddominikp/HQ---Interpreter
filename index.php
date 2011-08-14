<?php
echo '<h1>HQ9++ Interpreter</h1>
';
if($_POST){
	require_once("hq9plusplus.class.php");
	$h = new hq9plusplus();
	echo nl2br($h->parse($_POST['code']));
} else echo '<form action="'.basename($_SERVER['SCRIPT_NAME']).'" method="post">
<textarea name="code" rows="25" cols="70"></textarea><br />
<input type="submit" value="Dawaj!" />
</form>';

?>