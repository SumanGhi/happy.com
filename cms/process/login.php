<?php
    require $_SERVER['DOCUMENT_ROOT']."/config/init.php";

    $user = new User();

    if(isset($_POST) && !empty($_POST)){
       
        $user_name = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL); // email or false
        
        if(!$user_name){
            debug($user_name,true);
            redirect('../', 'error', 'Invalid username');
        }

        $enc_passwrod = sha1($user_name.$_POST['password']);

        $user_info = $user->getUserByUsername($user_name);
        if(!$user_info){
           
            redirect('../','error','User not found');
        } else {

            if($user_info[0]->password == $enc_passwrod){
                if($user_info[0]->role == 'admin'){
                    if($user_info[0]->status == 'active'){
                        $_SESSION['user_id'] = $user_info[0]->id;
                        $_SESSION['name'] = $user_info[0]->name;
                        $_SESSION['email'] = $user_info[0]->email;

                        $token = generateRandomString();
                        $_SESSION['token'] = $token;
                        // Cookie

                        if(isset($_POST['remember']) && !empty($_POST['remember'])){
                            setcookie('_au', $token, (time()+864000), "/");
                            $user->updateUser($token, $user_info[0]->id);
                        }

                        redirect('../dashboard.php','success','Welcome to admin panel.');
                    } else {
                        redirect('../','error','Your acount is disabled to access. Please contact Administraion.');                        
                    }
                } else {
                    redirect('../','error','You do not have previlage to access the system.');
                }
            } else {

                redirect('../','error','Password does not match');
            }
        }

    } else {
        redirect('../', 'error', 'Provide your username and password');
    }
