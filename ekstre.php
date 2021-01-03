<?php
/*
Class Garanti
@author Selim Hallaç
@blog selimhallac.com
*/

require 'garanti.class.php';

$unvan = ""; // Banka tarafından verilen unvan bölümü
$kurum_kodu = ""; // Banka tarafından verilen kurum kodu
$key = ""; // Garanti bankası size bir exe verecek. O exeyi bilgisayarınızda açıp ip adresini yazıp bir key üreteceksiniz. O keyi buraya yazınız. Eğer siz üretemiyorsanız onlara mail atın onlar vereceklerdir.

$entegrasyon = new Garanti($unvan,$kurum_kodu,$key);

$response = $entegrasyon->hesap_hareketleri('2020-12-25');

echo '<pre>';
print_r($response);
echo '</pre>';
