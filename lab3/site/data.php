<?php
declare(strict_types=1);


$leftMenu = [
	['link' => 'Домой', 'href' => 'index.php'],
	['link' => 'О нас', 'href' => 'about.php'],
	['link' => 'Контакты', 'href' => 'contact.php'],
	['link' => 'Таблица умножения', 'href' => 'table.php'],
	['link' => 'Калькулятор', 'href' => 'calc.php'],
];


$cols = filter_input(INPUT_GET, 'cols', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 20]]) ?: 5;
$rows = filter_input(INPUT_GET, 'rows', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 20]]) ?: 5;
$color = (string) filter_input(INPUT_GET, 'color', FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/^#[0-9a-fA-F]{6}$/']]);
if ($color === '') {
	$color = '#ff0000';
}
