<?php
    class User extends Database{

        public function __construct(){
            parent::__construct();
            $this->table('admin');
        }

        public function getUserByUsername($user_name){
            // SELECT * FROM users WHERE email = '".$user_name."'
            $args = array(
                //'fields' => 'id, name, email, password, status, role',
                // 'where' => " email = '".$user_name."'"
                'where' => array(
                    'email' => $user_name,
                    // 'status' => 'active',
                    // 'role' => 'admin'
                )
            );
            return $this->select($args);
        }
        public function getUserByToken($token){
            // SELECT * FROM users WHERE email = '".$user_name."'
            $args = array(
                'where' => array(
                    'remember_token' => $token,
                )
            );
            return $this->select($args);
        }

        public function updateUser($remember_token, $user_id, $is_debug= false){
            // UPDATE users SET remeber_token = :remember_token WHERE id = :id
            //$data = "remember_token = '".$remember_token."'";
 
            $data = array(
                'remember_token' => $remember_token
            );
            $args = array(
                'where' => array(
                    'id' => $user_id
                    )
            );

            return $this->update($data, $args, $is_debug);
        }
    }