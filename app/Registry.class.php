<?php

    /**
    * @property Router router
    * @property View view
    * @property Request request
    * @property Auth auth
    */
    class Registry {

        private $vars = array();

        public function __set($idx, $val){
            $this->vars[$idx] = $val;
        }

        public function __get($idx){
            return $this->vars[$idx];
        }

    }

