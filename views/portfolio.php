<?php
$page_title = $title_portfolio;
$current = 'Portfolio';
include 'includes/header.php';
echo $header;

$portrait_slides_data = array (
							array(1, 'colour_narative'),
							array(2, 'wedding'),
							array(3, 'colour_exposure'),
							array(4, 'studio_lighting'),
							array(5, 'gabriela'),
							array(6, 'ella'),
							array(7, 'men'),
							array(8, 'paula'),
							array(9, 'alexandra'),
							array(10, 'before_after')						
						);
$numbers = array(1, 2, 3, 4, 5, 6);
$lenght = count($portrait_slides_data);
$slide_div = '';
for ($i = 0; $i<$lenght; $i++){
	$li = '';
	$a = '';
	foreach($numbers as $number){
		$tpl = file_get_contents('templates/portfolio_li.html');
		$place_holders = array('[+folder+]', '[+file_number+]', '[+slide_number+]', '[+file-1+]');
		$data = array($portrait_slides_data[$i][1], $number, $portrait_slides_data[$i][0], $number-1);
		$li .= str_replace($place_holders, $data, $tpl).PHP_EOL;
		$tpl = file_get_contents('templates/portfolio_a.html');
		$place_holders = array('[+file_number+]', '[+folder+]', '[+file_number+]');
		$data = array($number, $portrait_slides_data[$i][1], $number);
		$a .= str_replace($place_holders, $data, $tpl).PHP_EOL;
	}
	$slide_main = create_html($li, 'portfolio_slide_main').PHP_EOL;
	$slide_thumbs = create_html($a, 'portfolio_slide_thumbs').PHP_EOL;
	$tpl = file_get_contents('templates/portfolio_slide_div.html');
	$slide_div1 = str_replace('[+slide_number+]', $portrait_slides_data[$i][0], $tpl);
	$slide_div .= str_replace('[+content+]', $slide_main . $slide_thumbs, $slide_div1).PHP_EOL;
}
$portfolio = create_html($slide_div, 'portfolio').PHP_EOL;
echo $portfolio;

include 'includes/footer.php';
echo $footer;
?>