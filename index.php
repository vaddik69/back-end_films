<?php
require_once 'connect.php';
//$image = selectAll('films', $params)[0]['image'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My site</title>
    <style>
        div {
            background: #E6E6FA; /* Цвет фона */
            border: 1px solid black; /* Параметры рамки */
            padding: 10px; /* Поля вокруг текста */
            margin-top: 20%; /* Отступ сверху */
            margin-left: 45%;
            margin-right: 45%;
        }
    </style>
</head>
<body>
<!--  <form action="register.php" method="post">-->
<!--      <input type="text" placeholder="login" name="login">-->
<!--      <input type="text" placeholder="password" name="pass">-->
<!--      <input type="text" placeholder="repeat password" name="repeatPass">-->
<!--      <input type="text" placeholder="email" name="email">-->
<!--      <button type="submit">Sign up</button>-->
<!--  </form>-->
<!--  <form action="login.php" method="post">-->
<!--      <input type="text" placeholder="login" name="login">-->
<!--      <input type="text" placeholder="password" name="pass">-->
<!--      <button type="submit">Sign in</button>-->
<!--  </form>-->
<div align="center">
<form action="register.php">
    <button>Регистрация</button>
</form>
    <form action="login.php">
        <button>Вход</button>
    </form>
</div>

</body>
</html>