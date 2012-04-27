<?php


    class View {
        private $registry;
        private $vars = array();

        function __construct($registry) {
            $this->registry = $registry;

        }

        public function __set($index, $value){
            $this->vars[$index] = $value;
        }

        function render($name) {
            $path = SITE_ROOT . '/view' . '/' . $name . '.php';

            if (false == file_exists($path)){
                die('Template not found in '. $path);
            }

            foreach ($this->vars as $key => $value){
                $$key = $value;
            }

            include ($path);
        }
    }


