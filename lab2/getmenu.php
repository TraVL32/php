<?php
declare(strict_types=1);

/**
 * Отрисовывает меню.
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

$leftMenu = [
	['link' => 'Home', 'href' => '/'],
	['link' => 'About', 'href' => '/about.php'],
	['link' => 'Contacts', 'href' => '/contacts.php'],
	['link' => 'Gallery', 'href' => '/gallery.php'],
];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Меню</title>
	<style>
		.menu {
			list-style-type: none;
			margin: 0;
			padding: 0;
		}

		.horizontal li {
			display: inline;
			padding: 5px
		}
	</style>
</head>
<body>
	<h1>Меню</h1>
	<?php
	// ЗАДАНИЕ 3: вертикальное меню
	getMenu($leftMenu);

	// ЗАДАНИЕ 4: горизонтальное меню
	getMenu($leftMenu, false);
	?>
</body>
</html>
