<?php

/**
 * Class BloggerModel/
 * For set and get blogger information
 */

require_once "Model.php";
class BlogModel extends Model {
    public function selectblog(){

        $sql = "SELECT * FROM blog ORDER BY time DESC ";
        $result = $this->connect->query($sql);
        $i= 0;
        while ($row[$i] = $result->fetch_array(MYSQLI_ASSOC)){
            $i++;
        }
        array_pop($row);
        return $row;

    }

    public function goodcheck($id,$username){
        $sql = "SELECT * FROM goodcheck WHERE blogid = '{$id}' AND username='{$username}' ";
        $result = $this->connect->query($sql);
        if($result->num_rows > 0){
            return true;
        }else{
            return false;
        }

    }

    public function gooddone($id,$username){
        $sql = "INSERT INTO goodcheck(blogid,username)VALUES('{$id}','{$username}')";
        if($this->connect->query($sql) === TRUE){
            return true;
        }else{
            return false;
        }
    }

    public function postblog($blogid,$blogger,$time,$content,$goods,$icon){
        $sql = "INSERT INTO blog (blogid, blogger, time,content,goods,icon) VALUES ($blogid,'{$blogger}','$time','{$content}',$goods,'$icon')";

        if($this->connect->query($sql) === TRUE){
            return true;
        }else{
            return false;
        }
    }

    public function getvalidblogid(){
        $blogid = mt_rand(0,999999999);
        $sql = "SELECT * FROM blog WHERE blogid = $blogid";
        while($this->connect->query($sql) === TRUE){
            $blogid = mt_rand(0,999999999);
            $sql = "SELECT * FROM blog WHERE blogid = $blogid";
        }

        return $blogid;

    }

    public function geticon($username){
        $sql = "SELECT icon FROM user_info WHERE username='$username' ";
        $result = $this->connect->query($sql);
        if($result->num_rows > 0){
            $i= 0;
            while ($row[$i] = $result->fetch_array(MYSQLI_ASSOC)){
                $i++;
            }
            return $row;
        }else{return false;}
    }

    public function goods($id,$int){
        $sql = "UPDATE blog SET goods = '$int' WHERE blogid = '$id' ";
        if($this->connect->query($sql) === TRUE){
            return true;
        }else{
            return false;
        }

    }



}
?>