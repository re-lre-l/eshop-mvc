<?php

    class loginController Extends Controller {

        public function index() {

            $this->registry->view->title = 'Welcome to eshop';

            if($this->registry->auth->check()){
                header("Location: /store");
                return;
            }

            $this->registry->view->render('login');
        }

        public function signin(){
            $errmsg = array();

            if($this->registry->auth->check()){
                header("Location: /store");
                return;
            }

            if(false == preg_match('/^[a-zA-Z0-9_]+$/', $this->registry->request->login)){
                $errmsg[] = 'Login should consist from alphanumeric characters';
            }

            if(false == preg_match('/^[a-zA-Z0-9_]+$/', $this->registry->request->pass)){
                $errmsg[] = 'Password should consist from alphanumeric characters';
            }

            /** instance of UserList class, lib/userlist.class.php */
            $ul = new UserList();

            if(!($passwordHash = $ul->isRegistered($this->registry->request->login))){
                $errmsg[] = 'Wrong login.';
            }

            if(md5($this->registry->request->pass) !== $passwordHash){
                $errmsg[] = 'Wrong password.';
            }

            if(count($errmsg) > 0){
                $this->registry->view->errormessages = $errmsg;
                $this->registry->view->render('login');
                return;
            }

            unset($ul);

            $this->registry->auth->login();

            $this->registry->view->username = $this->registry->request->login;
            $this->registry->view->render('login_ok');
        }

        public function signout(){

            if($this->registry->auth->check()){
                $this->registry->auth->logout();

            }

            header("Location: /store");
            return;
        }
    }
