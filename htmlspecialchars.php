<?php

function test($s, $enc) {
//  $e = htmlspecialchars($s, ENT_QUOTES, $enc);
  $e = htmlspecialchars($s, ENT_QUOTES);
  echo bin2hex($s) . ':' . $s . ' -> ';
  echo bin2hex($e) . ':' . $e . "\n";
}

  echo phpversion() . "\n";

  test("\"", 'UTF-8');                  // 「/」の冗長表現(2バイト)
  test("\x82", 'UTF-8');                  // 「/」の冗長表現(2バイト)
  test("\xC0\xAF", 'UTF-8');                  // 「/」の冗長表現(2バイト)
  test("\xE0\x80\xAF", 'UTF-8');              // 「/」の冗長表現(3バイト)
  test("\xF0\x80\x80\xAF", 'UTF-8');          // 「/」の冗長表現(4バイト)
  test("\xF8\x80\x80\x80\xAF", 'UTF-8');      // 「/」の冗長表現(5バイト)
  test("\xFC\x80\x80\x80\x80\xAF", 'UTF-8');  // 「/」の冗長表現(6バイト)
echo "-------------------------------\n";
  test("\xC0\xBC", 'UTF-8');                  // 「<」の冗長表現(2バイト)
  test("\xE0\x80\xBC", 'UTF-8');              // 「<」の冗長表現(3バイト)
  test("\xF0\x80\x80\xBC", 'UTF-8');          // 「<」の冗長表現(4バイト)
  test("\xF8\x80\x80\x80\xBC", 'UTF-8');      // 「<」の冗長表現(5バイト)
  test("\xFC\x80\x80\x80\x80\xBC", 'UTF-8');  // 「<」の冗長表現(6バイト)
echo "-------------------------------\n";
  test("A\xC2", 'UTF-8');                     // C2 (2バイトパターンなのに1バイト)
  test("A\xC2<", 'UTF-8');                    // C2 に < が続く
  test("A\xC2/", 'UTF-8');                    // C2 に / が続く
  test("A\xE6\xBC", 'UTF-8');                 // E6 BC (3バイトパターンなのに2バイト)
  test("A\xE6\xBC<", 'UTF-8');                // E6 BC に < が続く
  test("A\xE6\xBC/", 'UTF-8');                // E6 BC に / が続く
echo "-------------------------------\n";
  test("A\x8A", 'Shift_JIS');                 // 8A (Shift_JISの先行バイト)
  test("A\x8A/", 'Shift_JIS');                // 8A / が続く
  test("A\x8A<", 'Shift_JIS');                // 8A < が続く
echo "-------------------------------\n";
  test("A\xB4", 'EUC-JP');                    // B4 (EUC-JPの先行バイト)
  test("A\xB4/", 'EUC-JP');                   // B4 に / が続く
  test("A\xB4<", 'EUC-JP');                   // B4 に < が続く

/*
 * Local variables:
 * tab-width: 4
 * c-basic-offset: 4
 * End:
 * vim600: noet sw=4 ts=4 sts=4 fdm=marker
 * vim<600: noet sw=4 ts=4 sts=4
 */

