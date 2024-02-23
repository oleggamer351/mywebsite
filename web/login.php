<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_username = $_POST['login_username'];
    $login_password = $_POST['login_password'];
    $users = file_get_contents("users.txt");
    $user_data = explode("\n", $users);
    $is_authenticated = false;
    foreach ($user_data as $user) {
        $data = explode(",", $user);
        if ($data[0] == $login_username && $data[1] == $login_password) {
            $_SESSION['username'] = $login_username;
            echo "Успешный вход пользователем: $login_username";
            $is_authenticated = true;
            break;
        }
    }
    if (!$is_authenticated) {
        echo "Неверное имя пользователя или пароль. Попробуйте еще раз.";
    }
}
?>