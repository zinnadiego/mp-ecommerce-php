<?php

$logFile = fopen("log-mp-tres.txt", 'a') or die("Error creando archivo");
fwrite($logFile, print_r($_GET, true));
fclose($logFile);

$logFile = fopen("log-mp-cuatro.txt", 'a') or die("Error creando archivo");
fwrite($logFile, print_r($_GET, true));
fclose($logFile);


$json_event = file_get_contents('php://input', true);

$logFile = fopen("log-mp-uno.txt", 'a') or die("Error creando archivo");
fwrite($logFile, json_encode($json_event));
fclose($logFile);


require_once 'vendor/autoload.php';


    MercadoPago\SDK::setAccessToken("APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398");

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


$logFile = fopen("log-mp-dos.txt", 'a') or die("Error creando archivo");
fwrite($logFile, print_r($payment, true));
fclose($logFile);


ob_clean();
header("HTTP/1.1 200 OK");

?>