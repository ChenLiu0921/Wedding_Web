<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Items In Look Page</title>

      <link href="Public/css/bootstrap.css" rel="stylesheet">
    <!-- Optional theme -->
    <link href="Public/css/bootstrap-theme.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="Public/css/style.css">


  </head>

  <body>

  <?php

  require_once 'Config/config.php';

  $host= DB_HOST;
  $dbName=DB_NAME;
  $dbh = new PDO("mysql:host=$host;dbname=$dbName", DB_USER, DB_PASSWORD);

  	session_start();
	$loginUser=$_SESSION['user'];
	$click = $_GET['p'];

	$clickProduct = $dbh->prepare("SELECT * FROM `product_info` WHERE product_name = '{$click}'");
	$clickProduct -> execute();
	$clickedProduct = $clickProduct->fetchAll();


$username = $loginUser;
if(isset($_POST['product_name'])){

	$postProductName = $_POST['product_name'];

	$selectFromCart = $dbh->prepare("SELECT * FROM `shopping_cart` WHERE product_name = '{$postProductName}' AND username = '{$username}'");
	$selectFromCart -> execute();
	$selectedProduct = $selectFromCart->fetchAll();

	if(sizeof($selectedProduct)===0){
		$add = 1;

		$shopid = md5(time().mt_rand());
		$addToCart = $dbh->prepare("INSERT INTO `shopping_cart` (product_name, username, shopid, quantity) VALUES (:product_name, :username, :shopid, :quantity)");
		//INSERT INTO user_info (username, password, email, phone, gender)
		//VALUES (:username, :password, :email, :phone, :gender)"
		$addToCart->bindParam(':product_name', $postProductName);
		$addToCart->bindParam(':username', $username);
		$addToCart->bindParam(':shopid', $shopid);
		$addToCart->bindParam(':quantity', $add);
		$addToCart->execute();
	}else{
		$addProductQuantity = $selectedProduct[0]["quantity"] + 1;
		$updateCart = $dbh->prepare("UPDATE `shopping_cart` SET quantity ='{$addProductQuantity}' WHERE product_name = '{$postProductName}' AND username = '{$username}'");
		$updateCart->execute();
	}

}



  ?>

    <!-- Navigation -->

    <nav class="navbar navbar-fixed-top container-fluid" id="mainNav">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img src="Public/img/logo2.png" class="img-responsive" alt="logo image" id="brand-image"></a>
          <!--<a class="navbar-brand" href="#">Wedding Stylish</a>
          <img src="img/Logo.png" class="img-responsive" alt="Responsive image" id="navImg">
          -->
        </div>
        <div id="navbar" class="collapse navbar-collapse navHeaderCollapse">
          <ul class="nav navbar-nav ml-auto">
            <li class="active"><a href="?c=index">Home</a></li>
             <li class="nav-item"><a class="nav-link js-scroll-trigger" href="?c=look">Look</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="?c=blog">Blog</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="?c=location">Location</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="?c=shoppingcart">ShoppingCart</a></li>
          </ul>
		  <?php

		  if(isset($_SESSION['user'])){
			  //user login
        $loginUser=$_SESSION['user'];

			  echo '
			<ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="?c=userprofile">Hi, '.$loginUser.'</a></li>
            <li class="active"><a href="?c=logout&a=logout">Logout</a></li>
			</ul>';
		  }else{
			echo '<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <script>
			location.href="?c=login";
    </script>
  </body>
</html>';
		  }
		  ?>
    </nav>

    <!-- Page Content -->
    <div class="container items">

      <!-- Portfolio Item Heading -->
      <h1 class="my-4"><a class="itemsLink" ><?php
  	  echo $clickedProduct[0]["product_name"];
  	  ?></a>


      </h1>

      <!-- Portfolio Item Row -->
      <div class="row">


		  <?php
		  echo '
		   <div class="col-md-8">
          <img class="img-fluid img-thumbnail" src="'.$clickedProduct[0]["path"].'" alt="">
			</div>

			<div class="col-md-4">
          <h3 class="my-3">Items Information</h3>

            <p> Item Name : '.$clickedProduct[0]["product_name"].'</p>
            <p> Price : $ '. $clickedProduct[0]["price"] . ' </p>
			<p> Type : '. $clickedProduct[0]["category"] . ' </p>
			<p> Description : '. $clickedProduct[0]["product_dsc"] . ' </p>

		<form method = "POST" action = "#">

			<input id="thisItem" readonly="readonly" name="product_name" style = "border:none;" value="'.$clickedProduct[0]["product_name"].'" >

			<script>document.getElementById("thisItem").style.display = "none";</script>

            <button class="btn btn-warning btn-md js-scroll-trigger" type="submit">Add to ShoppingCart</button>
          </a>
        </div>
        <div class="modal fade" role="dialog" id="loginModal">
          <div class="modal-dialog">
          </div>

        </div>
		</form>
        </div>

		  ';
		  ?>


      </div>


    </div>
    <!-- /.container -->

    <!-- Footer -->
    <section>
      <div class="footer">
    &copy; Infs group: Yaxin, liqun, LiuChen
</div>
    </section>
    <!-- Bootstrap core JavaScript -->
    <script src="Public/vendor/jquery/jquery.min.js"></script>
    <script src="Public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
