<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wedding Stylish website</title>

    <!-- Custom styles for this template -->

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

  $selectOrder = $dbh->prepare("SELECT * FROM `order_history` WHERE username = '{$loginUser}'");
  $selectOrder -> execute();
  $selectedOrder = $selectOrder->fetchAll();

  ?>

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
    <div class="container shoppingCart">


    <!-- Page Content -->
    <div class="container">
    <br>
      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Order History
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="?c=userprofile">User Profile</a>
        </li>
          <li class="breadcrumb-item active">Order History</li>
      </ol>
    </div>
    <div class="container">

      <div class="row">
        <div class="col-lg-12 mb-12">
          <hr class="style1">

          <table class="table table-hover table-condensed">
            <thead>
            <tr>
              <th style="width:40%" class="">Product</th>
              <th style="width:20%" class="">Quantity</th>
              <th style="width:20%" class="">Total (AUD)</th>
              <th style="width:10%" class="">Order number</th>

            </tr>
            </thead>

            <tbody>
			<?php
			$totalPrice = 0;
			for ($i=0; $i<sizeof($selectedOrder); $i++){
				$totalPrice = ($selectedOrder[$i]["price"] * $selectedOrder[$i]["quantity"]);
				echo '
			             <tr>
              <td data-th="Order">

                  <div class="col-lg-6 col-md-6 col-sm-10 hidden-xs">
                    <p>'.$selectedOrder[$i]["product_name"].'</p>
                </div>
              </td>
              <td data-th="Total">'.$selectedOrder[$i]["quantity"].'</td>
              <td data-th="Quantity">
                <p>'.$totalPrice.'</p>
              </td>
              <td data-th="Track No" class="text-center">'.$selectedOrder[$i]["order_number"].'</td>

            </tr>
			';


			}
			?>

            </tbody>
          </table>
        </div>

      </div>
    </div>


        </div>
      </div>

  </div>


      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

<!--          Footer part             -->
  <section class="col-md-10" id="footer">
      <div class="seperatorFooter"></div>

    <br>
    <div class="col-md-offset-3 footer">
    &copy; Infs group: Yaxin, liqun, LiuChen
    </div>
  </section>



<!-- Bootstrap core JavaScript Placed at the end of the document to let the pages load faster  -->
<script src="Public/js/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="Public/js/bootstrap.min.js"></script>
<script src="Public/js/validator.min.js"></script>



  </body>
</html>
