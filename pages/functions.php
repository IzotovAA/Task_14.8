<!-- <a href="../index.php">Вернуться на главную</a> -->

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
    $users_array = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/pages/users.txt'), true);

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

// функция высчитывает оставшееся время акции и размер скидки, в ДР 10% в другие дни 5%
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


    // $users = getUsersList();
    // $login = getCurrentUser();
    // $reg_date = (int) $users[$login]['regtime'];
    $login_time = $_SESSION['entrytime'];

    // $target_date = $reg_date + 86400;
    $target_date = $login_time + 86400;

    // 24 часа
    // 1440 минут
    // 86400 секунд

    $time_left = $target_date - time();
    $time_left_check = $time_left;

    // $days = floor($time_left / (60 * 60 * 24)); //day
    // $time_left %= (60 * 60 * 24);

    $hours = floor($time_left / (60 * 60)); //hour
    $time_left %= (60 * 60);

    $min = floor($time_left / 60); //min
    $time_left %= 60;

    $sec = $time_left; //sec

    $discount = '5%';

    if (checkBirthday()) {
        $discount = '10%';
    }

    if ($time_left_check <= 0) {
        echo 'Акция закончилась';
    } else {
        echo "Для вас действует персональная скидна на все услуги салона - $discount.<br>";
        echo "До окончании акции осталось $hours ч. $min м. $sec с.";
    }
}
// ...

// функция проверяет действует ли акция на данный момент
// если да возвращает true иначе false
function checkPromotionTime()
{
    // $users = getUsersList();
    // $login = getCurrentUser();

    $login_time = $_SESSION['entrytime'];
    // $target_date = (int) $users[$login]['regtime'] + 86400;
    $target_date = $login_time + 86400;

    $time_left = $target_date - time();


    if ($time_left > 0) {
        return true;
    } else return false;
}
// ...

// функция проверяет когда ДР у залогиненного пользователя
// если сегодня то поздравляет, если нет то показывает сколько дней осталось до ДР
function getUserBirthday()
{
    $users = getUsersList();
    $login = getCurrentUser();
    $user_birthday = $users[$login]['birthday'];
    $birthday = mb_substr($user_birthday, 5);
    $today = date('m\-d');
    $year = date('o');

    // echo $today . "\n";
    // echo $birthday;

    if ($today === $birthday) {
        echo "Поздравляем Вас с днём рождения!";
    } else {
        // echo $user_months = mb_substr($user_birthday, 5, 2);
        // echo $user_days = mb_substr($user_birthday, 8);
        // echo $today_months = mb_substr($today, 0, 2);
        // echo $today_days = mb_substr($today, 3);
        $birthday_unix = strtotime("$year-$birthday 00:00:00+0400");
        $today_unix = strtotime("$year-$today 00:00:00+0400");
        $time_left = ($birthday_unix - $today_unix) / (60 * 60 * 24);
        if ($time_left < 0) {
            $time_left = 365 - -$time_left;
            echo "До вашего дня рождения осталось $time_left д.";
        } else echo "До вашего дня рождения осталось $time_left д.";
    }
}
// ...

// функция проверяет ДР залогиненного пользователя, если сегодня возвращает true, иначе false
function checkBirthday()
{
    $users = getUsersList();
    $login = getCurrentUser();
    $user_birthday = $users[$login]['birthday'];
    $birthday = mb_substr($user_birthday, 5);
    $today = date('m\-d');

    if ($today === $birthday) {
        return true;
    } else return false;
}
// ...

// функция рассчитывает цену на услуги в зависимости от скидки, возвращает цена - скидка 
function getDiscound($price)
{
    if (checkBirthday()) {
        return $price * 0.9;
    } else return $price * 0.95;
}
// ...