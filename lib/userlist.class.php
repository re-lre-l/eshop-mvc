<?php


    /**
    *
    */
    class UserList {
        const DataFileName = "/tmp/users";
        const storageSize = 65535;
        /**
        * Storage version 0.1.
        *  - Serialized php array.
        *  - $storage['username'] = 'md5_password_hash';
        * @Todo
        *  - use LinkedList with fixed size for storage
        */
        public $storage = array();


        public function __construct(){
            /**
             * Initialize user storage. If there is no file {DataFileName}, create it
            * with empty {storage} array.
            */
            if(!is_file(UserList::DataFileName)){

                if( false == $this->saveStorage() ){
                    die("Fatal Error. Can't initialize user storage.");
                }

            }
            /**
            * Load user storage.
            */
            $this->storage = unserialize( file_get_contents(UserList::DataFileName) );

        }

        public function __destruct(){
            $this->saveStorage();
            return;

        }

        public function saveStorage(){
            return file_put_contents(UserList::DataFileName, serialize($this->storage), LOCK_EX);
        }

        public function isRegistered ($userName){
            /**
            * Returns password if user exists.
            */
            return (isset($this->storage[$userName])) ? $this->storage[$userName] : false;
        }

        public function createUser ($userName, $userPass) {

            if($this->isRegistered($userName)){
                return (false);
            }

            $this->storage[$userName] = md5($userPass);
            return(true);
        }
    }

