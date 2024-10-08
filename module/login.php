<?php
if (isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['password']) && !empty($_POST['password'])) {
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);

    $sql = "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'";
    $result = $conn->query($sql);
    if ($result->rowCount()){
        $row=$result->fetch();
        $_SESSION['login'] = $row;
        header('Location: index.php');
    }

    $error= "Неправильно введен логин или пароль!";
}
?>

<section class="p-5 d-flex flex-column gap-2">
    <h2>Авторизация</h2>
    <p><?= isset($error) ?></p>
    <form class="p-5 d-flex flex-column gap-2" action="index.php?page=login" method="post">
        <input type="text" class="form-control" name="login" placeholder="Логин">
        <input type="text" class="form-control" name="password" placeholder="Пароль">
        <button class="btn-dark" type="submit">Вход</button>
    </form>
</section>