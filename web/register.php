<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents('php://input'), true);
    $username = $data['username'];
    // Можно добавить хеширование пароля для сохранения в базе данных
    $password = $data['password'];
    $user_data = "$username,$password\n";
    file_put_contents("users.txt", $user_data, FILE_APPEND);
    echo "Регистрация прошла успешно!";
}
?>