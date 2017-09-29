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
			$file = 'templates/portfolio_li.html';
			$tpl = file_get_contents($file);
			$place_holders = array('[+folder+]', '[+file_number+]', '[+slide_number+]', '[+file-1+]');
			$data = array($portrait_slides_data[$i][1], $number, $portrait_slides_data[$i][0], $number-1);
			$li .= str_replace($place_holders, $data, $tpl).PHP_EOL;
			$file = 'templates/portfolio_a.html';
			$tpl = file_get_contents($file);
			$place_holders = array('[+file_number+]', '[+folder+]', '[+file_number+]');
			$data = array($number, $portrait_slides_data[$i][1], $number);
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
		$slide_div1 = str_replace('[+slide_number+]', $portrait_slides_data[$i][0], $tpl);
		$slide_div .= str_replace('[+content+]', $slide_main . $slide_thumbs, $slide_div1).PHP_EOL;
	}

$portrait_slides = $slide_div;
$file = 'templates/portfolio.html';
$tpl = file_get_contents($file);
$portfolio = str_replace('[+portrait+]', $portrait_slides, $tpl);
echo $portfolio;

include 'includes/footer.php';
echo $footer;
?>