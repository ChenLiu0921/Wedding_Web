<?php
require_once "Model.php";

class UserprofileModel extends Model {

    public function upload($username,$icon){
        $sql_1 = "UPDATE blog SET icon = '$icon' WHERE blogger = '$username' ";
        $sql_2 = "UPDATE user_info SET icon = '$icon' WHERE username = '$username' ";
        if($this->connect->query($sql_1) === TRUE && $this->connect->query($sql_2)){
            return true;
        }else{
            return false;
        }
    }

    public function getUserinfo($table,$username){
        $sql = "SELECT * FROM $table WHERE username = '$username'";
        $result = $this ->connect->query($sql);

        $i= 0;
        while ($row[$i] = $result->fetch_array(MYSQLI_ASSOC)){
            $i++;
        }
        array_pop($row);

        return $row;
    }

}