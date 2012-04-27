<?php

    class Error404Controller extends Controller {

        public function index(){

            $this->registry->view->render('error404');

        }

    }