<?php
session_start();
if(isset($_SESSION['user'])){ header("Location:?c=look");}

?>

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
			echo '
    <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="?c=login">Login</a></li>
          <li class="active"><a href="?c=register">Register</a></li>
    </ul>';
		  }
		  ?>
    </nav>

<div class="register text-center fieldset col-centered">
  <div class="row">
    <div class="form-group col-md-10 form1"><!-- here is 10 -->
      <form role="form" class="form-horizontal" data-toggle="validator" method = "POST" action = "?c=login&a=login">
        <div class="row">
          <fieldset class="col-md-offset-5"><!--  5 is the center-->
            <legend class="col-md-8" style="font-family: 'Playball', cursive; font-weight: bold; font-size: xx-large;">Login</legend>
              <div class="col-md-8">
                <div class="form-group">
                  <div class="col-md-10 col-md-offset-1">
                    <p style="color:red"><?php
                      if(isset($_GET['error'])){
                        if($_GET['error'] == 'loginerr'){
                           echo "Incorrect username or password. Please check and try again!";
                        }elseif ($_GET['error'] == 'loginfirst'){
                            echo "Please login first.";
                        }
                      }
                    ?></p>
                    <label class="control-label">Username</label>
                      <input type="text" class="form-control" name="username" placeholder="username" required="">
                  </div>
                </div>

                 <div class="form-group">
                  <div class="col-md-10 col-md-offset-1">
                    <label class="control-label">Password</label>
                    <input type="password" data-minlength="6" class="form-control" id="inputPassword" name="password" placeholder="Minimum of 6 characters" required="">
                    <div class="help-block">Minimum of 6 characters</div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary btn-lg" name="submit">Login</button>
                    <br>
                    <br>
                    <a class="js-scroll-trigger" name="regisetr" href="?c=register">Don't have an account?</a>
                  </div>
                </div>
            </div>
          </fieldset>
        </div>
      </form>
    </div>
  </div>
</div>

<!--          Footer part             -->
  <section class="col-md-10" id="footer">
      <div class="seperatorFooter"></div>

    <br>
    <div class="col-md-offset-3 footer">
    &copy; Infs group: Yaxin, liqun, LiuChen
    </div>
  </section>



<!-- Bootstrap core JavaScript Placed at the end of the document to let the pages load faster  -->
<script src="js/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="js/validator.min.js"></script>



  </body>
</html>
