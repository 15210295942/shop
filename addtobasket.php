<?php
session_start();
@$su = $_SESSION['SESS_USERID'];
//判断是否注册账户，如果没注册则跳转注册页面
if(!$su){
	echo '<script>alert("登录后才能下单哟~~~");location.href="/login.php"</script>';die;
}
$mysqli = new mysqli();
$mysqli->connect('localhost', 'root','123456','go4shop');
require("functions.php");
$prodsql = "SELECT * FROM products WHERE id = " . $_GET['id'] . ";";
$prodres = $mysqli->query($prodsql);

$prodrow = $prodres->fetch_assoc();
// var_dump($prodrow);die;
$numrows = count($prodrow);

if($numrows == 0){
	header("Location: " . $config_basedir);
}else{
	// var_dump($_SESSION);die;
	if(isset($_POST['submit'])){
		if(isset($_SESSION['SESS_ORDERNUM'])){  //如果存在订单
			$itemsql = "INSERT INTO orderitems(order_id,product_id, quantity) VALUES(". $_SESSION['SESS_ORDERNUM'] . ", ". $_GET['id'] . ", ". $_POST['amountBox'] . ")";
			// echo $itemsql;
			$mysqli->query($itemsql) or die(mysqli_error($mysqli));
		}else{  //不存在，创建订单在添加详情
			if(isset($_SESSION['SESS_LOGGEDIN'])){
				$sql = "INSERT INTO orders(registered, `date`, customer_id) VALUES(". "1, NOW(),'" . $_SESSION['SESS_USERID'] . "')";
				// echo $sql;
				$mysqli->query($sql) or die(mysqli_error($mysqli));
				$_SESSION['SESS_ORDERNUM'] = mysqli_insert_id($mysqli);
				$itemsql = "INSERT INTO orderitems(order_id, product_id, quantity) VALUES(". $_SESSION['SESS_ORDERNUM']. ", " . $_GET['id'] . ", ". $_POST['amountBox'] . ")";
				$mysqli->query($itemsql) or die(mysqli_error($mysqli));
			}else{
				$sql = "INSERT INTO orders(registered, dated, session) VALUES(". "0, NOW(), '" . session_id() . "')";
				$mysqli->query($sql) or die(mysqli_error($mysqli));
				$_SESSION['SESS_ORDERNUM'] = mysqli_insert_id($mysqli);
				$itemsql = "INSERT INTO orderitems(order_id, product_id, quantity) VALUES(". $_SESSION['SESS_ORDERNUM'] . ", " . $_GET['id'] . ", ". $_POST['amountBox'] . ")";
				// echo $itemsql;die;
				$mysqli->query($itemsql) or die(mysqli_error($mysqli));
			}
		}
		$totalprice = $prodrow['price'] * $_POST['amountBox'] ;
		$updsql = "UPDATE orders SET total = total + ". $totalprice . " WHERE id = ". $_SESSION['SESS_ORDERNUM'] . ";";
		$mysqli->query($updsql) or die(mysqli_error($mysqli));
		header("Location: " . $config_basedir . "showcart.php");
	}else{
		require("header.php");
		echo "<form action='addtobasket.php?id=". $_GET['id'] . "' method='POST'>";
		echo "<table cellpadding='10'>";
		echo "<tr>";
		if(empty($prodrow['image'])) {
			echo "<td><imgsrc='productimages/dummy.jpg' width='50' alt='". $prodrow['name'] . "'></td>";
		}else {
			echo "<td>
			<img src='productimages/" . $prodrow['image']. "' width='50' alt='" . $prodrow['name']. "'></td>";
		}
		echo "<td>" . $prodrow['name'] . "</td>";
		echo "<td>Select Quantity <select name='amountBox'>";
		for($i=1;$i<=100;$i++){
			echo "<option>" . $i . "</option>";
		}
		echo "</select></td>";
		echo "<td><strong>&euro;". sprintf('%.2f', $prodrow['price']) . "</strong></td>";
		echo "<td><input type='submit' name='submit' value='Add to Shopping Cart'></td>";
		echo "</tr>";
		echo "</table>";
		echo "</form>";
	}
}
require("footer.php");
?>
