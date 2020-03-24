### 功能简介

数据采集文档推送类。

管理搜索应用的数据采集文档推送，包含单条推送文档、批量推送文档等。


* 类名: DataCollectionClient
* 命名空间: OpenSearch\Client






### __construct

#### 接口描述
构造方法。



#### 接口定义
```php
void OpenSearch\Client\DataCollectionClient::__construct(\OpenSearch\Client\OpenSearchClient $openSearchClient)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $openSearchClient | OpenSearch\Client\OpenSearchClient |  基础类，负责计算签名，和服务端进行交互和返回结果。 |
---


### add

#### 接口描述
增加一条文档。

> Note:
>
> 这条文档只是增加到 SDK Client buffer 中，没有正式提交到服务端；只有调用了 commit 方法才会被提交到服务端。
> 你可以多次 add 然后调用 commit() 统一提交。

#### 接口定义
```php
\OpenSearch\Generated\Common\OpenSearchResult OpenSearch\Client\DataCollectionClient::add(array $fields)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $fields | array |  一条行为数据(或用户数据、物品数据)文档的所有字段，例如array(&quot;user_id&quot; =&gt; &quot;1021468&quot;, &quot;bhv_type&quot; =&gt; &quot;click&quot;); |
---


### commit

#### 接口描述
把 SDK Client buffer 中的文档发布到服务端。

> Note:
>
> 在发送之前会把 buffer 中的文档清空，所以如果服务端返回错误需要重试的情况下，需要重新生成文档并 commit，避免丢数据的可能。

#### 接口定义
```php
\OpenSearch\Generated\Common\OpenSearchResult OpenSearch\Client\DataCollectionClient::commit(string $searchAppName, string $dataCollectionName, string $dataCollectionType)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $searchAppName | string |  关联的搜索应用名 |
| $dataCollectionName | string |  数据采集名称，开通时控制台会返回该名称 |
| $dataCollectionType | string |  数据采集类型：USER、ITEM_INFO、BEHAVIOR、INDUSTRY_SPECIFIC |
---


### push

#### 接口描述
批量推送文档。

> Note：
>
> 此操作会同步发送文档到服务端。

#### 接口定义
```php
\OpenSearch\Generated\Common\OpenSearchResult OpenSearch\Client\DataCollectionClient::push(string $docJson, string $searchAppName, string $dataCollectionName, string $dataCollectionType)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $docJson | string |  文档 list，为 JSON 格式 |
| $searchAppName | string |  关联的搜索应用名 |
| $dataCollectionName | string |  数据采集名称，开通时控制台会返回该名称 |
| $dataCollectionType | string |  数据采集类型：USER、ITEM_INFO、BEHAVIOR、INDUSTRY_SPECIFIC |
---

