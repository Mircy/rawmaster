<?php
include 'includes/header.php';
echo $header;

$file = 'templates/confirm.html';
$tpl = file_get_contents($file);
$confirm = str_replace('[+content+]', 'Your message has been sent. Thank you.', $tpl);
echo $confirm;

include 'includes/footer.php';
echo $footer;
?>