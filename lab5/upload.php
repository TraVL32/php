<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Загрузка файла на сервер</title>
</head>
 <body>
  <div>
   <?php
	if (isset($_FILES['fupload'])) {
		$file = $_FILES['fupload'];
		echo 'Имя файла: ' . htmlspecialchars((string) $file['name']) . '<br>';
		echo 'Размер: ' . $file['size'] . ' байт<br>';
		echo 'Временное имя: ' . htmlspecialchars((string) $file['tmp_name']) . '<br>';
		echo 'Тип: ' . htmlspecialchars((string) $file['type']) . '<br>';
		echo 'Код ошибки: ' . $file['error'] . '<br>';

		if ($file['error'] === UPLOAD_ERR_OK && is_uploaded_file($file['tmp_name'])) {
			$mime = mime_content_type($file['tmp_name']);
			echo 'Реальный тип (Fileinfo): ' . $mime . '<br>';

			if ($mime === 'image/jpeg') {
				$name = hash_file('sha256', $file['tmp_name']) . '.jpg';
				$target = __DIR__ . '/upload/' . $name;
				if (move_uploaded_file($file['tmp_name'], $target)) {
					echo 'Файл загружен: <a href="upload/' . $name . '">' . $name . '</a><br>';
				} else {
					echo 'Не удалось сохранить файл<br>';
				}
			} else {
				echo 'Разрешены только файлы image/jpeg<br>';
			}
		}
	}
   ?>

  </div>
  <form enctype="multipart/form-data"
        action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <p>
      <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
      <input type="file"   name="fupload"><br>
      <button type="submit">Загрузить</button>
    </p>
   </form>
 </body>
</html>
