<?php
declare(strict_types=1);

/**
 * Отрисовывает таблицу умножения.
 *
 * @param int $cols Число столбцов
 * @param int $rows Число строк
 * @param string $color Цвет фона ячеек первой строки и первого столбца
 * @return int Общее число вызовов функции
 */
function getTable(int $cols = 10, int $rows = 10, string $color = '#ffff00'): int
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

/**
 * Отрисовывает меню навигации.
 *
 * @param array<int, array{link: string, href: string}> $menu Структура меню
 * @param bool $vertical true - вертикальное меню, false - горизонтальное
 * @return void
 */
function getMenu(array $menu, bool $vertical = true): void
{
	$class = $vertical ? 'menu' : 'menu horizontal';
	echo '<ul class="' . $class . '">';
	foreach ($menu as $item) {
		echo '<li><a href="' . htmlspecialchars($item['href']) . '">' . htmlspecialchars($item['link']) . '</a></li>';
	}
	echo '</ul>';
}
