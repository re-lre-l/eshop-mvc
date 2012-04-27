<?php


    class Auth {
        private $registry;
        public $params = array();

        public function __construct($registry) {
            $this->registry = $registry;

            ini_set("session.cookie_httponly", 1);
            session_name('eshopsession');

            session_start();

        }

        public function login(){
            $_SESSION['loggedin'] = 1;
        }

        public function logout(){
            $_SESSION['loggedin'] = 0;
        }

        public static function check(){

            if(isset($_SESSION['loggedin']))
                return (1 === $_SESSION['loggedin']) ? true : false;

            return false;

        }

    }


