<?php
$page_title = $title_home;
$current = 'Home';
include 'includes/header.php';
echo $header.PHP_EOL;
$anchor = "/index.php?page=portfolio#wowslider-container";
$img_data = array(
				array('home_01', 'Colour narative', '1'),
				array('home_02', 'Wedding', '2'),
				array('home_03', 'Colour & Exposure', '3'),
				array('home_04', 'Studio lighting', '4'),
				array('home_05', 'Gabriela', '5'),
				array('home_08', 'Ella', '6'),
				array('home_07', 'Men', '7'),
				array('home_06', 'Paula', '8'),
				array('home_09', 'Alexandra', '9'),
				array('home_10', 'Before & After', '10'),
				array('home_11', 'Colour narative', '1'),
				array('home_12', 'Wedding', '2'),
				array('home_13', 'Colour & Exposure', '3'),
				array('home_14', 'Studio lighting', '4'),
				array('home_15', 'Gabriela', '5'),
				array('home_18', 'Ella', '8'),
				array('home_17', 'Men', '7'),
				array('home_16', 'Paula', '6'),
				array('home_19', 'Alexandra', '9'),
				array('home_20', 'Before & After', '10')				
);			
$lenght = count($img_data);
$li = '';			
for ($i = 0; $i < $lenght; $i++){
	$src = "images/home/" . $img_data[$i][0] . ".jpg";
	$tpl = file_get_contents('templates/home_list.html');
	$place_holders = array('[+href+]', '[+session+]', '[+src+]', '[+width+]', '[+height+]', '[+alt+]');
	$data = array($config['site'] . $anchor . $img_data[$i][2], $img_data[$i][1], $src, 250, 350, $img_data[$i][0]);
	$li .= str_replace($place_holders, $data, $tpl).PHP_EOL;
}
$ul = create_html($li, 'list').PHP_EOL;
$wide1 = create_img('images/trio3.jpg', 1350, 800, 'trio2');
$wide = create_link($config['site'] . $anchor . '11', $wide1);
$tpl = file_get_contents('templates/home.html');
$place_holders = array('[+portrait+]', '[+wide+]');
$data = array($ul, $wide);
$home = str_replace($place_holders, $data, $tpl);
echo $home;
include 'includes/footer.php';
echo $footer;
?>