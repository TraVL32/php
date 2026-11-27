<?php
$pageTitles = [
	'page1.php' => 'Страница 1',
	'page2.php' => 'Страница 2',
	'page3.php' => 'Страница 3',
];
?>
<h2>Список посещённых страниц</h2>
<ol>
	<?php foreach ($_SESSION['visited_pages'] ?? [] as $visitedPage): ?>
		<li><?= htmlspecialchars($pageTitles[$visitedPage] ?? $visitedPage, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></li>
	<?php endforeach; ?>
</ol>
