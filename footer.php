<?php
$foot = 'templates/footer.html';
$tpl_footer = file_get_contents($foot);
$footer = str_replace('[+footer+]', 'Copyright &copy; Vasile Cocosila 2017', $tpl_footer);
?>