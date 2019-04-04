<?php

require_once "application/View/View.php";

class Controller{
    protected $_controller;

    protected $_action;

    protected $_view;

    function __construct($controller,$action){
        $this->_construct = $controller;
        $this->_action = $action;
        //view = str_replace('Controller','View',$controller);
        //require_once 'View/'.$view.'.php';
        $this->_view = new View($controller,$action);

    }

    function assign($name,$value){
        $this->_view->assign($name,$value);
    }

    function display(){
        $this->_view->display();
    }

}
?>