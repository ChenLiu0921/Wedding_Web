<?php
require_once "Config/config.php";

class Sql{

    public $connect;

	////Liqun
	protected $_dbHandle;
	//protected $_result;
	////////////

    function __construct(){

        $this->connect = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    }

	public function connect(){

		try{
			$dsn = sprintf("mysql:host=%s;dbname=%s;charset=utf8", DB_HOST, $DB_NAME);
			$option = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
			$this->_dbHandle = new PDO($dsn, DB_USER, DB_PASSWORD, $option);
		}catch(PDOException $e){
			exit('error: '.$e->getMessage());
		}
	}
	//////////////////////////////////////


  public function selectAll($table){

      $sql = "SELECT * FROM $table ";
      $result = $this->connect->query($sql);
      $i= 0;
      while ($row[$i] = $result->fetch_array(MYSQLI_ASSOC)){
          $i++;
      }
      array_pop($row);
      return $row;

  }


  public function selectOne($table,$one){

      $sql = "SELECT $one FROM $table";
      $result = $this->connect->query($sql);
      if($result->num_rows > 0){
          $i= 0;
          while ($row[$i] = $result->fetch_array(MYSQLI_ASSOC)){
              $i++;
          }
          array_pop($row);
          return $row;
      }else{return false;}



  }

  public function selectWhere($table,$one,$id){
      $sql = "SELECT * FROM $table WHERE $one = '$id'";

      $result = $this->connect->query($sql);
      if($result->num_rows > 0){
          $i= 0;
          while ($row[$i] = $result->fetch_array(MYSQLI_ASSOC)){
              $i++;
          }
          array_pop($row);
          return $row;
      }else{return false;}


  }

	///////////////////////////////Liqun

	public function search($table, $column, $id){
		$sql = sprintf("SELECT * FROM `%t` WHERE %c = '%id'", $table, $column, $username);
		$sth=$this->_dbHandle->prepare($sql);
		$sth->execute();
		return $sth->fetchAll();
	}

	public function add($table, $tablecolumn, $data){
		$sql = sprintf("INSERT INTO `%t` (%tc) VALUE (%dt) ", $table, $tablecolumn, $data);
		$sth=$this->_dbHandle->prepare($sql);
		$sth->execute();
        return 'success';
	}

	public function checkPassword($table, $username, $password){
		$sql = sprintf("SELECT * FROM `%t` WHERE username = '%username' AND password = '%password'", $table, $username, $password);
		$sth=$this->_dbHandle->prepare($sql);
		$sth->execute();
		return $sth->fetchAll();
	}



}


?>
