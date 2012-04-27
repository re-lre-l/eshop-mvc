<?php


    class Request {
        private $registry;
        public $params = array();

        public function __construct($registry) {
            $this->registry = $registry;

            foreach($_REQUEST as $k => $v)
                $this->params[$k] = $v;

        }

        public function __get($idx){
            return (isset($this->params[$idx])) ? $this->params[$idx] : false;
        }

    }


