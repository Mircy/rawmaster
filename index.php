<?php
require 'includes/config.php';
require_once 'includes/functions.php';
$language = $config['language'];
require 'includes/' . $language . '.php';
if (!isset($_GET['image'])){
	if(!isset($_GET['page'])){
		$view = 'home';
	}else {
		$view = $_GET['page'];
	}
	$html = 'views/' . $view . '.php';
	if(is_file($html)){
		include $html;
	}else {
		echo create_html($error['page'], 'p');
	}
}else {
	$image = $_GET['image'];
	$html = 'views/imageview.php';
	if(is_file($html)){
		include $html;
	}else {
		echo create_html($error['page'], 'p');
	}
}
?>