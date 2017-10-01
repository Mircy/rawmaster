<?php
$page_title = $title_about_me;
$current = 'About Me';
include 'includes/header.php';
echo $header;

$tpl = file_get_contents('templates/about_me.html');
$about_me_img = create_img('images/uploads/aboutme.jpg', 429, 643, 'about_me');
$place_holders = array('[+heading+]', '[+p1+]', '[+p2+]', '[+p3+]', '[+p4+]', '[+p5+]', '[+img+]');
$data = array($about_me_h2, $about_me_p1, $about_me_p2, $about_me_p3, $about_me_p4, $about_me_p5, $about_me_img);
$about_me = str_replace($place_holders, $data, $tpl).PHP_EOL;
echo $about_me;

include 'includes/footer.php';
echo $footer;
?>