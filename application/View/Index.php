
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
            <li class="active"><a href="#">Home</a></li>
             <li class="nav-item"><a class="nav-link js-scroll-trigger" href="?c=look">Look</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="?c=blog">Blog</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="?c=location">Location</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="?c=shoppingcart">ShoppingCart</a></li>
          </ul>

		  <?php

		  session_start();
		  if(isset($_SESSION['user'])){

			  echo '
			<ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="?c=userprofile">Hi, '.$_SESSION['user'].'</a></li>
            <li class="active"><a href="?c=logout&a=logout">Logout</a></li>
			</ul>';
		  }else{
			echo '<ul class="nav navbar-nav navbar-right">
            <li><a href="?c=login">Login</a></li>
            <li class="active"><a href="?c=register">Register</a></li>
          </ul>';
		  }
		  ?>

        </div><!--/.nav-collapse -->
      </div>
    </nav>

<div class="row" id="box-search">
    <div class="thumbnail text-center">
        <img src="Public/img/header1.jpg"; alt="zero" class="img-responsive" style="margin-top: none;">

        <div class="caption col-lg-8 mx-auto">
          <div>
            <div>
              <img src="Public/img/logo2.png" class="img-responsive center-block text-center" alt="logo image" id="logo-mid">
              <hr light my-4 class="hidden-xs"">
            <h1 class="text-uppercase">Your Best Wedding Dress Designer
            </h1>

          </div>
            <p class="text-faded mb-5 hidden-sm-down hidden-xs">welcome to our website, we are the best wedding dress selling website with thoursand specialitis t for the dress design <br> Please be free to explore the beautiful Jounary</p>
            <a class="btn btn-warning btn-xl js-scroll-trigger" href="#about">Learn More!</a>
          </div>
        </div>
    </div>
</div>
<!--     Text about us    -->
 <section class="bg-primary text-center" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto about">
            <h2 class="section-heading text-white" style="font-family: 'Playball', cursive; font-weight: bold; font-size: xx-large;">Here We have</h2>
            <hr class="light my-4">
            <p class="text-faded mb-4">We has everything you need to get your Wedding and running in no time! All of the design and clothes on our webiste will only have one piece.</p>
            <a class="btn btn-warning btn-xl js-scroll-trigger" href="#services">Get Started!</a>
          </div>
        </div>
      </div>
    </section>

    <div class="seperator"></div>
<!--           Icon about us           -->
 <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading" style="font-family: 'Playball', cursive; font-weight: bold; font-size: xx-large;">Our Service</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-diamond text-primary mb-3 glyphicon glyphicon-user"></i>
              <h3 class="mb-3">Customer service</h3>
              <p class="text-muted mb-0">7days 24Hours customer service.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-paper-plane text-primary mb-3 glyphicon glyphicon-gift"></i>
              <h3 class="mb-3">Ready to Choose</h3>
              <p class="text-muted mb-0">Thousand of proudcut are ready to purchase!</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-newspaper-o text-primary mb-3 glyphicon glyphicon-comment"></i>
              <h3 class="mb-3">Ideas Explore </h3>
              <p class="text-muted mb-0">Discover and update good ideas and design as designer.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fa fa-4x fa-heart text-primary mb-3 glyphicon glyphicon-heart"></i>
              <h3 class="mb-3">Romantic Memories</h3>
              <p class="text-muted mb-0">You can share the experience!</p>
            </div>
          </div>
        </div>
      </div>
    </section>

<div class="seperator"></div>

<!--      Profolio pages      -->
<section class="profolio">
    <div class="container text-center">
      <h2 style="font-family: 'Playball', cursive; font-weight: bold; font-size: xx-large;">Look</h2>
      <hr class="my-4">
      <br>
      <div class="row">
        <div class="col-sm-4">
        <a>
          <img src="Public/img/9.jpg" alt="Error">
            <p>2018 New look Hot One</p>
        </a>
        </div>

        <div class="col-sm-4">
        <a>
          <img src="Public/img/8.jpg" alt="Error">
            <p>2018 New look Hot One</p>
        </a>
        </div>

        <div class="col-sm-4">
        <a>
          <img src="Public/img/7.jpg" alt="Error"/>
            <p>2018 New look Hot One</p>
        </a>
        </div>
        </div>
        <div class="row">
        <div class="col-sm-4">
        <a>
          <img src="Public/img/6.jpg" alt="Error">
            <p>2018 New look Hot One</p>
        </a>
        </div>

        <div class="col-sm-4">
        <a>
          <img src="Public/img/5.jpg" alt="Error">
            <p>2018 New look Hot One</p>
        </a>
        </div>

        <div class="col-sm-4">
        <a>
          <img src="Public/img/3.jpg" alt="Error">
            <p>2018 New look Hot One</p>
       </a>
      </div>
    </div>
</section>

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

</body>
</html>
