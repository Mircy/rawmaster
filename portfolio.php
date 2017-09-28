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
$portrait_slides = 	create_slides($portrait_slides_data, $numbers);
$file = 'templates/portfolio.html';
$tpl = file_get_contents($file);
$portfolio = str_replace('[+portrait+]', $portrait_slides, $tpl);
echo $portfolio;

include 'includes/footer.php';
echo $footer;
?>