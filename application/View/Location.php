<!DOCTYPE html>
<html>

  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wedding Stylish website</title>

    <!-- Custom styles for this template -->

    <link href="Public/css/bootstrap.css" rel="stylesheet">
    <!-- Optional theme -->
    <link href="Public/css/bootstrap-theme.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="Public/css/style.css">
    <title>Travel modes in directions</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    </style>
  </head>
  <body style="width:70%;margin-left:15%;height: 70%">
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
			echo '
    <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="?c=login">Login</a></li>
          <li class="active"><a href="?c=register">Register</a></li>
    </ul>';
		  }
		  ?>
    </nav>


    <div id="floating-panel" style="margin-top:80px">
    <b>Mode of Travel: </b>
    <select id="mode">
      <option value="DRIVING">Driving</option>
      <option value="WALKING">Walking</option>
      <option value="BICYCLING">Bicycling</option>
      <option value="TRANSIT">Transit</option>
    </select>
	  <b>Start From: </b>
	  <select id="start">
      <option value="ct">Brisbane City</option>
      <option value="tw">Toowong Vailly</option>
      <option value="indoor">Indooroopilly</option>
      <option value="sb">Sunnybank</option>
    </select>
    </div>
    <div id="map" style="margin-top:80px"></div>
    <script>
      function initMap() {

        var directionsDisplay = new google.maps.DirectionsRenderer;
        var directionsService = new google.maps.DirectionsService;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: {lat: -27.491998032 , lng: 153.007666636}
        });
        directionsDisplay.setMap(map);

        calculateAndDisplayRoute(directionsService, directionsDisplay);
        document.getElementById('mode').addEventListener('change', function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        });
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
		  	var startFrom = document.getElementById('start').value;
			if(startFrom == 'ct'){
				var la = -27.470125;
				var ln = 153.021072;
			document.getElementById('start').addEventListener('change', function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        });
			}else if(startFrom == 'tw'){
				var la = -27.4857;
				var ln = 152.9927;
			document.getElementById('start').addEventListener('change', function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        });
			}else if(startFrom == 'sb'){
				//-27.58333, 153.05
				var la = -27.58333;
				var ln = 153.05;
			document.getElementById('start').addEventListener('change', function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        });
			}else if(startFrom == 'indoor'){
				var la = -27.4978;
				var ln = 152.9726;
			document.getElementById('start').addEventListener('change', function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        });
			}

        var selectedMode = document.getElementById('mode').value;

        directionsService.route({
          origin: {lat: la , lng: ln},  // Haight.
          destination: {lat: -27.491998032 , lng: 153.007666636}, // Ocean Beach.
          // Note that Javascript allows us to access the constant
          // using square brackets and a string value as its
          // "property."
          travelMode: google.maps.TravelMode[selectedMode]
        }, function(response, status) {
          if (status == 'OK') {
            directionsDisplay.setDirections(response);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvdg48t8yOQuqhvCddQ8Ck_SVqXkaiKHE&callback=initMap">
    </script>
  </body>

  <!--          Footer part             -->
  <section class="col-md-10" id="footer">
      <div class="seperatorFooter"></div>

      <br>
      <div class="col-md-offset-3 footer">
          &copy; Infs group: Yaxin, liqun, LiuChen
      </div>
  </section>
</html>
