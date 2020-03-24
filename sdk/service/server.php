#!/usr/bin/env php
<?php

namespace tutorial\php;

error_reporting(E_ALL);

require_once("Config.inc.php");

/*
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements. See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership. The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied. See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */

/*
 * This is not a stand-alone server.  It should be run as a normal
 * php web script (like through Apache's mod_php) or as a cgi script
 * (like with the included runserver.py).  You can connect to it with
 * THttpClient in any language that supports it.  The PHP tutorial client
 * will work if you pass it the argument "--http".
 */

if (php_sapi_name() == 'cli') {
  ini_set("display_errors", "stderr");
}

use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TPhpStream;
use Thrift\Transport\TBufferedTransport;
use Thrift\TMultiplexedProcessor;

use OpenSearch\Client\OpenSearchClient;
use OpenSearch\Client\AppClient;
use OpenSearch\Client\DocumentClient;


header('Content-Type', 'application/x-thrift');
if (php_sapi_name() == 'cli') {
  echo "\r\n";
}

$ak = '<your accessKey>';
$secret = '<your secret>';
$host = '<your endpoint>';

$multiplexedProcessor = new TMultiplexedProcessor();

$openSearchClient = new OpenSearchClient($ak, $secret, $host);
$openSearchServiceProcessor = new \OpenSearch\Generated\OpenSearch\OpenSearchServiceProcessor($openSearchClient);
$multiplexedProcessor->registerProcessor('opensearchServiceProcessor', $openSearchServiceProcessor);

$appClient = new AppClient($openSearchClient);
$appServiceProcessor = new \OpenSearch\Generated\App\AppServiceProcessor($appClient);
$multiplexedProcessor->registerProcessor('appServiceProcessor', $appServiceProcessor);

$documentClient = new DocumentClient($openSearchClient);
$documentServiceProcessor = new \OpenSearch\Generated\Document\DocumentServiceProcessor($documentClient);
$multiplexedProcessor->registerProcessor('documentServiceProcessor', $documentServiceProcessor);

$transport = new TBufferedTransport(new TPhpStream(TPhpStream::MODE_R | TPhpStream::MODE_W));
$protocol = new TBinaryProtocol($transport, true, true);

$transport->open();
$multiplexedProcessor->process($protocol, $protocol);
$transport->close();
