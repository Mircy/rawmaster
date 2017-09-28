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

function create_slides($array, $numbers){
	$lenght = count($array);
	$slide_div = '';
	for ($i = 0; $i<$lenght; $i++){
		$li = '';
		$a = '';
		foreach($numbers as $number){
			$file = 'templates/portfolio_li.html';
			$tpl = file_get_contents($file);
			$place_holders = array('[+folder+]', '[+file_number+]', '[+slide_number+]', '[+file-1+]');
			$data = array($array[$i][1], $number, $array[$i][0], $number-1);
			$li .= str_replace($place_holders, $data, $tpl).PHP_EOL;
			$file = 'templates/portfolio_a.html';
			$tpl = file_get_contents($file);
			$place_holders = array('[+file_number+]', '[+folder+]', '[+file_number+]');
			$data = array($number, $array[$i][1], $number);
			$a .= str_replace($place_holders, $data, $tpl).PHP_EOL;
		}
		$file = 'templates/portfolio_slide_main.html';
		$tpl = file_get_contents($file);
		$slide_main = str_replace('[+content+]', $li, $tpl).PHP_EOL;
		$file = 'templates/portfolio_slide_thumbs.html';
		$tpl = file_get_contents($file);
		$slide_thumbs = str_replace('[+content+]', $a, $tpl).PHP_EOL;
		$file = 'templates/portfolio_slide_div.html';
		$tpl = file_get_contents($file);
		$slide_div1 = str_replace('[+slide_number+]', $array[$i][0], $tpl);
		$slide_div .= str_replace('[+content+]', $slide_main . $slide_thumbs, $slide_div1).PHP_EOL;
	}
	return $slide_div;
}
?>