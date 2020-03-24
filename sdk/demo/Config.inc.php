<?php

require_once("../OpenSearch/Autoloader/Autoloader.php");

use OpenSearch\Client\OpenSearchClient;

$accessKeyId = '<Your accessKeyId>';
$secret = '<Your secret>';
$endPoint = '<region endPoint>';
$appName = '<app name>';
$suggestName = '<suggest name>';
$options = array('debug' => true);

$client = new OpenSearchClient($accessKeyId, $secret, $endPoint, $options);