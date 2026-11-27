<?php
$visits = 0;
$lastVisit = '';
$hadVisits = isset($_COOKIE['visits']);

if ($hadVisits) {
	$visits = filter_var($_COOKIE['visits'], FILTER_VALIDATE_INT, [
		'options' => ['min_range' => 1],
	]);
	$visits = $visits === false ? 0 : $visits;

	if (isset($_COOKIE['last_visit'])) {
		$lastVisit = htmlspecialchars(trim($_COOKIE['last_visit']), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
	}
}

$visits++;
$now = date('d-m-Y H:i:s');
$expires = time() + 86400;

setcookie('visits', (string) $visits, $expires, '/');
setcookie('last_visit', $now, $expires, '/');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Последний визит</title>
</head>
<body>
	<h1>Последний визит</h1>
	<?php if (!$hadVisits): ?>
		<p>Добро пожаловать!</p>
	<?php else: ?>
		<p>Вы зашли на страницу <?= $visits ?> раз</p>
		<?php if ($lastVisit !== ''): ?>
			<p>Последнее посещение: <?= $lastVisit ?></p>
		<?php endif; ?>
	<?php endif; ?>
</body>
</html>
