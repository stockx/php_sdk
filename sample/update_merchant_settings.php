<?php
/**
 * Created by PhpStorm.
 * User: droritbaron
 * Date: 3/29/15
 * Time: 5:03 PM
 */

// A simple example of submitting an order.
// Usage: php order_simple_submit.php

include __DIR__.'/../src/RiskifiedAsync/autoloader.php';
use RiskifiedAsync\Common\RiskifiedAsync;
use RiskifiedAsync\Common\Env;
use RiskifiedAsync\Common\Validations;
use RiskifiedAsync\Common\Signature;
use RiskifiedAsync\OrderWebhook\Model;
use RiskifiedAsync\OrderWebhook\Transport;

# Replace with the 'shop domain' of your account in Riskified
$domain = "[your shop domain as registered to Riskified]";

# Replace with the 'auth token' listed in the Riskified web app under the 'Settings' Tab
$authToken = "[your authentication token string]";

RiskifiedAsync::init($domain, $authToken, Env::DEV, Validations::IGNORE_MISSING);

# Order
$settings = new Model\MerchantSettings(array(
    'settings' => array('version'=>'1234','gws' => 'Adyen,CC')
));

echo "\n MERCHANT SETTINGS:".PHP_EOL.json_encode(json_decode($settings->toJson())).PHP_EOL;


# Create a curl transport to the Riskified Server
$transport = new Transport\CurlTransport(new Signature\HttpDataSignature());
$transport->timeout = 10;


try {
    $response = $transport->updateMerchantSettings($settings);
    echo PHP_EOL."Update Merchant Settings succeeded. Response: ".PHP_EOL.json_encode($response).PHP_EOL;
} catch(\RiskifiedAsync\OrderWebhook\Exception\UnsuccessfulActionException $uae) {
    echo PHP_EOL."Update Merchant Settings not succeeded. Status code was: ".$uae->statusCode." and json body was: "
        .json_encode($uae->jsonResponse).PHP_EOL;
} catch(Exception $e) {
    echo PHP_EOL."Update Merchant Settings not succeeded. Exception: ".$e->getMessage().PHP_EOL;
}