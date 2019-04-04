<?php

require_once "Sql.php";

class Model extends Sql {


	public function _construct(){
		$this->connect();
	}


}
?>
