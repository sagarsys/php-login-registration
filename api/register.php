<?php
// allow the config
define('__CONFIG__', true);
// require the config
require_once '../inc/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // always return JSON format
    header('Content-Type: application/json');
    // return data
    $return = [];

    // Get POSTed data
    $email = $_REQUEST['email'];

    // Sanitize email
//    $email = Filter::Email($email);

    // hash password
    $password = password_hash( $_REQUEST['password'], PASSWORD_DEFAULT);

    // check if user exists
    $findUser = $con->prepare("SELECT user_id FROM users WHERE email=LOWER(:email) LIMIT 1");
    $findUser->bindParam(':email', $email, PDO::PARAM_STR);
    $findUser->execute();

    if ($findUser->rowCount() == 1) {

        // user exists
        $return['error'] = "You already have an account. <a href='/login.php'>Login here</a>";
        $return['is_logged_in'] = false;

    } else {

        // user does not exist -> add user
        $addUser = $con->prepare('INSERT INTO users(email, password) VALUES(LOWER(:email), :password)');
        $addUser->bindParam(':email', $email, PDO::PARAM_STR);
        $addUser->bindParam(':password', $password, PDO::PARAM_STR);
        $addUser->execute();

        // get the user id and store it in a PHP session
        $user_id = $con->lastInsertId();
        $_SESSION['user_id'] = (int) $user_id;

        // return user info and redirect to dashboard
        $return['redirect'] = "/dashboard.php?user=$user_id";
        $return['is_logged_in'] = true;

    }
//    echo $return; var_dump($return);
    echo json_encode($return, JSON_FORCE_OBJECT);
    exit;

} else {

    header('Location: /');
    exit('Invalid URL');

}
