<?php
require_once("Config.inc.php");

use OpenSearch\Client\SearchClient;
use OpenSearch\Util\SearchParamsBuilder;

$searchClient = new SearchClient($client);

$params = new SearchParamsBuilder();
$params->setStart(0);
$params->setHits(20);
$params->setAppName('hotel');
$params->setQuery("default:'的'");
$params->setFormat("json");
$params->addSort('hid', SearchParamsBuilder::SORT_DECREASE);
//$params->addSort('RANK', SearchParamsBuilder::SORT_DECREASE);
//$params->setFilter('hid=71271');
// $params->addDistinct(
//     array('key' => 'hid', 'distTimes' => 2, 'distCount' => 3)
// );

$params->addSummary(
    array('summary_field' => 'description', 'summary_len' => 100, 'summary_ellipsis' => "。。。", 'summary_snippet' => 2, 'summary_element_prefix' => '<span class=a1>', 'summary_element_postfix' => '</span>')
);
$params->addSummary(
    array('summary_field' => 'name', 'summary_len' => 200)
);

$params->setCustomParam('a', 'b');
$params->setCustomParam('c', 'd');

//$params->setRouteValue('1');
/*$params->addDistinct(
    array('key' => 'ota_hid', 'distTimes' => 1, 'distCount' => 2)
);*/

// $params->addAggregate(
//     array('groupKey' => 'hid', 'aggFun' => 'count()', 'range' => '1', 'aggSamplerThresHold' => 1, 'aggSamplerStep' => 10, 'maxGroup' => 10)
// );
// $params->addAggregate(
//     array('groupKey' => 'hid', 'aggFun' => 'count()', 'range' => '1', 'aggFilter' => 'aaa', 'aggSamplerThresHold' => 1, 'aggSamplerStep' => 10, 'maxGroup' => 10)
// );

//$params->setFirstRankName('dd');
//$params->setSecondRankName('aa');
$params->setFetchFields(array('hid'));
// $params->setScrollExpire('3m');
// $params->setScrollId('eJx1UNtuwyAM/RrytiiBrkkfeOja9DcQS8zqlRAGRGr39TPZ1t06CQkbn4sPyuqYVD+HOAVpMMSEzkGIfZisxaFQ3+Zq1OF0E0SVVXD2KuEIsl5t6rathGj4al1o+Vj0cigMpP6oDIIdojwS62WGcJH95Aw+MbE/YmJiyyvGd2YKo87dc5wc9QGCdid2f4j4CguIUGs6iwRxBzB6tpnBeMO6hm22rF3leoHR7jTb32XXOI8U4yI/7veFiDgAhUCfcHH8nFpwNKuz3/UNKLOPGLNbJ1hbsZbfKL4I0aH3sKT7IQMjuKR8AIPnLCZ20Wtyr3r6dJLf65qJ7hZliunKYfyw0AgpHn6ncnqEP3H4f3HKsnwDGEWxaA==');


$ret = $searchClient->execute($params->build())->result;
print_r(json_decode($ret));