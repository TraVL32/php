<?php
declare(strict_types=1);

/**
 * Проверяет сложность пароля.
 *
 * @param string $password Пароль
 * @return bool true - пароль достаточно сложный, false - недостаточно
 */
function isStrongPassword(string $password): bool
{
	return (bool) preg_match('/[A-Z]/', $password)
		&& (bool) preg_match('/[a-z]/', $password)
		&& (bool) preg_match('/\d/', $password)
		&& mb_strlen($password) >= 8;
}


$login = ' User ';
$password = 'megaP@ssw0rd';
$name = 'иван';
$email = 'ivan@petrov.ru';
$code = '<?=$login?>';
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Использование функций обработки строк</title>
</head>
<body>
	<h1>Использование функций обработки строк</h1>
<?php

$login = mb_strtolower(trim($login));
echo 'Логин: ' . $login . '<br>';

echo 'Пароль сложный: ' . (isStrongPassword($password) ? 'да' : 'нет') . '<br>';

$name = mb_strtoupper(mb_substr($name, 0, 1)) . mb_substr($name, 1);
echo 'Имя: ' . $name . '<br>';

echo 'Email корректный: ' . (filter_var($email, FILTER_VALIDATE_EMAIL) !== false ? 'да' : 'нет') . '<br>';

echo 'Код: ' . htmlspecialchars($code) . '<br>';
?>
</body>
</html>