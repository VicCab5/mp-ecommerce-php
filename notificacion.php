<?php

$post_data = $_POST['data'];

if (!empty($post_data)) {
    $filename = 'log.json';
    $handle = fopen($filename, "w");
    fwrite($handle, $post_data);
    fclose($handle);
    echo $file;
}

require 'vendor/autoload.php';
require_once 'credenciales.php';
MercadoPago\SDK::setAccessToken($access_token);

if (isset($_POST["type"])) {
    http_response_code(200);
}

   switch($_POST["type"]) {
    case "payment":
        $payment = MercadoPago\Payment.find_by_id($_POST["id"]);
        break;
    case "plan":
        $plan = MercadoPago\Plan.find_by_id($_POST["id"]);
        break;
    case "subscription":
        $plan = MercadoPago\Subscription.find_by_id($_POST["id"]);
        break;
    case "invoice":
        $plan = MercadoPago\Invoice.find_by_id($_POST["id"]);
        break;
    }

?>