<?php /* Template Name: Payment Page */ ?>
<?php
// تنظیم اطلاعات مربوط به معامله
$merchantId = 'yourMerchantId';
$amount = 1000;
$terminalId = 'yourTerminalId';
$invoiceNumber = 'yourInvoiceNumber';
$invoiceDate = '2023-12-23';
$timeStamp = '2023-12-23T10:10:10Z';
$callbackUrl = 'yourCallbackUrl';
$payerIdentity = 'yourPayerIdentity';
$description = 'yourDescription';
$additionalData = 'yourAdditionalData';

// ساخت پیام XML
$message = <<<XML
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:sam="http://www.samanbank.ir/">
 <soapenv:Header/>
 <soapenv:Body>
    <sam:ProcessRequest>
       <sam:merchantId>{$merchantId}</sam:merchantId>
       <sam:amount>{$amount}</sam:amount>
       <sam:terminalId>{$terminalId}</sam:terminalId>
       <sam:invoiceNumber>{$invoiceNumber}</sam:invoiceNumber>
       <sam:invoiceDate>{$invoiceDate}</sam:invoiceDate>
       <sam:timeStamp>{$timeStamp}</sam:timeStamp>
       <sam:callbackUrl>{$callbackUrl}</sam:callbackUrl>
       <sam:payerIdentity>{$payerIdentity}</sam:payerIdentity>
       <sam:description>{$description}</sam:description>
       <sam:additionalData>{$additionalData}</sam:additionalData>
    </sam:ProcessRequest>
 </soapenv:Body>
</soapenv:Envelope>
XML;

// ارسال درخواست به درگاه پرداخت
$ch = curl_init('http://www.samanbank.ir/');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
curl_setopt($ch, CURLOPT_POSTFIELDS, $message);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);

// چاپ پاسخ
echo $response;
?>
