<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'application/Model/UserprofileModel.php';
require_once 'Controller.php';
require_once 'Config/config.php';

class UserprofileController extends Controller
{

    public function getUserProfile($username){
        $userprofile = new UserprofileModel();
        $userinfo = $userprofile->getUserinfo('user_info',$username);
        $this->assign('value',$userinfo);


    }

    public function upload(){


        if(isset($_POST['submit'])){
            $file = $_FILES['file'];

            $filename = $_FILES['file']['name'];
            $filetmpname = $_FILES['file']['tmp_name'];
            $filesize = $_FILES['file']['size'];
            $fileerror = $_FILES['file']['error'];
            $filetype = $_FILES['file']['type'];

            $fileext = explode('.',$filename);
            $fileactext = strtolower(end($fileext));
		

            $allowed = array ('jpg','jpeg','png');

            if(in_array($fileactext,$allowed)){
                if($fileerror === 0 ){
                    if($filesize < 500000){
                        session_start();
                        $filenewname = $_SESSION['user'].'.'.$fileactext;
                        $filedestination = 'Public/icon/'.$filenewname;

                        $userprofile = new UserprofileModel();
                        if($userprofile->upload($_SESSION['user'],$filedestination)){
                            $result = move_uploaded_file($filetmpname,ROOT.'/'.$filedestination);
                            var_dump($result);
                            header('Location:?c=userprofile');
                        }

                    }else{
                        header('Location:?c=userprofile&error=size');
                    }
                }else{
                    header('Location:?c=userprofile&error=unknown');
                }

            }else{
                header('Location:?c=userprofile&error=type');
            }
        }else{
            header('Location:?c=userprofile');
        }

    }


    public function index(){
        session_start();

        if(isset($_SESSION['user'])){
          $username = $_SESSION['user'];
          $this->getUserProfile($username);
          $this->display();
        }else{

        }


    }
}
