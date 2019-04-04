<?php


require_once "Model.php";

class RegisterModel extends Model{
    public function usernamecheck($username){
        $sql = "SELECT * FROM user_info WHERE username ='$username' ";
        $result = $this->connect->query($sql);
        if($result->num_rows > 0){
            return true;
        }else{
            return false;
        }
    }
}
?>

