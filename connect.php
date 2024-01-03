<?php
require_once 'setting.php';

function tt($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}

function dbCheckError($query){
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE){
        echo $errInfo[2];
        echo "Error";
        exit();
    }
    return true;
}

function selectAll($table, $params = [])
{
    global $pdo;
    $sql = "select * from $table";

    if (!empty($params)) {
        $i = 0;
        foreach ($params as $key => $value) {
            if (!is_numeric($value))
                $value = "'" . $value . "'";
            if ($i === 0)
                $sql = $sql . " where $key=$value";
            else
                $sql = $sql . " and $key=$value";
            $i++;
        }
    }

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);

    return $query->fetchAll();
}

function insert($table, $login, $pass, $email){
    global $pdo;
    $sql = "insert into $table (login, pass, email) values ('$login', '$pass', '$email')";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}

$paramsFilms_users = [
    'Id_users' => '1',
];

$paramsFilms = [
    //'Id_users' => '1',
];

function selectCount($table, $id, $key){
    global $pdo;
    $sql = "select count(*) from $table where $id = $key";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

# Вывод всех элементов таблицы фильмов
//print_r("vaddik's films:<br>");
//for ($i = 0; $i < 5; $i++){
//    $id_films = selectAll('films_users', $paramsFilms_users)[$i]['Id_films'];
//    print_r($id_films . "<br>");
//    tt(selectAll('films', $paramsFilms = ['filmId' => $id_films])[0]['title']);
//}

# При добавлении индекса и параметра можно вывести определенные значения
//tt(selectAll('films', $params)[0]['rating']);

//for ($i = 0; $i < 10; $i++)
//    tt(selectAll('films', $params)[$i]['rating']);