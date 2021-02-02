# Garanti Bankası Web Ekstre Hesap Hareketleri
Selamlar, bankaya başvuru formu yine reponun içindedir. <br>
Burda farklı olarak banka size exe verecek. O exeyi sunucuda ya da servisin bulunduğu ip'de çalıştırıp token üreteceksiniz ve request işleminde o tokenide göndereceksiniz.

```php
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
```
Garanti bankası sadece 1 gün çekmenize izin veriyor, tarih aralığı veremiyorsunuz.<br>
Dönen cevap aşağıdaki gibi olacaktır.

```
impleXMLElement Object
(
    [ReturnVal] => 00
    [MessageText] => Successful.
    [CurrentDateTime] => 03.01.2021 22:42
    [CustomerNum] => 021278986
    [FirmAccounts] => SimpleXMLElement Object
        (
            [AccountName] => SimpleXMLElement Object
                (
                )

            [AccountType] => S
            [BranchNum] => xxxx
            [AccountNum] => xxxx
            [CurrencyCode] => TL
            [IBAN] => xxxx
            [OpenDate] => 05.05.2011
            [LastActivityDate] => 21.12.2020
            [Balance] => 1,646.23
            [BlockedAmount] => 0
            [AvailableBalance] => 1,646.23
            [CreditLimit] => 0
            [AvailableBalanceWithCredit] => 1,646.23
            [AccountActivities] => Array
                (
                    [0] => SimpleXMLElement Object
                        (
                            [ActivityDate] => 07.12.2020
                            [Amount] => -435
                            [Balance] => 27,299.33
                            [Explanation] => xxxx
                            [TransactionId] => xxxx
                            [TransactionReferenceId] => 2020-12-07-10.56.25.052081
                            [CorrBankNum] => xxx
                            [CorrBranchNum] => xxx
                            [CorrIBAN] => xxxxxx        
                            [CorrVKN] => xxxx
                        )

                    [1] => SimpleXMLElement Object
                        (
                            [ActivityDate] => 07.12.2020
                            [Amount] => -450
                            [Balance] => 26,849.33
                            [Explanation] => xxx
                            [TransactionId] => xxx
                            [TransactionReferenceId] => 2020-12-07-10.56.25.147459
                            [CorrBankNum] => xxxx
                            [CorrBranchNum] => xxxx
                            [CorrIBAN] => xxxxx        
                            [CorrVKN] => xxxx
                        )

                    [2] => SimpleXMLElement Object
                        (
                            [ActivityDate] => 07.12.2020
                            [Amount] => -531
                            [Balance] => 26,318.33
                            [Explanation] => xxxx
                            [TransactionId] => xxx
                            [TransactionReferenceId] => 2020-12-07-17.11.30.674726
                            [CorrBankNum] => xxx
                            [CorrBranchNum] => xx
                            [CorrIBAN] => xxx      
                            [CorrVKN] => xxxx
                        )

                    [3] => SimpleXMLElement Object
                        (
                            [ActivityDate] => 07.12.2020
                            [Amount] => -22,470
                            [Balance] => 3,848.33
                            [Explanation] =>xxx
                            [TransactionId] => xxx
                            [TransactionReferenceId] => 2020-12-07-17.11.30.825312
                            [CorrBankNum] => xxx
                            [CorrBranchNum] => xxxx
                            [CorrIBAN] => xxxx        
                            [CorrVKN] => xxxx
                        )

                )

        )

)

```
