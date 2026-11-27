<?php
$page = basename($_SERVER['SCRIPT_NAME']);

if (!isset($_SESSION['visited_pages']) || !is_array($_SESSION['visited_pages'])) {
	$_SESSION['visited_pages'] = [];
}

$_SESSION['visited_pages'][] = $page;
