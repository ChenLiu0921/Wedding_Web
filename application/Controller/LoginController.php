<?php
require_once 'Controller.php';
require_once 'application/Model/LoginModel.php';


class LoginController extends Controller
{

	public function index(){
	  $this->display();
	}

	public function login(){

	$name=$_POST['username'];
	$password=$_POST['password'];
	$passwordJson = json_encode($password);

	$dbh = new LoginModel();

	if(isset($_POST['submit'])){
			$username = $_POST["username"];
			$password = $_POST["password"];


	$st = $dbh->connect->prepare("SELECT * FROM `user_info` WHERE username='{$username}'");
	$st->execute();
	$user = $st->fetchAll();

	  $verify = (password_verify($password,$user[0]['password']));

		if($verify){
				session_start();
				$_SESSION['user'] = $username;
				echo 'success'.$_SESSION['user'];
				echo'<!DOCTYPE html>
	<html lang="en" dir="ltr">
	  <head>
		<meta charset="utf-8">
		<title></title>
	  </head>
	  <body>
		<script>
				location.href="?c=look";
		</script>
	  </body>
	</html>';
				//$flag = 1;
		}else{
			//$flag = 0;
			echo '<!DOCTYPE html>
	<html lang="en" dir="ltr">
	  <head>
		<meta charset="utf-8">
		<title></title>
	  </head>
	  <body>
		<script>
	
		  location.href="?c=login&error=loginerr";
	
		</script>
	  </body>
	</html>';
		}
	}
		}

	}
?>
