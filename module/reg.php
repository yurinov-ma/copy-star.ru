<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $surname = htmlspecialchars($_POST["surname"]);
    $name = htmlspecialchars($_POST["name"]);
    $patronymic = htmlspecialchars($_POST["patronymic"]);
    $email = htmlspecialchars($_POST["email"]);
    $login = htmlspecialchars($_POST["login"]);
    $password = htmlspecialchars($_POST["password"]);
    $password_repeat = htmlspecialchars($_POST["password_repeat"]);

    if(password !== $password_repeat) {
        $error= "Пароли не совпадат"
    }else{
        $sql_check = "SELECT * FROM `users` WHERE `login` = '$login' OR 'email` = '$email'";
        $result = $conn->query($sql_check);
        if ($result->rowCount()) {
            $error="Пользователь с таким логином или email существеут";
        }else{
            $sql = "SELECT 'id' FROM 'roles' WHERE 'code'= 'client'";
            $result = $conn->query($sql);
            $role_id=$result->fetchColumn();


            $sql = "SELECT 'id' FROM 'users' WHERE 'login'= '$login' AND 'password'= '$password'";
            $result = $conn->query($sql);
            if($result)
        }
    }
}
?>

    <section class="p-5 d-flex flex-column gap-2">
    <h2>Регистрация</h2>
    <?= isset($error) ?>
    <form class="p-5 d-flex flex-column gap-2" action="index.php?page=reg" method="post">
        <input type="text" class="form-control" name="surname" placeholder="Фамилия">
        <input type="text" class="form-control" name="name" placeholder="Имя">
        <input type="text" class="form-control" name="patronymic" placeholder="Отчество">
        <input type="text" class="form-control" name="email" placeholder="Email">
        <input type="text" class="form-control" name="login" placeholder="Логин">
        <input type="text" class="form-control" name="password" placeholder="Пароль">
        <input type="text" class="form-control" name="password_repeat" placeholder="Проверка пороля">
        <label>
            <input type="checkbox" required> Я ознакомлен с <a href="#">правилами сайта</a>
        </label>
        <button class="btn-dark" type="submit">Вход</button>
    </form>
    </section><?php
