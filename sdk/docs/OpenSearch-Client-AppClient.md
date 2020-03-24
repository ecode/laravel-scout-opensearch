### 功能简介


应用基本信息管理类。

管理应用的基本信息，包含创建应用(save)、修改应用(updateById)、删除应用(removeById)
、获取应用的基本详情(getById)、获取应用列表(listAll)、给应用导入全量数据(reindexById)
等方法。

* 类名: AppClient
* 命名空间: OpenSearch\Client




### __construct

#### 接口描述
构造方法。





#### 接口定义

```php
void OpenSearch\Client\AppClient::__construct(\OpenSearch\Client\OpenSearchClient $openSearchClient)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $openSearchClient | \OpenSearch\Client\OpenSearchClient | 基础类，负责计算签名，和服务端进行交互和返回结果。 |


---


### save

#### 接口描述
创建一个新应用，或者创建一个新版本。

创建一个新的应用或者创建一个新的版本，如果在$app中指定了name，则会创建一个新版本，否则会创建一个新应用。

> 创建版本的个数依赖服务端的限制。



#### 接口定义

```php
\OpenSearch\Generated\Common\OpenSearchResult OpenSearch\Client\AppClient::save(string $app)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $app | string | 要创建的应用主体JSON，包含name、type、schema、quota、first_ranks、second_ranks、summary、data_sources、suggest、fetch_fields、query_processors等信息。 |


---


### getById

#### 接口描述
通过应用名称或者应用ID获取一个应用的详情信息。





#### 接口定义

```php
\OpenSearch\Generated\Common\OpenSearchResult OpenSearch\Client\AppClient::getById(string $identity)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $identity | string | 要查询的应用名称或者应用ID，如果应用有多个版本，则指定应用名称为当前应用的在线版本。 |


---


### listAll

#### 接口描述
获取应用列表。





#### 接口定义

```php
\OpenSearch\Generated\Common\OpenSearchResult OpenSearch\Client\AppClient::listAll(\OpenSearch\Generated\Common\Pageable $pageable)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $pageable | \OpenSearch\Generated\Common\Pageable | 分页信息，包含页码和每页展示条数。 |


---


### removeById

#### 接口描述
根据指定的应用id或名称删除应用版本或者应用；当指定的为应用名称，则表示指定的为当前应用分组中的在线的应用。。

如果当前应用只有一个版本，则会删除这个应用的整个分组；
如果当前应用分组有多个应用，则需要当前要删除的版本不能处于在线状态。



#### 接口定义

```php
\OpenSearch\Generated\Common\OpenSearchResult OpenSearch\Client\AppClient::removeById(string $identity)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $identity | string | 指定的应用ID或者应用名称。 |


---


### updateById

#### 接口描述
更新某个应用的信息。





#### 接口定义

```php
\OpenSearch\Generated\Common\OpenSearchResult OpenSearch\Client\AppClient::updateById(string $identity, string $app)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $identity | string | 指定的应用ID或者应用名称；当指定的为应用名称，则表示指定的为当前应用分组中的在线的应用。 |
| $app | string | 修改一个应用的应用结构json，包含name、type、schema、quota、first_ranks、second_ranks、summary、data_sources、suggest、fetch_fields、query_processors等信息。 |


---


### reindexById

#### 接口描述
在创建过程中全量导入数据。





#### 接口定义

```php
\OpenSearch\Generated\Common\OpenSearchResult OpenSearch\Client\AppClient::reindexById(string $identity)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $identity | string | 指定的应用ID或者应用名称；当指定的为应用名称，则表示指定的为当前应用分组中的在线的应用。。 |


---


