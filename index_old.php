<?php
require_once 'setting.php';

// подключение к MySQL
$connection = new mysqli($host, $user, $pass, $data);
if ($connection->connect_error) die('Error connection');

// запрос данных
$query = "select * from films";
$result = $connection->query($query);
if (!$result) die('Error select');

$rows = $result->num_rows;
for ($i = 0; $i < $rows; ++$i) {
    $result->data_seek($i);
    echo 'Title: ' . $result->fetch_assoc()['title'] . '<br>';
}

$result->close();
$connection->close();

//echo '<pre>';
//print_r($rows);
//echo '</pre>';
