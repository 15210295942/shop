<?php
session_start();
require("config.php");
require("functions.php");

if(isset($_POST['paypalsubmit'])){
	$upsql = "UPDATE orders SET status = 2, payment_type = 1 WHERE id = " . $_SESSION['SESS_ORDERNUM'];
	$upres = mysql_query($upsql);
	$itemssql = "SELECT total FROM orders WHERE id = " . $_SESSION['SESS_ORDERNUM'];
	$itemsres = mysql_query($itemssql);
	$row = mysql_fetch_assoc($itemsres);
	if($_SESSION['SESS_LOGGEDIN']){
		unset($_SESSION['SESS_ORDERNUM']);
	}else{
		session_register("SESS_CHANGEID");
		$_SESSION['SESS_CHANGEID'] = 1;
	}
}else if(isset($_POST['chequesubmit'])){
	$upsql = "UPDATE orders SET status = 2,payment_type = 2 WHERE id = ". $_SESSION['SESS_ORDERNUM'];
	$upres = mysql_query($upsql);
	if($_SESSION['SESS_LOGGEDIN']){
		unset($_SESSION['SESS_ORDERNUM']);
	}else{
		session_register("SESS_CHANGEID");
		$_SESSION['SESS_CHANGEID'] = 1;
	}
	require("header.php");
}else{
	require("header.php");
	echo "<h1>Payment</h1>";
	showcart();
?>
<h1>Add Credit Cart</h1>
<form action="//<?php $_SERVER['SCRIPT_NAME']; ?>" method="POST">
<table>
<tr>
<td>Name on Card</td>
<td><input type="textbox" name="credName">
</tr>
<tr>
<td>Card Number</td>
<td><input type="text" name="credNum">
</tr>
<tr>
<td>Security Code</td>
<td><input type="textbox" name="credCode">
<td></td>
</tr>
<td valign="top" align="left">Credit Card Expiry (mm/yyyy)</td>
<td valign="top" align="left" height="30">
<input type="text" placeholder="12/2016" value="" id="credit_card_exp" name="credit_card_exp"> <br />
<label class="error" id="credit_card_exp_error"></label>
</td>
<tr>
<td></td>
<td><input type="submit" name="pay" value="Pay">
</tr>
</table>
</form>   
<?php
}
require("footer.php");
?>
