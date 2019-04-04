<?php

class AutoLoad {
    public $c;
    public $a;

    public function main()
    {
        $c = isset($_GET['c']) ? $_GET['c'] : "Index"; //get controller from url
        $a = isset($_GET['a']) ? $_GET['a'] : "Index"; //get action from url

        $classname = ucfirst($c)."Controller";

        $file = 'Controller/'.$classname.'.php';


        require_once $file;

        $controller = new $classname($classname,$a);

        $controller->$a();

    }
}

$app = new AutoLoad();
$app ->main();

?>