<?php
declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$cols = abs((int) ($_POST['cols'] ?? 0));
	$rows = abs((int) ($_POST['rows'] ?? 0));
	$color = trim(strip_tags((string) ($_POST['color'] ?? '')));
}
$cols = !empty($cols) ? $cols : 10;
$rows = !empty($rows) ? $rows : 10;
$color = !empty($color) ? $color : '#ffff00';
?>
<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="POST">
  <label>Количество колонок: </label>
  <br>
  <input name='cols' type='text' value='<?= $cols ?>'>
  <br>
  <label>Количество строк: </label>
  <br>
  <input name='rows' type='text' value='<?= $rows ?>'>
  <br>
  <label>Цвет: </label>
  <br>
  <input name='color' type='color' value='<?= htmlspecialchars($color) ?>' list="listColors">
	<datalist id="listColors">
		<option>#ff0000</option>
		<option>#00ff00</option>
		<option>#0000ff</option>
	</datalist>
  <br>
  <br>
  <input type='submit' value='Создать'>
</form>
<br>
<!-- Таблица -->
<?php getTable($cols, $rows, $color); ?>
<!-- Таблица -->

