<?php
$css = $config['css'];
$logo1 = create_img('images/full_logo.jpg', 200, 95, 'logo');
$logo = create_link($config['site'], $logo1);
$links = array(
				'index.php' => 'Home',
				'index.php?page=aboutme' => 'About Me',
				'index.php?page=portfolio' => 'Portfolio',
				'index.php?page=contact' => 'Contact'
				);
$menu = create_menu($links, $current);
$head = 'templates/header.html';
$tpl_head = file_get_contents($head);
$place_holders = array('[+title+]', '[+css+]', '[+logo+]', '[+menu+]');
$data = array($page_title, $css, $logo, $menu);
$header = str_replace($place_holders, $data, $tpl_head);			
?>
