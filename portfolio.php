<?php
$page_title = $title_portfolio;
$current = 'Portfolio';
include 'includes/header.php';
echo $header;

$src = 'images/trio3.jpg';
$img = create_img($src, 1335, 800, 'Trio3');
$div = create_html($img, 'portofolio_div');	
$portofolio = create_html($div, 'portofolio');
echo $portofolio;

include 'includes/footer.php';
echo $footer;
?>