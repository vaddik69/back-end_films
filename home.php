<?php
require_once 'setting.php';
require_once 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $paramsUser = [
        'login' => $login,
        'pass' => $pass,
    ];
    $params = ['title', 'year', 'describe', 'rating', 'director', 'actors', 'producer', 'genre'];
    $params1 = ['Название: ', 'Год выпуска: ', 'Описание: ', 'Рейтинг: ', 'Режиссер: ', 'В главных ролях: ', 'Продюсер: ', 'Жанр: '];

    
    if (empty($login) || empty($pass)) {
        echo "Пожалуйста, заполните все поля";
    } else {
        if (selectAll('users', $paramsUser)) { ?>
            <h1 align="center">Здравствуйте, <?php print_r($login) ?>!</h1>
            <h1 align="center">Список ваших просмотренных фильмов</h1>
            <?php
            $userId = selectAll('users', $paramsUser)[0]['userId'];
            $row = selectCount('films_users', 'Id_users', $userId)[0]['count(*)'];
            for ($i = 0; $i < $row; $i++) {
                $id_films = selectAll('films_users', ['Id_users' => $userId])[$i]['Id_films'];
                $image = selectAll('films', ['filmId' => $id_films])[0]['image'];?>

                <table width="100%" cellspacing="0" cellpadding="0">
                    <tr>
                        <td class="leftcol"><img src="<?php print_r($image);?>"></td>
                        <td valign="top">
                            <h2><?php for ($a = 0; $a < 8; $a++){ tt($params1[$a] . selectAll('films', ['filmId' => $id_films])[0][$params[$a]]); }?></h2>
                        </td>
                    </tr>
                </table> <br>
                <?php
                //tt(selectAll('films', ['filmId' => $id_films])[0]);
            }
        } else {
            echo "Данного пользователя не существует, либо вы ввели неверный пароль";
        }
    }
} ?>
<style type="text/css">
    TD.leftcol {
        width: 110px; /* Ширина левой колонки с рисунком */
        vertical-align: top; /* Выравнивание по верхнему краю */
    }
    img {
        margin-right: 50px;
        width: 300px;
        height: 450px;
    }
</style>


