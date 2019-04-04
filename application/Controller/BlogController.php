<?php

require_once "Controller.php";
require_once "application/Model/BlogModel.php";

class BlogController extends Controller {


    public function showblog(){
        $blogmodel = new BlogModel();
        $value = $blogmodel->selectblog();
        $this->assign("value",$value);
    }

    public function goods(){
        $blogmodel = new BlogModel();

        session_start();
        $value = $blogmodel->selectWhere('blog','blogid',$_GET['blogid']);
        $goods = $value[0]['goods'] + 1 ;

        if(isset($_SESSION['user'])){
          if($blogmodel->goodcheck($_GET['blogid'],$_SESSION['user'])){
            echo $value[0]['goods'];
          }else{
            if($blogmodel->goods($_GET['blogid'],$goods)){
              if($blogmodel->gooddone($_GET['blogid'],$_SESSION['user'])){
                echo $goods;
              }else{
                echo $value[0]['goods'];
              }
            }
          }

        }else{
          echo $value[0]['goods'];
        }

    }

    public function postblog(){

        session_start();

        if(isset($_SESSION['user'])){

            $content = $_POST['blog'];
            $user = $_SESSION['user'];
            $time = date('y-m-d H:i:s',time());
            $goods = 0;
$content = str_replace("'","''",$content);
$content = str_replace('&',"",$content);


            $blogmodel = new BlogModel();
            $icon = $blogmodel->geticon($user)[0]['icon'];
            $blogid = $blogmodel->getvalidblogid();

            if($blogmodel->postblog($blogid,$user,$time,$content,$goods,$icon)){
                header("Location:index.php?c=blog");
            }else{
                header("Location:index.php?c=blog");
            }
        }else{
            header("Location:index.php?c=login&error=loginfirst");
        }


    }

    public function index(){
        $this->showblog();
        $this->display();
    }

}
?>
