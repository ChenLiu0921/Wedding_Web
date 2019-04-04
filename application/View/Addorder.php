<?php
require_once 'Config/config.php';

$host= DB_HOST;
$dbName=DB_NAME;
$dbh = new PDO("mysql:host=$host;dbname=$dbName", DB_USER, DB_PASSWORD);

	session_start();
  $loginUser=$_SESSION['user'];

	$selectFromCart = $dbh->prepare("SELECT * FROM `shopping_cart`, `product_info` WHERE `shopping_cart`.product_name = `product_info`.product_name AND username = '{$loginUser}'");
	$selectFromCart -> execute();
	$selectedProduct = $selectFromCart->fetchAll();

		$order_date = date("Ymd");
		$order_random = rand(10000,99999);
		//echo $order_random;
		$order_number = strval($order_date).strval($order_random);

		$_SESSION['ordernumber']=$order_number;

		for($i=0; $i<sizeof($selectedProduct); $i++){

		$item_id = md5(time().mt_rand());

		$addToOrder = $dbh -> prepare("INSERT INTO `order_history` (order_number, product_name, quantity, price, username, item_id, path)
											VALUES (:order_number, :product_name, :quantity, :price, :username, :item_id, :path)");

		$addToOrder->bindParam(':order_number', $order_number);
		$addToOrder->bindParam(':product_name', $selectedProduct[$i]["product_name"]);
		$addToOrder->bindParam(':quantity', $selectedProduct[$i]["quantity"]);
		$addToOrder->bindParam(':price', $selectedProduct[$i]["price"]);
		$addToOrder->bindParam(':username', $loginUser);
		$addToOrder->bindParam(':item_id', $item_id);
		$addToOrder->bindParam(':path', $selectedProduct[$i]["path"]);
		$addToOrder ->execute();
		}

		$deleteFromCart = $dbh->prepare("DELETE FROM `shopping_cart` WHERE username = '{$loginUser}'");
		$deleteFromCart -> execute();

		echo '<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <script>
			location.href="?c=checkorder";
    </script>
  </body>
</html>';

?>
