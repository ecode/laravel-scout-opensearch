<?php
require_once("Config.inc.php");

use OpenSearch\Client\AppClient;
use OpenSearch\Generated\Common\Pageable;

$pageable = new Pageable(array('page' => 1, 'size' => 1));
$appClient = new AppClient($client);
$ret = $appClient->listAll($pageable);
print_r($ret);
//echo $ret->traceInfo->tracer;
