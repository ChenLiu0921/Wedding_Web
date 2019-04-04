<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wedding Stylish website</title>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Custom styles for this template -->

    <link href="Public/css/bootstrap.css" rel="stylesheet">
    <!-- Optional theme -->
    <link href="Public/css/bootstrap-theme.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="Public/css/style.css">
    <!--link rel="stylesheet" href="css/magnific-popup.css"-->
  </head>

  <body>

    <!-- Fixed navbar MISS one navbar-deafult-->

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
      session_start();

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
			        location.href="?c=login&error=loginfirst";
                    </script>
                    </body>
                </html>';}
		  ?>
    </nav>

      <?php
      require_once 'Config/config.php';

      $host= DB_HOST;
      $dbName=DB_NAME;
      $dbh = new PDO("mysql:host=$host;dbname=$dbName", DB_USER, DB_PASSWORD);

      //text search
      $check = $dbh->prepare("SELECT * FROM `product_info`");
      $check -> execute();
      $product = $check->fetchAll();

      $productArray = array();
      for ($n =0; $n<sizeof($product); $n++){
      	$productString = $product[$n]['product_name'].$product[$n]['product_dsc'].$product[$n]['category'];
      	array_push($productArray, $productString);
      }

      //search shoes
      $searchShoes = $dbh->prepare("SELECT * FROM `product_info` WHERE category = 'shoes'");
      $searchShoes -> execute();
      $shoes = $searchShoes->fetchAll();

      //
      $searchDress = $dbh->prepare("SELECT * FROM `product_info` WHERE category = 'dress'");
      $searchDress -> execute();
      $dress = $searchDress->fetchAll();

      //
      $searchAcc = $dbh->prepare("SELECT * FROM `product_info` WHERE category = 'accessory'");
      $searchAcc -> execute();
      $accessories = $searchAcc->fetchAll();

      if(isset($_POST['shoes'])){ $postShoes = $_POST['shoes'];}else{$postShoes = null;}
      if(isset($_POST['dress'])){ $postDress = $_POST['dress'];}else{$postDress = null;}
      if(isset($_POST['accessories'])){ $postAccessories = $_POST['accessories'];}else{$postAccessories = null;}
      if(isset($_POST['showAll'])){ $postShowAll = $_POST['showAll'];}else{ $postShowAll = null; }
      if(isset($_POST['search'])){ $postSearch = $_POST['search'];}else{ $postSearch= null;}

      //click add to cart
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


        </div>
      </div>


<div class="container">

      <h1 class="my-4 text-center text-lg-left">New Look</h1>
      <hr class="my-4">
      <div class="row">

<!--Search navigation -->

     <div class="col-xs-12 col-md-4 btn-group-lg" role="group" aria-label="Choose">
      <div class="input-group">
        <div class="input-group-btn">
		<form action="#" method="POST">
          <input type="text" class="form-control" name = "search" placeholder="Search" id="txtSearch"/>
          <button class="btn btn-default" type="submit">
            <span class="glyphicon glyphicon-search"></span>
          </button>
          <button type="submit" class="btn btn-default" value="shoes" name = "shoes">Shoes</button>
          <button type="submit" class="btn btn-default" value="dress" name = "dress">Dress</button>
          <button type="submit" class="btn btn-default" value="accessories" name = "accessories">Accessories</button>

		  <button type="submit" class="btn btn-default" value="showAll" name = "showAll">Show All</button>

		</form>

        </div>
      </div>
    </div>
</div>




      <div class="row text-center text-lg-left">

<?php

//echo $productArray[0];

