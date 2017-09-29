<?php
function create_html ($string, $template){
	$file = 'templates/'. $template .'.html';
	$tpl = file_get_contents($file);
	$html = str_replace('[+content+]', $string, $tpl);
	return $html;
}
function create_img($src, $width, $height, $alt){
	$file = 'templates/img.html';
	$tpl = file_get_contents($file);
	$place_holders = array('[+src+]', '[+width+]', '[+height+]', '[+alt+]');
	$data = array($src, $width, $height, $alt);
	$html = str_replace($place_holders, $data, $tpl);
	return $html;
}
function create_link($href, $content){
	$file = 'templates/a.html';
	$tpl = file_get_contents($file);
	$html1 = str_replace('[+href+]', $href, $tpl);
	$html = str_replace('[+content+]', $content, $html1);
	return $html;
}
function create_menu($links, $current){
	$file = 'templates/menu.html';
	$tpl = file_get_contents($file);
	$menu = '';
	foreach ($links as $link => $name) {
		$menu2 = str_replace('[+link+]', $link, $tpl);
		if($current == $name){
			$menu1 = str_replace('[+class+]', 'current', $menu2);
		}else {
			$menu1 = str_replace('[+class+]', '', $menu2);
		}
		$menu .= str_replace('[+name+]', $name, $menu1);
	}
	return $menu;
}
?>