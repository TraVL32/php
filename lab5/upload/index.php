<?php
declare(strict_types=1);

/**
 * Возвращает список изображений в каталоге.
 *
 * @param string $dir Путь к каталогу
 * @return string[] Имена файлов-изображений
 */
function getImages(string $dir): array
{
	$images = [];
	foreach (scandir($dir) ?: [] as $file) {
		$path = $dir . '/' . $file;
		if (is_file($path) && str_starts_with((string) mime_content_type($path), 'image/')) {
			$images[] = $file;
		}
	}
	return $images;
}

$images = getImages(__DIR__);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Галерея</title>
	<style>
		body { font-family: Arial, sans-serif; background: #f4f7f6; margin: 0; padding: 20px; }
		h1 { text-align: center; }
		.gallery { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 15px; }
		.gallery a { display: block; background: #fff; padding: 8px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,.1); transition: transform .2s; }
		.gallery a:hover { transform: translateY(-4px); }
		.gallery img { width: 100%; height: 180px; object-fit: cover; border-radius: 6px; display: block; }
	</style>
</head>
<body>
	<h1>Галерея изображений</h1>
	<?php if ($images === []): ?>
		<p style="text-align:center">Изображений пока нет</p>
	<?php else: ?>
		<div class="gallery">
			<?php foreach ($images as $image): ?>
				<a href="<?= rawurlencode($image) ?>"><img src="<?= rawurlencode($image) ?>" alt="<?= htmlspecialchars($image) ?>"></a>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</body>
</html>
