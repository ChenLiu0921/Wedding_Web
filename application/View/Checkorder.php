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
    $ordernumber = $_SESSION['ordernumber'];

	$selectOrder = $dbh->prepare("SELECT * FROM `order_history` WHERE order_number = '{$ordernumber}' AND username = '{$loginUser}'");
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
      <h1 class="mt-4 mb-3">Order No. <?php echo $ordernumber; ?>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="?c=shoppingcart">Shopping Cart</a>
        </li>
        <li class="breadcrumb-item active">OrderList</li>
      </ol>
    </div>
    <div class="container">

      <div class="row">
        <div class="col-lg-12 mb-12">
          <hr class="style1">
          <table class="table table-bordered">
            <thead>
            <tr>
              <th style="width:40%">Product</th>
              <th style="width:15%">Price (AUD)</th>
              <th style="width:10%">Quantity</th>
              <th style="width:15%" class="text-center">Subtotal (AUD)</th>

            </tr>
            </thead>

            <tbody>
			<?php
			$totalPrice = 0;
			for ($i=0; $i<sizeof($selectedOrder); $i++){
				echo '

			<tr>
              <td data-th="Product">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-10 hidden-xs">
                    <img heigh="100%" width="100%" src="'. $selectedOrder[$i]["path"] .'" alt="..." class="img-fluid"/>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-2">
                    <p>'.$selectedOrder[$i]["product_name"].'</p>

                  </div>
                </div>
              </td>
              <td data-th="Price"> <p class="" id="'.$i.'price">'.$selectedOrder[$i]["price"].'</p></td>
              <td data-th="Quantity">

                <p id="'.$i.'quantity" >'.$selectedOrder[$i]["quantity"].'</p>

			  </td>


              <td id = "'.$i.'subtotal" data-th="Subtotal" class="text-center">'.$selectedOrder[$i]["price"].'</td>
			  <script>document.getElementById("'.$i.'subtotal").innerHTML = document.getElementById("'.$i.'price").innerHTML *
					document.getElementById("'.$i.'quantity").innerHTML;</script>

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

			$totalPrice = ($selectedOrder[$i]["price"] * $selectedOrder[$i]["quantity"])+$totalPrice;
			}
			?>

            </tbody>
          </table>
        </div>
        <div class="col-lg-12">
          <table class="table table-bordered">

            <thead>
              <tr>
                <th>Total (AUD)</th>


              </tr>
            </thead>
            <tbody>
			<?php
			echo '
			<tr>
                <td>'.$totalPrice.'</td>

              </tr>
            </tbody>

			';
			?>

            </tbody>

          </table>
          <br>

      <button onclick="" id="download" class="btn btn-warning btn-block btn-sm" >Download Order</button>
		  <button onclick="print()" class="btn btn-warning btn-block btn-sm">Print Order</button>

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
<script type="text/javascript" src="Public/js/html2canvas.js"></script>
<script type="text/javascript" src="Public/js/jsPdf.debug.js"></script>


<script>
  var downPdf = document.getElementById("download");

  downPdf.onclick = function() {
      html2canvas(document.table, {
          onrendered:function(canvas) {

              var contentWidth = canvas.width;
              var contentHeight = canvas.height;


              var pageHeight = contentWidth / 595.28 * 841.89;

              var leftHeight = contentHeight;

              var position = 0;

              var imgWidth = 555.28;
              var imgHeight = 555.28/contentWidth * contentHeight;

              var pageData = canvas.toDataURL('image/jpeg', 1.0);

              var pdf = new jsPDF('', 'pt', 'a4');

              if (leftHeight < pageHeight) {
                  pdf.addImage(pageData, 'JPEG', 20, 0, imgWidth, imgHeight );
              } else {
                  while(leftHeight > 0) {
                      pdf.addImage(pageData, 'JPEG', 20, position, imgWidth, imgHeight)
                      leftHeight -= pageHeight;
                      position -= 841.89;
                      if(leftHeight > 0) {
                          pdf.addPage();
                      }
                  }
              }

              pdf.save('content.pdf');
          }
      })
  }

  </script>



  </body>
</html>