//before search, show all product
if($postShoes==null && $postDress==null && $postAccessories==null && $postSearch==null){
	for($i=0; $i < sizeof($product); $i++){


	echo '
	<!--Look with modal -->
		<form method = "POST" action="#">
        <div class="col-lg-3 col-md-4 col-xs-6 thum">

          <a class="d-block mb-4 h-100" href="?c=items&a=items&p='.$product[$i]["product_name"].'">
            <img class="img-fluid img-thumbnail" name = "clickProduct" value = "clickProduct" src='. $product[$i]["path"] .' alt="No image">

		</form>

		<form method = "POST" action = "#">
            <input name="product_name" readonly = "readonly" style = "border:none;" value="'. $product[$i]["product_name"] . '" >

            <button class="btn btn-warning btn-md js-scroll-trigger" type="submit">Add to ShoppingCart</button>
          </a>
        </div>
        <div class="modal fade" role="dialog" id="loginModal">
          <div class="modal-dialog">
          </div>

        </div>
				</form>
	<!--Look with modal -->';
		//$i = $i+1;
	}




}else if($postShoes!=null){
	for($i=0; $i < sizeof($shoes); $i++){
				echo '
	<!--Look with modal -->
		<form method = "POST" action="#">
        <div class="col-lg-3 col-md-4 col-xs-6 thum">

          <a class="d-block mb-4 h-100" href="?c=items&a=items&p='.$shoes[$i]["product_name"].'">
            <img class="img-fluid img-thumbnail" src='. $shoes[$i]["path"] .' alt="No image">
            <input name="product_name"  readonly = "readonly" style = "border:none;" value="'. $shoes[$i]["product_name"] . '" >

            <button class="btn btn-warning btn-md js-scroll-trigger" type="submit">Add to ShoppingCart</button>
          </a>
        </div>
        <div class="modal fade" role="dialog" id="loginModal">
          <div class="modal-dialog">
          </div>

        </div>
				</form>
	<!--Look with modal -->';
	}

}else if($postDress !=null){
	for($i=0; $i < sizeof($dress); $i++){
		//echo $_POST['product_name'];
				echo '
	<!--Look with modal -->
		<form method = "POST" action="#">
        <div class="col-lg-3 col-md-4 col-xs-6 thum">

          <a class="d-block mb-4 h-100" href="?c=items&a=items&p='.$dress[$i]["product_name"].'">
            <img class="img-fluid img-thumbnail" src='. $dress[$i]["path"] .' alt="No image">
            <input name="product_name"  readonly = "readonly" style = "border:none;" value="'. $dress[$i]["product_name"] . '" >

            <button class="btn btn-warning btn-md js-scroll-trigger" type="submit">Add to ShoppingCart</button>
          </a>
        </div>
        <div class="modal fade" role="dialog" id="loginModal">
          <div class="modal-dialog">
          </div>

        </div>
				</form>
	<!--Look with modal -->';
	}
}else if($postAccessories !=null){
	for($i=0; $i < sizeof($accessories); $i++){

				echo '	<!--Look with modal -->
		<form method = "POST" action="#">
        <div class="col-lg-3 col-md-4 col-xs-6 thum">

          <a class="d-block mb-4 h-100" href="?c=items&a=items&p='.$accessories[$i]["product_name"].'">
            <img class="img-fluid img-thumbnail" src='. $accessories[$i]["path"] .' alt="No image">
            <input name="product_name" readonly = "readonly"  style = "border:none;" value="'. $accessories[$i]["product_name"] . '" >

            <button class="btn btn-warning btn-md js-scroll-trigger" type="submit">Add to ShoppingCart</button>
          </a>
        </div>
        <div class="modal fade" role="dialog" id="loginModal">
          <div class="modal-dialog">
          </div>

        </div>
				</form>
	<!--Look with modal -->';
	}
}else if($postShowAll !=null ){
		for($i=0; $i < sizeof($showAll); $i++){
				echo '	<!--Look with modal -->
		<form method = "POST" action="#">
        <div class="col-lg-3 col-md-4 col-xs-6 thum">

          <a class="d-block mb-4 h-100" href="?c=items&a=items&p='.$showAll[$i]["product_name"].'">
            <img class="img-fluid img-thumbnail" src='. $showAll[$i]["path"] .' alt="No image">
            <input name="product_name"  readonly = "readonly" style = "border:none;" value="'. $showAll[$i]["product_name"] . '" >

            <button class="btn btn-warning btn-md js-scroll-trigger" type="submit">Add to ShoppingCart</button>
          </a>
        </div>
        <div class="modal fade" role="dialog" id="loginModal">
          <div class="modal-dialog">
          </div>

        </div>
				</form>
	<!--Look with modal -->';
	}
}else if ($postSearch !=null){ //search key words
	for($i=0; $i < sizeof($product); $i++){
		if (strpos($productArray[$i], $postSearch) !== false){
							echo '	<!--Look with modal -->
		<form method = "POST" action="#">
        <div class="col-lg-3 col-md-4 col-xs-6 thum">

          <a class="d-block mb-4 h-100" href="?c=items&a=items&p='.$product[$i]["product_name"].'">
            <img class="img-fluid img-thumbnail" src='. $product[$i]["path"] .' alt="No image">
            <input name="product_name" readonly = "readonly"  style = "border:none;" value="'. $product[$i]["product_name"] . '" >

            <button class="btn btn-warning btn-md js-scroll-trigger" type="submit">Add to ShoppingCart</button>
          </a>
        </div>
        <div class="modal fade" role="dialog" id="loginModal">
          <div class="modal-dialog">
          </div>

        </div>
				</form>
	<!--Look with modal -->';
		}
	}

}


?>

</div>
    <!-- /.container -->

<div class="seperator"></div>
<!--          Contact part             -->
    <section class="text-center" id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center contact">
            <h2 class="section-heading" style="font-family: 'Playball', cursive; font-weight: bold; font-size: xx-large;">Let's Get In Touch!</h2>
            <hr class="my-4">
            <p class="mb-5">Do you have any advice or any required, please sent to this email. Ready to start your next project with us? That's great! Can also Give us a call or send us an email and we will get back to you as soon as possible!</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center contact">
            <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
            <p>789-456-123</p>
          </div>
          <div class="col-lg-4 mr-auto text-center contact">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p>
              <a href="mailto:your-email@your-domain.com">weddingStylish.feedback@outlook.com</a>
            </p>
          </div>
        </div>
      </div>
      <br>

      <div class="footer">
    &copy; Infs group: Yaxin, liqun, LiuChen
</div>
    </section>

<!-- Bootstrap core JavaScript Placed at the end of the document to let the pages load faster  -->
<script src="Public/js/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="Public/js/bootstrap.min.js"></script>
<script  src="Public/js/index.js"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



</body>
</html>
