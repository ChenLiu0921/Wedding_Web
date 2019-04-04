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
          <a class="navbar-brand" href="?c=index"><img src="Public/img/logo2.png" class="img-responsive" alt="logo image" id="brand-image"></a>
          <!--<a class="navbar-brand" href="#">Wedding Stylish</a>
          <img src="img/Logo.png" class="img-responsive" alt="Responsive image" id="navImg">
          -->
        </div>
        <div id="navbar" class="collapse navbar-collapse navHeaderCollapse">
          <ul class="nav navbar-nav ml-auto">
            <li class="active"><a href="?c=index">Home</a></li>
             <li class="nav-item"><a class="nav-link js-scroll-trigger" href="?c=look">Look</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="?=blog">Blog</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="?c=location">Location</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="?c=shoppingcart">ShoppingCart</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="?c=login">Login</a></li>
            <li class="active"><a href="?c=register">Register</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<div class="register text-center fieldset col-centered">
  <div class="row">
    <div class="form-group col-md-10 form1"><!-- here is 10 -->
      <form role="form" class="form-horizontal" data-toggle="validator" method = "POST" action = "?c=register&a=register">
        <div class="row">
          <fieldset class="col-md-offset-5"><!--  5 is the center-->
            <legend class="col-md-8">Register</legend>
              <div class="col-md-8">
                <div class="form-group">
                  <div class="col-md-10 col-md-offset-1">
                    <label class="control-label">Username</label>
                    <div style="color:red" id="username"><?php if(isset($_GET['error'])){
                      if($_GET['error'] == "userexist"){ echo "User already exist. Please change another username." ;}
                    }?></div>
                      <input type="text" class="form-control" onkeyup="usernamecheck(this.value)" name="username" placeholder="Username" required="">
                    <br>
                    <br>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-10 col-md-offset-1">
                    <label class="control-label">Phone Number</label>
                    <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-10 col-md-offset-1">
                    <label class="control-label">Email</label>
                    <input type="email" class="form-control" name="email" data-error="Error: this file must be vaild email id" placeholder="Email" required="">
                    <div class="help-block with-errors"></div>
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
                  <div class="col-md-10 col-md-offset-1">
                    <label class="control-label">Password Confirmation</label>
                      <input type="password" class="form-control" name="confirmPassword" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm" required>
                      <div class="help-block with-errors"></div>
                      <div style="color:red"><?php if(isset($_GET['error'])){
                        if($_GET['error'] == "confirm"){ echo "Password Confirmation mistake. Please check." ;}
                      }?></div>
                </div>

                <div class="form-group">
                  <div class="col-md-10 col-md-offset-1">
                    <label class="control-label">Gender</label><br>
                    <div>
                    <input type="radio" name="gender" value="male" checked> Male
                    <input type="radio" name="gender" value="female"> Female
                    <input type="radio" name="gender" value="other"> Other
                  </div>
                  </div>
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


<script>
function usernamecheck(str) {
    if (str.length == 0) {
        document.getElementById("username").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("username").innerHTML = this.responseText;
            }
        };
        var user = {'username':str};

        xmlhttp.open("GET", "index.php?c=register&a=usernamecheck&username=" + user.username, true);
        xmlhttp.send();
    }
}
</script>



<!-- Bootstrap core JavaScript Placed at the end of the document to let the pages load faster  -->
<script src="js/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="js/validator.min.js"></script>



  </body>
</html>
