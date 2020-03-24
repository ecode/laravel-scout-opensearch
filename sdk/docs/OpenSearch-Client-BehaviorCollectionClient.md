### 功能简介

搜索行为数据文档推送类。

管理搜索应用的行为数据推送，包含单条推送文档、批量推送文档等。


* 类名: BehaviorCollectionClient
* 命名空间: OpenSearch\Client






### __construct

#### 接口描述
构造方法。



#### 接口定义
```php
void OpenSearch\Client\BehaviorCollectionClient::__construct(\OpenSearch\Client\OpenSearchClient $openSearchClient)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $openSearchClient | OpenSearch\Client\OpenSearchClient |  基础类，负责计算签名，和服务端进行交互和返回结果。 |
---


### addSearchDocClickRecord

#### 接口描述
增加一条搜索点击文档。

> Note:
>
> 这条文档只是增加到sdk client buffer中，没有正式提交到服务端；只有调用了commit方法才会被提交到服务端。
> 你可以多次addSearchDocClickRecord然后调用commit() 统一提交。

#### 接口定义
```php
\OpenSearch\Generated\Common\OpenSearchResult OpenSearch\Client\BehaviorCollectionClient::addSearchDocClickRecord(string $searchDocListPage, string $docDetailPage, integer $detailPageStayTime, string $objectId, string $opsRequestMisc, string $basicFields)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $searchDocListPage | string |  搜索结果列表所在的页面名称 |
| $docDetailPage | string |  某个搜索文档被点击后，搜索文档的详情页面名称 |
| $detailPageStayTime | integer |  用户在详情页停留的时长(单位为ms) |
| $objectId | string |  被点击的文档的主键，不能为空 |
| $opsRequestMisc | string |  opensearch返回的查询结果中的ops_request_misc字段 |
| $basicFields | string |  其他基础字段, 非必需字段 |
---


### commit

#### 接口描述
把sdk client buffer中的文档发布到服务端。

> Note:
>
> 在发送之前会把buffer中的文档清空，所以如果服务端返回错误需要重试的情况下，需要重新生成文档并commit，避免丢数据的可能。

#### 接口定义
```php
\OpenSearch\Generated\Common\OpenSearchResult OpenSearch\Client\BehaviorCollectionClient::commit(string $searchAppName, string $behaviorCollectionName)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $searchAppName | string |  关联的搜索应用名 |
| $behaviorCollectionName | string |  行为数据采集名称，开通时控制台会返回该名称 |
---


### push

#### 接口描述
批量推送文档。

> Note：
>
> 此操作会同步发送文档到服务端。

#### 接口定义
```php
\OpenSearch\Generated\Common\OpenSearchResult OpenSearch\Client\BehaviorCollectionClient::push(string $recordsJson, string $searchAppName, string $behaviorCollectionName)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $recordsJson | string |  文档list的json |
| $searchAppName | string |  关联的搜索应用名 |
| $behaviorCollectionName | string |  行为数据采集名称，开通时控制台会返回该名称 |
---

