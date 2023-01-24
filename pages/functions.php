<?php

// функция возвращает массив пользователей с зашифрованными паролями
function getUsersList()
{
    // забираем из текстого файла строку с базой пользователей
    //декодируем её в ассоциативный массив и присваиваем переменной
    $users_array = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/pages/users.txt'), true);

    return $users_array;
}
// ...

// функция проверяет существует ли пользователь с данным логином, возвращает true или false
function existsUser($login)
{
    $users = getUsersList();
    $flag = false;

    foreach ($users as $key => $value) {
        if ($key === $login) {
            $flag = true;
            break;
        }
    }

    return $flag;
}
// ...

// функция проверяет существует ли логин и корректен ли пароль, возвращает true или false
function checkPassword($login, $password)
{
    $users = getUsersList();
    return (existsUser($login) && sha1($password) === $users[$login]['password']) ? true : false;
}
// ...

// функция возвращает имя авторизованного пользователя либо null
function getCurrentUser()
{
    session_start();

    if ($_SESSION && $_SESSION['login']) {
        return $_SESSION['login'];
    } else return null;
}
// ...

// функция высчитывает оставшееся время акции и размер скидки, в ДР 10% в другие дни 5%
function getPromotionTime()
{
    // $users = getUsersList();
    // $login = getCurrentUser();
    // $reg_date = (int) $users[$login]['regtime'];

    // время входа
    $login_time = $_SESSION['entrytime'];

    // $target_date = $reg_date + 86400;

    // время до цели (время входа плюс сутки)
    $target_date = $login_time + 86400;

    // расчёт оставшегося времени
    $time_left = $target_date - time();

    // оставшееся время для проверки условия
    $time_left_check = $time_left;

    // оставшееся время в часах
    $hours = floor($time_left / (60 * 60));
    $time_left %= (60 * 60);

    // оставшееся время в минутах
    $min = floor($time_left / 60);
    $time_left %= 60;

    // оставшееся время в секундах
    $sec = $time_left;

    // скидка по умолчанию
    $discount = '5%';

    // если у пользователя день рождения то скидка становится 10%
    if (checkBirthday()) {
        $discount = '10%';
    }
    // ...

    // проверка окончания акции, если не закончилась то выводит оставшееся время
    if ($time_left_check <= 0) {
        echo 'Акция закончилась';
    } else {
        echo "Для вас действует персональная скидна на все услуги салона - $discount.<br>";
        echo "До окончании акции осталось $hours ч. $min м. $sec с.";
    }
    // ...
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

// функция проверяет когда ДР у авторизованного пользователя
// если сегодня то поздравляет, если нет то показывает сколько дней осталось до ДР
function getUserBirthday()
{
    // выгружаем массив пользователей
    $users = getUsersList();

    // узнаём текущего пользователя
    $login = getCurrentUser();

    // достаём день рождения текущего пользователя из массива
    $user_birthday = $users[$login]['birthday'];

    // вытаскиваем месяц и день
    $birthday = mb_substr($user_birthday, 5);

    // получаем текущий месяц и день в таком же формате как и $birthday
    $today = date('m\-d');

    // получаем текущий год
    $year = date('o');

    // если ДР вытащенный из массива равен текущему месяцу и дню,
    // то поздравляем с днём рождения
    if ($today === $birthday) {
        echo "Поздравляем Вас с днём рождения!";
    } else {
        // соединяем текущий год с месяцем и днём рождения
        // переводим в формат unix
        $birthday_unix = strtotime("$year-$birthday 00:00:00+0400");

        // тоже самое проделываем с текущим днём
        $today_unix = strtotime("$year-$today 00:00:00+0400");

        // вычисляем оставшееся до ДР время (в сутках)
        $time_left = ($birthday_unix - $today_unix) / (60 * 60 * 24);

        if ($time_left < 0) {
            // если оставшееся время меньше нуля, то в этом году ДР уже был
            // пересчитываем оставшееся время на следующий год, что бы оно стало положительным числомм
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

// функция рассчитывает цену на услуги в зависимости от скидки, возвращает цена минус скидка 
function getDiscound($price)
{
    if (checkBirthday()) {
        return $price * 0.9;
    } else return $price * 0.95;
}
// ...