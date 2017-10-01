<?php
$icon_data = array(
			array('https://www.facebook.com/Rawmaster-513315272055978', 'facebook'),
			array('https://www.twitter.com/rawmaster_photo', 'twitter'),
			array('https://www.instagram.com/rawmaster_photography', 'instagram'),
			array('https://www.linkedin.com/in/vasile-cocosila-39315211a', 'linkedin')
			);
$lenght =  count($icon_data);
$icon_li = '';
for ($i = 0; $i< $lenght; $i++){
	$icon_src = "images/" . $icon_data[$i][1] . ".jpg";
	$icon_img = create_img($icon_src, 30, 30, $icon_data[$i][1]);
	$tpl_icon = file_get_contents('templates/a_icon.html');
	$icon_link1 = str_replace('[+href+]', $icon_data[$i][0], $tpl_icon);
	$icon_link = str_replace('[+content+]',$icon_img, $icon_link1);
	$icon_li .= create_html($icon_link, 'li').PHP_EOL;
}
$contact_data = array('Phone: 00447463323623', 'Email: cocoartgallery@gmail.com');
$contact_li = '';
foreach ($contact_data as $contact){
	$contact_li .= create_html($contact, 'li').PHP_EOL;
}		
$tpl_footer = file_get_contents('templates/footer.html');
$footer_place_holders = array('[+icons+]', '[+contacts+]', '[+copyright+]', '[+top+]');
$footer_data = array($icon_li, $contact_li, $home_copyright, $home_top);
$footer = str_replace($footer_place_holders, $footer_data, $tpl_footer);
?>