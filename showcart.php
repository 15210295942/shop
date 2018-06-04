<?php
session_start();
require('config.php');
require("header.php");
require("functions.php");
echo "<h1>Your shopping cart</h1>";
showcart();
if(isset($_SESSION['SESS_ORDERNUM'])) {
	$sess_ordernum=$_SESSION['SESS_ORDERNUM'];
	$sql = "SELECT * FROM orderitems WHERE order_id =$sess_ordernum";
	$result = mysql_query($sql) or die(mysql_error());
	$numrows = mysql_num_rows($result);
	if($numrows >= 1) {
		echo "Ready to pay?";
		echo "<h2><a href='checkout-address.php'>Checkout</a></h2>";
	}
}
require("footer.php");
