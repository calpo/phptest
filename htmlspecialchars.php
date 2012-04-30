<?php
$str = urldecode('1%86%22');
echo "$str\n";
echo bin2hex($str) ."\n";
$utf = mb_convert_encoding($str, 'UTF-8', 'SJIS');
echo "$utf\n";

$esc = htmlspecialchars($str, ENT_QUOTES|ENT_DISALLOWED, 'SJIS');
echo "$esc\n";
echo strlen($esc) ." \n";

/*
 * Local variables:
 * tab-width: 4
 * c-basic-offset: 4
 * End:
 * vim600: noet sw=4 ts=4 sts=4 fdm=marker
 * vim<600: noet sw=4 ts=4 sts=4
 */

