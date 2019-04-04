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

	<!--paypal -->

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://www.paypalobjects.com/api/checkout.js"></script>
   <!--paypal end-->

  </head>

  <body>

<?php
require_once 'Config/config.php';

$host= DB_HOST;
$dbName=DB_NAME;
$dbh = new PDO("mysql:host=$host;dbname=$dbName", DB_USER, DB_PASSWORD);

		//get user
		  session_start();
		  $loginUser=$_SESSION['user'];


	if(isset($_POST['product_name'])){
		$ProductName = $_POST['product_name'];
		$ProductQuantity = $_POST['quantity'];
		$updateCart = $dbh->prepare("UPDATE `shopping_cart` SET quantity ='{$ProductQuantity}' WHERE product_name = '{$ProductName}' AND username = '{$loginUser}'");
		$updateCart->execute();

		echo '<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <script>
			location.href="?c=shoppingcart";
    </script>
  </body>
</html>';
	}

	$selectFromCart = $dbh->prepare("SELECT * FROM `shopping_cart`, `product_info` WHERE `shopping_cart`.product_name = `product_info`.product_name AND username = '{$loginUser}'" );
	$selectFromCart -> execute();
	$selectedProduct = $selectFromCart->fetchAll();

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
            <li class="active"><a href="index.php">Home</a></li>
             <li class="nav-item"><a class="nav-link js-scroll-trigger" href="?c=look">Look</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="?c=blog">Blog</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="?c=location">Location</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="?c=shoppingcart">ShoppingCart</a></li>
          </ul>
		  <?php

		  if(isset($_SESSION['user'])){
			  //user login

			  echo '
			<ul class="nav navbar-nav navbar-right">
            <li><a>Hi, '.$loginUser.'</a></li>
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
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <!-- Page Content -->
    <div class="container shoppingCart">

      <div class="row">
        <div class="shopping-title">
          <h1><?php echo $loginUser; ?></h1>
          <h3>Shopping Cart</h3>

      </div>
        <div class="col-12 col-md-8 one">
          <table class="table table-hover table-condensed">
            <thead>
            <tr>
              <th style="width:60%">Product</th>
              <th style="width:15%">Price (AUD)</th>
              <th style="width:5%">Quantity</th>
              <th style="width:10%" class="text-center">Subtotal (AUD)</th>
              <th style="width:10%"></th>
            </tr>
            </thead>

          <tbody>

		  <?php
		  $totalPrice = 0;
		  // show all selected product;
		  	for ($i=0; $i<sizeof($selectedProduct); $i++){
		echo '

		      <tr>
			  <form method = "POST" action = "#">
              <td data-th="Product">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-10 hidden-xs">
                    <img heigh="100%" width="100%" src='. $selectedProduct[$i]["path"] .' alt="..." class="img-fluid"/>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-2">
                  <input id="'.$i.'name" readonly="readonly" name="product_name" style = "border:none;" value="'.$selectedProduct[$i]["product_name"].'" >

        					<script>document.getElementById("'.$i.'name").style.display = "none";</script>
                  <p>'.$selectedProduct[$i]["product_name"].' </p>

                  </div>
                </div>
              </td>
              <td data-th="Price"> <p class="" id="'.$i.'price">'.$selectedProduct[$i]["price"].'</p></td>
              <td data-th="Quantity">
                <input id="'.$i.'quantity" type="number" onchange="myfunction()" name = "quantity" class="form-control text-center" value="'.$selectedProduct[$i]["quantity"].'" min="1">
              </td>



              <td id = "'.$i.'subtotal" data-th="Subtotal" class="text-center">'.$selectedProduct[$i]["price"].'</td>
			  <script>document.getElementById("'.$i.'subtotal").innerHTML = document.getElementById("'.$i.'price").innerHTML *
					document.getElementById("'.$i.'quantity").value;</script>

              <td class="actions" data-th="">
					<button class="btn btn-danger btn-sm" type = "submit" name = "save"
					value = "saveitem" onclick = "location.href='. '?c=shoppingcart' .'"><i class="fa fa-trash-o">Save</i></button>

              </td>
			 </form>
            </tr>

			<script>

				function myfunction() {
					console.log("yes");
					document.getElementById("'.$i.'subtotal").innerHTML = document.getElementById("'.$i.'price").innerHTML *
					document.getElementById("'.$i.'quantity").value;
				}

			</script>
			';

	}?>


          <tfoot>

            <tr>
              <td>
                <nav aria-label="Page navigation example">
                </nav>
              </td>

              <td colspan="2" class="hidden-xs"></td>

            <td><a href="?c=look"" class="btn btn-success btn-block hidden-xs">Continue Shopping<i class="fa fa-angle-right"></i></a></td>
            </tr>
          </tfoot>

          </tbody>

        </table>

        </div>


  <!-- /.side bar -->
              </div>

            </div>
          </div>


          <!-- Modal -->
<div id="success" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Confrim Order</h4>
      </div>
      <div class="modal-body">
        <h2>Order Number</h2>
        <span>1234567890</span>
      </div>
      <div class="modal-footer">
        <a href="?c=checkorder" class="btn btn-default btn-sm">Check Order</a>
      </div>
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
