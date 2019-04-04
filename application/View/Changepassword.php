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
			location.href="?c=login";
    </script>
  </body>
</html>';
		  }
		  ?>
    </nav>
<?php
require_once 'Config/config.php';

$host= DB_HOST;
$dbName=DB_NAME;
$dbh = new PDO("mysql:host=$host;dbname=$dbName", DB_USER, DB_PASSWORD);


		  $loginUser=$_SESSION['user'];

		if(isset($_POST["newpassword"])){
			$changePassword = $_POST["newpassword"];
			$st = $dbh->prepare("SELECT * FROM `user_info` WHERE username='{$loginUser}'");
			$st->execute();
			$user = $st->fetchAll();

		$oldpassword = $_POST["oldpassword"];
		$verify = (password_verify($oldpassword, $user[0]["password"]));
			if($verify){

			$newpassword = password_hash($changePassword, PASSWORD_DEFAULT);

			$updatePassword = $dbh->prepare("UPDATE `user_info` SET password ='{$newpassword}' WHERE username = '{$loginUser}'");
			$updatePassword->execute();
			echo '<!DOCTYPE html>
					<html lang="en" dir="ltr">
					  <head>
						<meta charset="utf-8">
						<title></title>
					  </head>
					  <body>
						<script>
								alert("Your password has been changed!");
								location.href="?c=userprofile";
						</script>
					  </body>
					</html>';
			}else{
				echo '<!DOCTYPE html>
					<html lang="en" dir="ltr">
					  <head>
						<meta charset="utf-8">
						<title></title>
					  </head>
					  <body>
						<script>
								alert("Password incorrect! please check your password!");
						</script>
					  </body>
					</html>';
			}
		}


?>
    <!-- Fixed navbar MISS one navbar-deafult-->

<div class="register text-center fieldset col-centered">
  <div class="row">
    <div class="form-group col-md-10 form1"><!-- here is 10 -->
      <form role="form" class="form-horizontal" data-toggle="validator" method = "POST" action="#">
        <div class="row">
          <fieldset class="col-md-offset-5"><!--  5 is the center-->
            <legend class="col-md-8" style="font-family: 'Playball', cursive; font-weight: bold; font-size: xx-large;">Change Password</legend>
              <div class="col-md-8">



                 <div class="form-group">
                  <div class="col-md-10 col-md-offset-1">
                    <label class="control-label">Old Password</label>
                    <input type="password" data-minlength="6" class="form-control" id="inputPassword" name="oldpassword" placeholder="Please fill the password" required="">
                    <!--
                    <div class="help-block">Minimum of 6 characters</div> -->
                  </div>
                </div>
                <br>

                <div class="form-group">
                  <div class="col-md-10 col-md-offset-1">
                    <label class="control-label">New Password</label>
                      <input type="password" class="form-control" name = "newpassword" id="inputPasswordConfirm"  placeholder="New Password" required>
                      <div class="help-block with-errors"></div>
                </div>



                <div class="form-group">
                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary btn-lg" name="submit">Submit</button>
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
<script src="Public/js/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="Public/js/bootstrap.min.js"></script>
<script src="Public/js/validator.min.js"></script>



  </body>
</html>
