<?php

require_once 'Config/config.php';

class LoginModel {

    public $connect;

    public function __construct(){

        $host= DB_HOST;
        $dbName=DB_NAME;
        $this->connect = new PDO("mysql:host=$host;dbname=$dbName", DB_USER, DB_PASSWORD);
    }

}
?>

