<?php
declare(strict_types=1);

// Рабочий e-mail, на который придёт письмо (замени на свой)
const MAIL_TO = 'your@email.ru';
const MAIL_FROM = 'admin@center.ogu';

$sent = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$subject = trim(strip_tags((string) ($_POST['subject'] ?? '')));
	$body = trim(strip_tags((string) ($_POST['body'] ?? '')));
	$subject = str_replace(["\r", "\n"], ' ', $subject);

	if ($subject !== '' && $body !== '') {
		$headers = [
			'From' => MAIL_FROM,
			'Reply-To' => MAIL_FROM,
			'Content-Type' => 'text/plain; charset=UTF-8',
		];
		$sent = mail(MAIL_TO, mb_encode_mimeheader($subject, 'UTF-8'), $body, $headers);
	} else {
		$sent = false;
	}
}
?>
<h3>Адрес</h3>
<address>123456 Орёл, Комсомольская 95</address>
<h3>Задайте вопрос</h3>
<?php if ($sent === true): ?>
	<p>Сообщение отправлено.</p>
<?php elseif ($sent === false): ?>
	<p>Не удалось отправить сообщение. Проверьте поля формы.</p>
<?php endif; ?>
<form method="post" action="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>">
  <label>Тема письма: </label>
  <br>
  <input name="subject" type="text" size="50">
  <br>
  <label>Содержание: </label>
  <br>
  <textarea name="body" cols="50" rows="10"></textarea>
  <br>
  <br>
  <input type="submit" value="Отправить">
</form>
