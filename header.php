<?php
$css = $config['css'];
$links = array(
				'index.php' => 'Home',
				'index.php?page=aboutme' => 'About Me',
				'index.php?page=portfolio' => 'Portfolio',
				'index.php?page=contact' => 'Contact'
				);
$menu = create_menu($links, $current);
$head = 'templates/header.html';
$tpl_head = file_get_contents($head);
$place_holders = array('[+title+]', '[+css+]', '[+menu+]');
$data = array($page_title, $css, $menu);
$header = str_replace($place_holders, $data, $tpl_head);			
?>
