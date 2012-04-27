<?php

    class Router {

        private $registry;
        private $path;

        public $file;
        public $controller;
        public $action;

        public function __construct($registry){
            $this->registry = $registry;
        }

        public function setPath($path){

            if(false == is_dir($path)){
                die('Wrong Controller path');
            }

            $this->path = $path;
        }

        private function getController(){
            $parts = explode('/', $_SERVER['REQUEST_URI']);

            $this->controller = (!empty($parts[1])) ? $parts[1] : 'index';
            $this->action = (!empty($parts[2])) ? $parts[2] : 'index';

            $this->file = $this->path . $this->controller . 'Controller.class.php';

        }

        public function classLoader(){
            $this->getController();

            if(false == is_readable($this->file)){
                $this->file = $this->path . '404.php';
                $this->controller = 'Error404';
            }

            include $this->file;

            $class = $this->controller . 'Controller';
            $controller = new $class($this->registry);

            if(false == is_callable(array($controller, $this->action))){
                $action = 'index';
            } else
                $action = $this->action;

            $controller->$action();

            return;
        }

    }