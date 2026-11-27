<?php
declare(strict_types=1);


$now = time();
$birthday = mktime(0, 0, 0, 1, 1, 2005);
$hour = (int) getdate($now)['hours'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Использование функций даты и времени</title>
</head>
<body>
	<h1>Использование функций даты и времени</h1>
<?php

if ($hour >= 0 && $hour < 6) {
	$welcome = 'Доброй ночи';
} elseif ($hour >= 6 && $hour < 12) {
	$welcome = 'Доброе утро';
} elseif ($hour >= 12 && $hour < 18) {
	$welcome = 'Добрый день';
} elseif ($hour >= 18 && $hour <= 23) {
	$welcome = 'Добрый вечер';
} else {
	$welcome = 'Доброй ночи';
}

echo $welcome . '<br>';

$formatter = new IntlDateFormatter(
	'ru_RU.UTF-8',
	IntlDateFormatter::FULL,
	IntlDateFormatter::MEDIUM,
	'Europe/Moscow',
	IntlDateFormatter::GREGORIAN,
	"Сегодня d MMMM yyyy года, EEEE HH:mm:ss"
);
echo $formatter->format($now) . '<br>';

$diff = $birthday - $now;
$days = (int) floor($diff / 86400);
$hours = (int) floor(($diff % 86400) / 3600);
$minutes = (int) floor(($diff % 3600) / 60);
$seconds = $diff % 60;

echo 'До моего дня рождения осталось ' . $days . ' дней, ' . $hours . ' часов, ' . $minutes . ' минут и ' . $seconds . ' секунд';
?>
</body>
</html>