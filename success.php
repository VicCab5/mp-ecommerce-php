<?php
require 'vendor/autoload.php';
require_once 'credenciales.php';

// Agrega credenciales
MercadoPago\SDK::setAccessToken($access_token);
MercadoPago\SDK::setIntegratorId($integrator_id);
$collection_id = $_GET['collection_id'];
$collection_status = $_GET['collection_status'];
$external_reference = $_GET['external_reference'];
$payment_type = $_GET['payment_type'];
$preference_id = $_GET['preference_id'];
$site_id = $_GET['site_id'];
$processing_mode = $_GET['processing_mode'];
$merchant_accound_id = $_GET['merchant_account_id'];
// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();
$data = MercadoPago\Payment::find_by_id($collection_id);

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Success</title>
<script src="https://www.mercadopago.com/v2/security.js" view=""></script>
</head>
<body>
<p>PAYMENT TYPE: <?php echo isset($_GET['payment_type']) ? $_GET['payment_type'] : '';?></p>
<p>EXTERNAL REFERENCE: <?php echo isset($_GET['external_reference']) ? $_GET['external_reference'] : '';?></p>
<p>PAYMENT ID: <?php echo isset($_GET['collection_id']) ? $_GET['collection_id'] : '';?></p>
<p>SUCCESS</p>
<pre>
{
    "action":"payment.created",
    "api_version":"v1",
    "data":{
        "id":"<?php echo $collection_id ?>"
    },
    "date_created":"<?php echo explode('.',$data->date_created)[0] ?>Z", 
    "id":<?php echo $data->order->id ?>,
    "live_mode":true,
    "type":"payment",
    "user_id":"<?php echo explode('-',$preference_id)[0] ?>"
}

</pre>
</body>
</html>