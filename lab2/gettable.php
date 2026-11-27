<?php
declare(strict_types=1);

/**
 * Отрисовывает таблицу умножения.
 *
 * @param int $cols Число столбцов
 * @param int $rows Число строк
 * @param string $color Фоновый цвет ячеек первой строки и первого столбца
 * @return int Общее число вызовов функции
 */
function getTable(int $cols = 10, int $rows = 10, string $color = 'yellow'): int
{
	static $count = 0;
	$count++;
	$color = htmlspecialchars($color);

	echo '<table>';
	for ($i = 1; $i <= $rows; $i++) {
		echo '<tr>';
		for ($j = 1; $j <= $cols; $j++) {
			if ($i === 1 || $j === 1) {
				echo '<th style="background-color: ' . $color . '">' . ($i * $j) . '</th>';
			} else {
				echo '<td>' . ($i * $j) . '</td>';
			}
		}
		echo '</tr>';
	}
	echo '</table>';

	return $count;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Таблица умножения</title>
	<style>
		table {
			border: 2px solid black;
			border-collapse: collapse;
		}

		th,
		td {
			padding: 10px;
			border: 1px solid black;
		}

		th {
			background-color: yellow;
		}
	</style>
</head>
<body>
	<h1>Таблица умножения</h1>
	<?php
	// ЗАДАНИЕ 3: вызов с разными параметрами
	getTable(5, 4, 'lightgreen');

	// ЗАДАНИЕ 5
	getTable();
	echo '<br>';
	getTable(6);
	echo '<br>';
	$count = getTable(7, 5);
	echo '<p>Функция getTable() вызвана раз: ' . $count . '</p>';
	?>
</body>
</html>
