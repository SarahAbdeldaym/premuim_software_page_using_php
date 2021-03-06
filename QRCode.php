<?php

// before using QR code please run the following command  -->   composer require chillerlan/php-qrcode

declare(strict_types=1);

require_once('vendor/autoload.php');

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

$options = new QROptions(
  [
    'eccLevel' => QRCode::ECC_L,
    'outputType' => QRCode::OUTPUT_MARKUP_SVG,
    'version' => 5,
  ]
);

$qrcode = (new QRCode($options))->render('/register.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>QR Code</title>
  <link rel="stylesheet" href="/css/styles.min.css">
</head>
<body>
<h1>Scann QR Code To open Payment page</h1>
<div class="container">
  <img src='<?= $qrcode ?>' alt='QR Code' width='500' height='500'>
</div>
</body>
</html>
