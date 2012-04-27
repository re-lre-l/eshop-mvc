<?php


class registerController Extends Controller {

    public function index() {

        $this->registry->view->title = 'Welcome to eshop';

        if($this->registry->auth->check()){
            header("Location: /store");
            return;
        }

        $this->registry->view->render('register');

    }

    public function createuser(){
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

        if($this->registry->request->pass !== $this->registry->request->pass_confirm){
            $errmsg[] = 'Wrong password confirmation';
        }

        /** Instance of UserList class, lib/userlist.class.php */
        $ul = new UserList();

        /** Check if user exists */
        if($ul->isRegistered($this->registry->request->login)){
            $errmsg[] = 'This username is unavailable.';
        }

        /** Create new user */
        if(false == $ul->createUser( $this->registry->request->login, $this->registry->request->pass )){
            $errmsg[] = 'Fatal error. Try again later.';
        }

        if(count($errmsg) > 0){
            $this->registry->view->errormessages = $errmsg;
            $this->registry->view->render('register');
            return;
        }

        unset($ul);

        $this->registry->view->render('register_ok');
    }

}


