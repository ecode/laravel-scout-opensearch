### 功能简介






* 类名: OpenSearchClient
* 命名空间: OpenSearch\Client




### __construct

#### 接口描述
构造方法。





#### 接口定义

```php
void OpenSearch\Client\OpenSearchClient::__construct(string $accessKey, string $secret, string $host, $options)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $accessKey | string | 指定您的accessKeyId，在 &lt;a href=&quot;https://ak-console.aliyun.com/#/accesskey&quot;&gt;https://ak-console.aliyun.com/#/accesskey&lt;/a&gt; 中可以创建。 |
| $secret | string | 指定您的secret。 |
| $host | string | 指定您要访问的区域的endPoint，在控制台应用详情页中有指定。 |
| $options | mixed |  |


---


### get

#### 接口描述
发送一个GET请求。





#### 接口定义

```php
\OpenSearch\Generated\Common\OpenSearchResult OpenSearch\Client\OpenSearchClient::get(string $uri, array $params)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $uri | string | 发起GET请求的uri。 |
| $params | array | 发起GET请求的参数，以param_key =&gt; param_value的方式体现。 |


---


### put

#### 接口描述
发送一个PUT请求。





#### 接口定义

```php
\OpenSearch\Generated\Common\OpenSearchResult OpenSearch\Client\OpenSearchClient::put(string $uri, string $body)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $uri | string | 发起PUT请求的uri。 |
| $body | string | 发起PUT请求的body体，为一个原始的json格式的string。 |


---


### post

#### 接口描述
发送一个POST请求。





#### 接口定义

```php
\OpenSearch\Generated\Common\OpenSearchResult OpenSearch\Client\OpenSearchClient::post(string $uri, string $body)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $uri | string | 发起POST请求的uri。 |
| $body | string | 发起POST请求的body体，为一个原始的json格式的string。 |


---


### delete

#### 接口描述
发送一个DELETE请求。





#### 接口定义

```php
\OpenSearch\Generated\Common\OpenSearchResult OpenSearch\Client\OpenSearchClient::delete(string $uri, string $body)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $uri | string | 发起DELETE请求的uri。 |
| $body | string | 发起DELETE请求的body体，为一个原始的json格式的string。 |


---


### patch

#### 接口描述
发送一个PATCH请求。





#### 接口定义

```php
\OpenSearch\Generated\Common\OpenSearchResult OpenSearch\Client\OpenSearchClient::patch(string $uri, string $body)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $uri | string | 发起PATCH请求的uri。 |
| $body | string | 发起PATCH请求的body体，为一个原始的json格式的string。 |


---


### call

#### 接口描述
发送一个请求。





#### 接口定义

```php
\OpenSearch\Generated\Common\OpenSearchResult OpenSearch\Client\OpenSearchClient::call(string $uri, array $params, string $body, string $method)
```

#### 参数描述
| 参数名称 | 类型 | 描述 |
|----------|------------|-------------------------------------|
| $uri | string | 发起请求的uri。 |
| $params | array | 指定的url中的query string 列表。 |
| $body | string | 发起请求的body体，为一个原始的json格式的string。 |
| $method | string | 发起请求的方法，有GET/POST/DELETE/PUT/PATCH等 |


---


