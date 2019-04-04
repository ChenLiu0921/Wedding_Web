
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wedding Stylish website</title>

    <!-- Custom styles for this template -->

    <link href="Public/css/bootstrap.css" rel="stylesheet">
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



<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">

                <div class="profile-userpic">
                    <img src="<?php  $path = $value[0]['icon'];
                    if(@fopen($path,'r')){
                      echo $path ;
                    }else{
                      echo 'Public/icon/user.jpg' ;
                    }

                    ?>" class="img-responsive profileImg img-circle" alt="">

                </div>

                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        <h3><?php echo $value[0]['username']?></h3>
                    </div>
                    <hr>
                </div>


                <div class="profile-userbuttons">
                    <form action="index.php?c=userprofile&a=upload" method="post" enctype="multipart/form-data">

                        <button type="button" class="file btn btn-primary btn-sm">Choose Image
                            <input class="imageUpload" type="file" name="file">
			    <input type="hidden" value="upload" name="a"/>
                        </button>
                        <button type="submit" name="submit" class="file btn btn-primary btn-sm">Submit</button>
                        <p style="color:red;margin-top:6px">
                            <?php
                                if(isset($_GET['error'])){
                                    if($_GET['error'] == 'size'){
                                        echo 'File size is too big';
                                    }elseif ($_GET['error'] == 'unknown'){
                                        echo 'Unknown error. Please try again';
                                    }elseif ($_GET['error'] == 'type'){
                                        echo 'Unsupported file type';
                                    }else{
                                        echo 'Can not change icon now';
                                    }
                                }
                            ?>
                        </p>
                    </form>



                </div>

                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="#">
                                <i class="glyphicon glyphicon-home"></i>
                                Over View </a>
                        </li>
                        <li>
                            <a href="?c=shoppingcart">
                                <i class="glyphicon glyphicon-file"></i>
                                Shopping Cart </a>
                        </li>
                        <li>
                            <a href="?c=orderhistory" target="_blank">
                                <i class="glyphicon glyphicon-tag"></i>
                                Order History </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-content">
                <table class="table table-user-information">
                    <tbody>
                    <tr>
                        <td>User Name:</td>
                        <td><?php echo $value[0]['username']?></td>
                    </tr>
                    <tr>
                        <td>Gender:</td>
                        <td><?php echo $value[0]['gender']?></td>
                    </tr>
                    <tr>
                        <td>Phone Number:</td>
                        <td><?php echo $value[0]['phone']?></td>
                    </tr>

                    <tr>
                        <td>Email:</td>
                        <td><?php echo $value[0]['email']?></td>
                    </tr>


                    </tbody>
                </table>
                <a href="?c=changepassword" class="btn btn-primary">Change Password</a>
            </div>


            </div>



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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<!-- Latest compiled and minified JavaScript y[0].style.display = 'block';-->
<script src="Public/js/bootstrap.min.js"></script>
<script src="Public/js/validator.min.js"></script>
<script>

    function myFunction() {
        var x = document.getElementsByClassName('hidden1');

        if (x[0].style.display == "none") {
            x[0].style.display = "block";
        } else {
            x[0].style.display = "none";
        }

    }

</script>

<!--
   if (x[0].style.display == "none") {
       x[0].style.display = "block";
   } else {
       x[0].style.display = "none";
   }
-->

</body>
</html>
