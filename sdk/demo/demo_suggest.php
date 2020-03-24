<?php
require_once("Config.inc.php");

use OpenSearch\Client\SuggestClient;
use OpenSearch\Util\SuggestParamsBuilder;

$suggestClient = new SuggestClient($client);
$params = SuggestParamsBuilder::build($appName, $suggestName, 'a', 10);

$ret = $suggestClient->execute($params)->result;
print_r(json_decode($ret, true));
