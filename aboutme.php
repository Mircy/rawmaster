<?php
$page_title = $title_about_me;
$current = 'About Me';
include 'includes/header.php';
echo $header;

$file = 'templates/about_me.html';
$tpl = file_get_contents($file);
$place_holders = array('[+heading+]', '[+p1+]', '[+p2+]', '[+p3+]', '[+p4+]', '[+p5+]');
$data = array($about_me_h2, $about_me_p1, $about_me_p2, $about_me_p3, $about_me_p4, $about_me_p5);
$about_me = str_replace($place_holders, $data, $tpl);
echo $about_me;

include 'includes/footer.php';
echo $footer;
?>