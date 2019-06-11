<?php
    function debug($data, $is_exit=false){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        if($is_exit){
            exit;
        }
    }

    function setFlash( $key, $msg){
        $_SESSION[$key] = $msg;
    }

    function redirect($path, $key= null, $msg = null){
        if($key != null){
            setFlash($key, $msg);
        }
        header("location: ".$path);
        exit;
    }

    function flash(){
        if(isset($_SESSION['error']) && !empty($_SESSION['error'])){
            echo "<p class='alert alert-danger'>".$_SESSION['error']."</p>";
            unset($_SESSION['error']);
        }
        if(isset($_SESSION['success']) && !empty($_SESSION['success'])){
            echo "<p class='alert alert-success'>".$_SESSION['success']."</p>";
            unset($_SESSION['success']);
        }
    }

    function generateRandomString($length = 100){
        $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $str_leng = strlen($chars);
        $random = "";

        for($i=0; $i< $length; $i++){
            $random .= $chars[rand(0, $str_leng-1)];
        }
        return $random;
    }

    function sanitize($string){
        $string = strip_tags($string);
        $string = rtrim($string);
        return $string;
    }

    function uploadSingleImage($file, $dir){
        if($file['error'] == 0){
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            if(in_array(strtolower($ext), ALLOWED_EXTENSIONS)){
                if($file['size'] <= 5000000){
                    $upload_path = UPLOAD_DIR.$dir;
                    if(!is_dir($upload_path)){
                        mkdir($upload_path, 0777, true);
                    }

                    $file_name = ucfirst($dir).'-'.date('Ymdhis').rand(0,99).".".$ext;
                    $success = move_uploaded_file($file['tmp_name'], $upload_path.'/'.$file_name);
                    if($success){
                        return $file_name;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }