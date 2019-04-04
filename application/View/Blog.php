
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
    <!-- Bootstrap core CSS -->

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>

<body style="width:70%;margin:auto">
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
    echo '
  <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="?c=login">Login</a></li>
        <li class="active"><a href="?c=register">Register</a></li>
  </ul>';
  }
  ?>
</nav>




    <?php foreach ($value as $n) : ?>
        <div class="col-lg-auto col-sm-11 col-md-12 blogShort">
            <h1><?php echo $n['blogger']?></h1>
            <img src="<?php  $path = $n['icon'];
            if(@fopen($path,'r')){
              echo $path ;
            }else{
              echo 'Public/icon/user.jpg' ;
            }
            ?>" width="60" height="60" alt="post img" class="pull-left img-responsive2 margin10 img-thumbnail">

            <em>Time: <?php echo $n['time']?></em>
            <article><p><?php echo $n['content']?></p></article>
            <button type="button" class="btn btn-warning pull-right" value='<?php echo $n['blogid']?>' onclick ='goods(this.value,this.value)' ><span class="glyphicon glyphicon-heart"></span><span id='<?php echo $n['blogid']?>' style="margin-left:7px"><?php echo $n['goods']?></span></button>
        </div>
    <?php endforeach; ?>

    <div>
        <label>Input your blog</label>
        <form action="?c=blog&a=postblog" method="POST">
        <input type="textarea" name="blog" class="form-control" id="exampleFormControlTextarea1">
        <button class="btn btn-blog pull-right marginBottom10 marginRight10" type="submit">Post</button>
        </form>
    </div>



    <div class="footer">
        &copy; Infs group: Yaxin, liqun, LiuChen
</section>
</div>


<script>


function goods(index,str) {


    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else {  // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById(index).innerHTML=this.responseText;
      }
    }
    xmlhttp.open("GET","index.php?c=blog&a=goods&blogid="+str ,true);
    xmlhttp.send();

  }

</script>





<!-- Bootstrap core JavaScript Placed at the end of the document to let the pages load faster  -->
<script src="Public/js/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="Public/js/bootstrap.min.js"></script>
<script src="Public/js/bootstrap.bundle.min.js"></script>

<!--
<script>

$(document).ready(function() {
  $('#originalTextBox').hide()
  $('#mockTextBox').click(function() {
    $('#mockTextBox').hide()
    $('#originalTextBox').show()
  })
})
</script>
-->
</body>
</html>
