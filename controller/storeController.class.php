<?php


    class storeController Extends Controller {
        protected $items = array('item1', 'item2', 'item3', 'item4');

        public function index() {

            $this->registry->view->items = $this->items;
            $this->registry->view->isLogged = ($this->registry->auth->check()) ? true : false;

            $this->registry->view->render('store');

        }

        public function buy(){
            $ret = array();

            if(false == $this->registry->auth->check()){
                header("Location: /login");
                return;
            }

            foreach($this->registry->request->qty as $id => $qty){
                $ret[$this->items[$id]] = $qty;
            }

            $this->registry->view->order = $ret;
            $this->registry->view->render('store_order');

            return;
        }

    }