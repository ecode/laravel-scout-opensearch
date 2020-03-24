### 功能简介


应用下拉提示操作类。

通过制定关键词、过滤条件搜索应用的下拉提示的结果。

* 类名: SuggestClient
* 命名空间: OpenSearch\Client




### __construct

#### 接口描述
构造方法。





#### 接口定义

```php
void OpenSearch\Client\SuggestClient::__construct(\OpenSearch\Client\OpenSearchClient $openSearchClient)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $openSearchClient | \OpenSearch\Client\OpenSearchClient | 基础类，负责计算签名，和服务端进行交互和返回结果。 |


---


### execute

#### 接口描述
执行搜索操作。





#### 接口定义

```php
\OpenSearch\Generated\Common\OpenSearchResult OpenSearch\Client\SuggestClient::execute(\OpenSearch\Generated\Search\SearchParams $searchParams)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $searchParams | \OpenSearch\Generated\Search\SearchParams | 制定的搜索条件。 |


---


