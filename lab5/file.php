<?php
declare(strict_types=1);

const FILE_NAME = __DIR__ . '/db/users.txt';

/**
 * Очищает строку, полученную от пользователя.
 *
 * @param mixed $value Исходное значение
 * @return string Очищенная строка
 */
function clean(mixed $value): string
{
	return htmlspecialchars(strip_tags(trim((string) $value)));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fname'], $_POST['lname'])) {
	$fname = clean($_POST['fname']);
	$lname = clean($_POST['lname']);

	if ($fname !== '' && $lname !== '') {
		$line = $fname . ' ' . $lname . PHP_EOL;
		$handle = fopen(FILE_NAME, 'ab');
		if ($handle !== false) {
			fwrite($handle, $line);
			fclose($handle);
		}
	}

	header('Location: ' . $_SERVER['REQUEST_URI']);
	exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Работа с файлами</title>
</head>
<body>

<h1>Заполните форму</h1>

<form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">

Имя: <input type="text" name="fname"><br>
Фамилия: <input type="text" name="lname"><br>

<br>

<input type="submit" value="Отправить!">

</form>

<?php
if (file_exists(FILE_NAME)) {
	$lines = file(FILE_NAME, FILE_IGNORE_NEW_LINES);
	echo '<h2>Гостевая книга</h2>';
	foreach ($lines as $i => $line) {
		echo ($i + 1) . '. ' . $line . '<br>';
	}
	echo '<p>Размер файла: ' . filesize(FILE_NAME) . ' байт</p>';
}
?>

</body>
</html>
