<?php
declare(strict_types=1);

/**
 * Меняет местами значения двух переменных, переданных по ссылке.
 *
 * @param mixed $x Первая переменная
 * @param mixed $y Вторая переменная
 * @return void
 */
$swap = function (&$x, &$y): void {
	[$x, $y] = [$y, $x];
};

/**
 * Применяет коллбэк к каждому элементу массива.
 *
 * @param array<int|string, mixed> $array Исходный массив
 * @param callable $callback Функция, применяемая к элементу
 * @return array<int|string, mixed> Изменённый массив
 */
function map(array $array, callable $callback): array
{
	$result = [];
	foreach ($array as $key => $value) {
		$result[$key] = $callback($value);
	}
	return $result;
}

$a = 5;
$b = 8;
$swap($a, $b);
var_dump(5 === $b, 8 === $a);

echo '<br>' . implode(', ', map([1, 2, 3, 4, 5], fn(int $n): int => $n ** 2));
