<?php
$user = new User();

if (!isset($_SESSION, $_SESSION['token']) || empty($_SESSION['token'])) {
    if (!isset($_COOKIE, $_COOKIE['_au']) || empty($_COOKIE['_au'])) {
        redirect('./');
    } else {
        $cookie_data = $_COOKIE['_au'];

        $user_info = $user->getUserByToken($cookie_data);
        //debug($user_info, true);
        if (!$user_info) {
            //debug("test", true);

            setcookie('_au', '', time() - 60, '/');
            redirect('./');
        } else {
            if ($user_info[0]->role == 'admin') {
                if ($user_info[0]->status == 'active') {
                    $_SESSION['user_id'] = $user_info[0]->id;
                    $_SESSION['name'] = $user_info[0]->name;
                    $_SESSION['email'] = $user_info[0]->email;

                    $token = generateRandomString();
                    $_SESSION['token'] = $token;
                    // Cookie

                    setcookie('_au', $token, (time() + 864000), "/");
                    $user->updateUser($token, $user_info[0]->id);

                    redirect('./dashboard.php', 'success', 'Welcome to admin panel.');
                } else {
                    //debug("testhere ", true);

                    setcookie('_au', '', time() - 60, '/');
                    redirect('./', 'error', 'Your acount is disabled to access. Please contact Administraion.');
                }
            }
        }
    }
}
