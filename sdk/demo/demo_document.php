<?php
require_once("Config.inc.php");

use OpenSearch\Client\DocumentClient;

$tableName = 'main';
$documentClient = new DocumentClient($client);

$json = json_encode(array(array("cmd" => "add", "fields" => array("hid" => 1, "ota_hid" => 11111))));
$ret = $documentClient->push($json, $appName, $tableName);
print_r(json_decode($ret->result, true));
echo $ret->traceInfo->tracer;
