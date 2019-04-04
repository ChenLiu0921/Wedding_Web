
<?php
require_once 'Controller.php';
require_once "application/Model/RegisterModel.php";
require_once 'Config/config.php';
require 'mailer/class.phpmailer.php';
require 'mailer/class.smtp.php';

class RegisterController extends Controller
{
	public function index(){
		$this->display();
	}
	public function sendemail($email, $user){
		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->CharSet = "utf8";
		$mail->Host = "mailhub.eait.uq.edu.au";
		$mail->SMTPAuth = false;
		$mail->SMTPSecure = "tls";
		$mail->Port = 25;
		$mail->From= "INFS";
		$mail->Helo= "Me";
		$mail->setFrom("s4410907@student.uq.edu.au","Liqun");
		$mail->addAddress("zengliqung@gmail.com");
		$mail->IsHTML(true);
		$mail->Subject = "Hello! ".$user;
		$mail->Body = "Dear ".$user."! Welcome to our wedding dress website!";
		    $status = $mail->send();

		 if(!$mail->send()){
		  echo "Message could not be sent.";
		  echo "Mailer Error: ".$mail->ErrorInfo;
		}else{
		  echo 'Email has been sent.';
		}
		}

	public function usernamecheck(){
		$registerModel = new RegisterModel();

		if($registerModel->usernamecheck($_GET['username'])){
			echo "Username exist. Please try another username";
		}else{
			echo'';
		}

	}

	public function register(){

        $host= DB_HOST;
        $dbName=DB_NAME;
        $dbh = new PDO("mysql:host=$host;dbname=$dbName", DB_USER, DB_PASSWORD);

			$username = $_POST["username"];
			$password = $_POST["password"];
			$email = $_POST["email"];
			$phone = $_POST["phone"];
			$gender = $_POST["gender"];
			$icon = 'Public/icon/user.jpg';
			$confirmPassword = $_POST["confirmPassword"];

			$hashpassword = password_hash($password,PASSWORD_DEFAULT);

			if($confirmPassword!=$password){

				echo '<!DOCTYPE html>
				<html lang="en" dir="ltr">
				  <head>
					<meta charset="utf-8">
					<title></title>
				  </head>
				  <body>
					<script>
							location.href="index.php?c=register&error=confirm";
					</script>
				  </body>
				</html>';
			}else{

				if(isset($_POST['username'])){
				$check = $dbh->prepare("SELECT * FROM `user_info` WHERE username ='{$username}'");
				$check -> execute();
				$user = $check->fetchAll();
				//$userJson = json_encode($user);


					if(sizeof($user)==0){
						$st = $dbh->prepare("INSERT INTO user_info (username, password, email, phone, gender,icon) VALUES (:username, :password, :email, :phone, :gender, :icon)");
						$st->bindParam(':username', $username);
						$st->bindParam(':password', $hashpassword);
						$st->bindParam(':email', $email);
						$st->bindParam(':phone', $phone);
						$st->bindParam(':gender', $gender);
                        $st->bindParam(':icon', $icon);
						$st->execute();
						$this -> sendemail($email, $username);
						echo '<!DOCTYPE html>
							<html lang="en" dir="ltr">
							  <head>
								<meta charset="utf-8">
								<title></title>
							  </head>
							  <body>
								<script>
										location.href="index.php?c=login";
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
									location.href="index.php?c=register&error=userexist";
							</script>
						  </body>
						</html>';
					}
				}

			}


	}
}
?>
