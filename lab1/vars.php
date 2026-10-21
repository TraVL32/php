<?php
// ЗАДАНИЕ 1
$name = 'Роман';
$age = 20;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Переменные и вывод</title>
</head>
<body>
	<h1>Переменные и вывод</h1>
	<p><?php echo "Меня зовут: $name"; ?></p>
	<p><?php echo "Мне $age лет"; ?></p>
	<p>Тип $name: <?php echo gettype($name); ?></p>
	<p>Тип $age: <?php echo gettype($age); ?></p>
	<?php unset($name, $age); ?>
</body>
</html>