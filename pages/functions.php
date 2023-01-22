<a href="../index.php">Вернуться на главную</a>

<?php
// include($_SERVER['DOCUMENT_ROOT'] . "/pages/users.php");

// include("users.php");
// phpinfo();
// echo 'functions' . "\n";

// функция возвращает массив пользователей с зашифрованными паролями
// function getUsersList()
// {
//     global $users;
//     // $users_pass_sha1 = $users;

//     // foreach ($users_pass_sha1 as $key => &$value) {
//     //     $value['password'] = sha1($value['password']);
//     // }

//     return $users;
// }

function getUsersList()
{
    $users_array = json_decode(file_get_contents('users.txt'), true);

    return $users_array;
}
// ...



// print_r(getUsersList());

// функция проверяет существует ли пользователь с данным логином, возвращает true или false
function existsUser($login)
{
    // global $users;
    $users = getUsersList();
    $flag = false;

    // foreach ($users as $key => $value) {
    foreach ($users as $key => $value) {
        if ($key === $login) {
            $flag = true;
            break;
        }
    }

    return $flag;
}
// ...

// echo (existsUser('admin') ? 'true' : 'false') . "\n";
// echo (existsUser('user2') ? 'true' : 'false') . "\n";

// функция проверяет существует ли логин и корректен ли пароль, возвращает true или false
function checkPassword($login, $password)
{
    // $users = getUsersList();
    // global $users;
    $users = getUsersList();
    // return (existsUser($login) && sha1($password) === $users[$login]['password']) ? true : false;
    return (existsUser($login) && sha1($password) === $users[$login]['password']) ? true : false;
}
// ...

// echo (checkPassword('user1', 'user31980') ? 'true' : 'false') . "\n";
// echo (checkPassword('user3', 'user3_1980') ? 'true' : 'false') . "\n";

// функция возвращает имя авторизованного пользователя либо null
function getCurrentUser()
{
    session_start();

    if ($_SESSION && $_SESSION['login']) {
        return $_SESSION['login'];
    } else return null;
}
// ...

// echo getCurrentUser() ?? 'null';

function getPromotionTime()
{
    // //A: RECORDS TODAY'S Date And Time
    // $today = time();

    // //B: RECORDS Date And Time OF YOUR EVENT
    // $event = mktime(0, 0, 0, 02, 25, 2023);

    // //C: COMPUTES THE DAYS UNTIL THE EVENT.
    // $countdown = round(($event - $today) / 86400);


    // //D: DISPLAYS COUNTDOWN UNTIL EVENT
    // echo "$countdown до окончании акции";



    // $wedding = strtotime("2023-01-23 12:00:00+0400"); // or whenever the wedding is
    // $secondsLeft = $wedding - time();
    // $days = floor($secondsLeft / (60 * 60 * 24)); // here the brackets
    // $hours = floor(($secondsLeft - ($days * 60 * 60 * 24)) / (60 * 60)); // and here too
    // $minutes = floor(($secondsLeft - ($days * 60 * 60 * 24)) / (60 * 60) / 24);
    // echo "До окончании акции осталось $hours часов $minutes минут $secondsLeft секунд" . "\n";
    // echo time();




    $target_date = time() + 86400;
    // 24 часа
    // 1440 минут
    // 86400 секунд

    $time_left = $target_date - time();

    // $days = floor($time_left / (60 * 60 * 24)); //day
    // $time_left %= (60 * 60 * 24);

    $hours = floor($time_left / (60 * 60)); //hour
    $time_left %= (60 * 60);

    $min = floor($time_left / 60); //min
    $time_left %= 60;

    $sec = $time_left; //sec

    echo "До окончании акции осталось $hours ч. $min м. $sec с.";
}
