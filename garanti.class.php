<?php
/*
Class Garanti
@author Selim Hallaç
@blog selimhallac.com
*/

class Garanti {
  public $kurumKodu = "";
  public $parola = "";
  public $token = "";
  public $IBAN = "";
  public $url = "https://inboundrstintws.garanti.com.tr/services/FirmAccountActivitySoap";
  function __construct($kurumkodu,$parola,$key,$IBAN)
  {
    $this->kurumKodu = $kurumkodu;
    $this->parola = $parola;
    $this->token = $key;
    $this->IBAN = $IBAN;
  }

  public function hesap_hareketleri($tarih){
    $data = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:odem="http://odemeler.garanti.com.tr/">
	   <soapenv:Header/>
	   <soapenv:Body>
		  <odem:FirmAccountActivity>
			 <odem:securetoken>
				<odem:UserId>'.$this->kurumKodu.'</odem:UserId>
				<odem:Password></odem:Password>
				<odem:CreateTimestamp></odem:CreateTimestamp>
				<odem:Encoded>'.$this->token.'</odem:Encoded>
			 </odem:securetoken>
			 <odem:FirmCode>'.$this->parola.'</odem:FirmCode>
			 <odem:StartDate>'.$tarih.'-00.00.00.000001</odem:StartDate>
			 <odem:EndDate>'.$tarih.'-23.59.59.999999</odem:EndDate>
			 <odem:BranchNum></odem:BranchNum>
			 <odem:AccountNum></odem:AccountNum>
			 <!--Optional:-->
			 <odem:IBAN>'$this->IBAN'</odem:IBAN>
			 <odem:TransactionId></odem:TransactionId>
		  </odem:FirmAccountActivity>
	   </soapenv:Body>
	    </soapenv:Envelope>';
      $ch = curl_init($this->url);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml', 'SOAPAction:add'));
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      $response = curl_exec($ch);
      curl_close($ch);
      $response = str_replace('<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"><soapenv:Body>', '', $response);
      $response = str_replace('</soapenv:Body></soapenv:Envelope>', '', $response);
      $arr = simplexml_load_string($response);

      return $arr;
  }



}
