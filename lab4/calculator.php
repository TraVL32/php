<?php
declare(strict_types=1);

/**
 * Выполняет арифметическую операцию над двумя числами.
 *
 * @param float $a Первое число
 * @param float $b Второе число
 * @param string $operator Оператор: +, -, * или /
 * @return float|string Результат или текст ошибки
 */
function calculate(float $a, float $b, string $operator): float|string
{
	switch ($operator) {
		case '+':
			return $a + $b;
		case '-':
			return $a - $b;
		case '*':
			return $a * $b;
		case '/':
			return $b == 0.0 ? 'Делить на ноль нельзя' : $a / $b;
		default:
			return 'Неизвестный оператор';
	}
}

$result = null;
$num1 = '';
$num2 = '';
$operator = '+';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$num1 = trim(strip_tags((string) ($_POST['num1'] ?? '')));
	$num2 = trim(strip_tags((string) ($_POST['num2'] ?? '')));
	$operator = (string) ($_POST['operator'] ?? '+');

	$a = filter_var(str_replace(',', '.', $num1), FILTER_VALIDATE_FLOAT);
	$b = filter_var(str_replace(',', '.', $num2), FILTER_VALIDATE_FLOAT);

	if ($a === false || $b === false) {
		$result = 'Введите корректные числа';
	} else {
		$result = calculate($a, $b, $operator);
	}
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Калькулятор</title>
</head>
<body>

<h1>Калькулятор</h1>

<?php
if ($result !== null) {
	echo '<p>Результат: <strong>' . htmlspecialchars((string) $result) . '</strong></p>';
}
?>

<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">

<p><label for="num1">Число 1</label><br>
<input type="text" name="num1" id="num1" value="<?= htmlspecialchars($num1) ?>" required></p>

<p><label for="operator">Оператор</label><br>
<select name="operator" id="operator">
	<?php foreach (['+', '-', '*', '/'] as $op): ?>
		<option value="<?= $op ?>"<?= $operator === $op ? ' selected' : '' ?>><?= $op ?></option>
	<?php endforeach; ?>
</select></p>

<p><label for="num2">Число 2</label><br>
<input type="text" name="num2" id="num2" value="<?= htmlspecialchars($num2) ?>" required></p>

<button type="submit">Считать!</button>

</form>

</body>
</html>
