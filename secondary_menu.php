<?php
$sub_pages = array(
				'#1' => 'Fashion',
				'#2' => 'Studio',
				'#3' => 'Wedding',
				'#4' => 'Private'
				);
$menu = create_menu($sub_pages);
$ul = create_html($menu, 'list');	
?>
