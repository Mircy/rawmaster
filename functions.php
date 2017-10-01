<?php
function create_html ($string, $template){
	$tpl = file_get_contents('templates/'. $template .'.html');
	$html = str_replace('[+content+]', $string, $tpl);
	return $html;
}
function create_img($src, $width, $height, $alt){
	$tpl = file_get_contents('templates/img.html');
	$place_holders = array('[+src+]', '[+width+]', '[+height+]', '[+alt+]');
	$data = array($src, $width, $height, $alt);
	$html = str_replace($place_holders, $data, $tpl);
	return $html;
}
function create_link($href, $content){
	$tpl = file_get_contents('templates/a.html');
	$html1 = str_replace('[+href+]', $href, $tpl);
	$html = str_replace('[+content+]', $content, $html1);
	return $html;
}
function create_menu($links, $current){
	$tpl = file_get_contents('templates/menu.html');
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
function keep_value($clean, $field){
	if(isset($clean[$field])){
		$value = $clean[$field];
	}else{
		$value = '';
	}
	return $value;
}

?>