<?php
$page_title = $title_contact;
$current = 'Contact';
include 'includes/header.php';
echo $header;

$confirm = create_html($confirm_text, 'confirm').PHP_EOL;
echo $confirm;

include 'includes/footer.php';
echo $footer;
?>