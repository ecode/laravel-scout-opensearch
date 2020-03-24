<?php
require_once("Config.inc.php");

use OpenSearch\Client\DataCollectionClient;
use OpenSearch\Generated\DataCollection\Command;

$searchAppName = "zhao_special";
$dataCollectionName = "zhao_special";
$dataCollectionType = "BEHAVIOR";
$docs = json_encode(array(
    [
        "cmd" => Command::$__names[Command::ADD],
        "fields" => [
            "user_id" => "1120021255",
            "biz_id" => "biz_name",
            "rn" => "156516585419723283227314",
            "trace_id" => "Alibaba",
            "trace_info" => "%7B%22request%5Fid%22%3A%22156516585419723283227314%22%2C%22scm%22%3A%2220140713.120006678..%22%7D",
            "item_id" => "2223",
            "item_type" => "item",
            "bhv_type" => "click",
            "bhv_time" => "1566475047"
        ]
    ]
));

$dataCollectionClient = new DataCollectionClient($client);
$ret = $dataCollectionClient->push($docs, $searchAppName, $dataCollectionName, $dataCollectionType);
print_r(json_decode($ret->result, true));