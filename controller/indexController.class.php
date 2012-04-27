<?php


    class indexController Extends Controller {

        public function index() {

            $this->registry->view->title = 'Welcome to eshop';

            $this->registry->view->render('index');

        }

    }


