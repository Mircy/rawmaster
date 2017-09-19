<?php
$page_title = $title_home;
$current = 'Home';
include 'includes/header.php';
echo $header.PHP_EOL;
$anchor_site = "http://www.rawmaster.co.uk/";
$anchor_page = "index.php?page=portfolio";
$anchor = "#wowslider-container";
$img_data = array(
				array('home_01', 'Colour narative', $anchor_site . $anchor_page . $anchor . '1'),
				array('home_02', 'Wedding', $anchor_site . $anchor_page . $anchor . '2'),
				array('home_03', 'Colour & Exposure', $anchor_site . $anchor_page . $anchor . '3'),
				array('home_04', 'Studio lighting', $anchor_site . $anchor_page . $anchor . '4'),
				array('home_05', 'Gabriela', $anchor_site . $anchor_page . $anchor . '5'),
				array('home_08', 'Ella', $anchor_site . $anchor_page . $anchor . '8'),
				array('home_07', 'Men', $anchor_site . $anchor_page . $anchor . '7'),
				array('home_06', 'Paula', $anchor_site . $anchor_page . $anchor . '6'),
				array('home_09', 'Alexandra', $anchor_site . $anchor_page . $anchor . '9'),
				array('home_10', 'Before & After', $anchor_site . $anchor_page . $anchor . '10'),
				array('home_11', 'Colour narative', $anchor_site . $anchor_page . $anchor . '1'),
				array('home_12', 'Wedding', $anchor_site . $anchor_page . $anchor . '2'),
				array('home_13', 'Colour & Exposure', $anchor_site . $anchor_page . $anchor . '3'),
				array('home_14', 'Studio lighting', $anchor_site . $anchor_page . $anchor . '4'),
				array('home_15', 'Gabriela', $anchor_site . $anchor_page . $anchor . '5'),
				array('home_18', 'Ella', $anchor_site . $anchor_page . $anchor . '8'),
				array('home_17', 'Men', $anchor_site . $anchor_page . $anchor . '7'),
				array('home_16', 'Paula', $anchor_site . $anchor_page . $anchor . '6'),
				array('home_19', 'Alexandra', $anchor_site . $anchor_page . $anchor . '9'),
				array('home_20', 'Before & After', $anchor_site . $anchor_page . $anchor . '10')				
);			
$lenght = count($img_data);
$li = '';			
for ($i = 0; $i < $lenght; $i++){
	$src = "images/home/" . $img_data[$i][0] . ".jpg";
	$file = 'templates/home_list.html';
	$tpl = file_get_contents($file);
	$place_holders = array('[+href+]', '[+session+]', '[+src+]', '[+width+]', '[+height+]', '[+alt+]');
	$data = array($img_data[$i][2], $img_data[$i][1], $src, 250, 350, $img_data[$i][0]);
	$li .= str_replace($place_holders, $data, $tpl).PHP_EOL;
}
$ul = create_html($li, 'list').PHP_EOL;
$home = create_html($ul, 'home').PHP_EOL;
echo $home;
include 'includes/footer.php';
echo $footer;
?>