### 功能简介


应用文档操作类。

管理应用的文档，包含推送文档，删除文档，更新文档，批量推送文档等。

* 类名: DocumentClient
* 命名空间: OpenSearch\Client


## 类属性


### $docs

```php
public \OpenSearch\Client\sdk缓存的文档的数量。 $docs = array()
```











### __construct

#### 接口描述
构造方法。





#### 接口定义

```php
void OpenSearch\Client\DocumentClient::__construct(\OpenSearch\Client\OpenSearchClient $openSearchClient)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $openSearchClient | \OpenSearch\Client\OpenSearchClient | 基础类，负责计算签名，和服务端进行交互和返回结果。 |


---


### add

#### 接口描述
增加一条文档。

> Note:
>
> 这条文档只是增加到sdk client buffer中，没有正式提交到服务端；只有调用了commit方法才会被提交到服务端。
你可以add多次然后调用commit() 统一提交。



#### 接口定义

```php
\OpenSearch\Generated\Common\OpenSearchResult OpenSearch\Client\DocumentClient::add(array $fields)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $fields | array | 一条文档的所有字段，例如array(&quot;id&quot; =&gt; 1, &quot;name&quot; =&gt; &quot;tony&quot;); |


---


### update

#### 接口描述
修改一条文档。

> Note:
>
> 这条文档只是增加到sdk client buffer中，没有正式提交到服务端；只有调用了commit方法才会被提交到服务端。
你可以update多次然后调用commit() 统一提交。

> 标准版不支持update操作。



#### 接口定义

```php
\OpenSearch\Generated\Common\OpenSearchResult OpenSearch\Client\DocumentClient::update(array $fields)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $fields | array | 一条文档的所有字段，例如array(&quot;id&quot; =&gt; 1, &quot;name&quot; =&gt; &quot;tony&quot;); |


---


### remove

#### 接口描述
删除一条文档。

> Note:
>
> 这条文档只是增加到sdk client buffer中，没有正式提交到服务端；只有调用了commit方法才会被提交到服务端。
你可以remove多次然后调用commit() 统一提交。



#### 接口定义

```php
\OpenSearch\Generated\Common\OpenSearchResult OpenSearch\Client\DocumentClient::remove(array $fields)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $fields | array | 一条文档的主键字段，例如array(&quot;id&quot; =&gt; 1); |


---


### push

#### 接口描述
批量推送文档。

> Note：
>
> 此操作会同步发送到服务端。



#### 接口定义

```php
\OpenSearch\Generated\Common\OpenSearchResult OpenSearch\Client\DocumentClient::push(string $docsJson, string $appName, string $tableName)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $docsJson | string | 文档list的json，例如[{&quot;cmd&quot;:&quot;ADD&quot;,&quot;fields&quot;:{&quot;id&quot;:&quot;1&quot;,&quot;name&quot;:&quot;tony&quot;}},...] |
| $appName | string | 指定的app name或者app ID |
| $tableName | string | 指定的table name |


---


### commit

#### 接口描述
把client buffer中的文档发布到服务端。

> Note:
>
> 在发送之前会把buffer中的文档清空，所以如果服务端返回错误需要重试的情况下，需要重新生成文档并commit，避免丢数据的可能。



#### 接口定义

```php
\OpenSearch\Generated\Common\OpenSearchResult OpenSearch\Client\DocumentClient::commit(string $appName, string $tableName)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $appName | string | 指定的app name或者app ID |
| $tableName | string | 指定的table name |


---


### pushOneDoc

#### 接口描述
推送一条文档到客户端buffer中。





#### 接口定义

```php
\OpenSearch\Generated\Common\OpenSearchResult OpenSearch\Client\DocumentClient::pushOneDoc(array $fields, string $cmd)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $fields | array | 一条文档的所有字段，例如array(&quot;id&quot; =&gt; 1, &quot;name&quot; =&gt; &quot;tony&quot;); |
| $cmd | string | 文档的操作类型，有ADD, UPDATE和DELETE; |


---


