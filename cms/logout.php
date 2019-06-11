<?php
    require '../config/init.php';
    $user = new User();

    if(isset($_SESSION, $_SESSION['token'])){
        session_destroy();

        if(isset($_COOKIE, $_COOKIE['_au'])){
            setcookie('_au','', (time()-60), "/");
            
            $user->updateUser(null, $_SESSION['user_id']);
        }

        redirect('./');
    } else {
        redirect('./');
    }