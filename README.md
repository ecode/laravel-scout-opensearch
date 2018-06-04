# laravel-scout-opensearch

Laravel Scout 的阿里云 Open Search 驱动。

## Installation

建议使用 composer 方式安装此包

    composer require ecode/laravel-scout-opensearch

## Usage

1. 在阿里云 OpenSearch 控制台配置；

2. Laravel 5.5 以下，`config/app.php`  中添加 `service provider`

        Ecode\\OpenSearch\\OpenSearchServiceProvider

    Laravel 5.5 及以上，自动加载 `service provider`，无需手动添加。
    
3. 在 scout.php 添加配置

```
    'opensearch'    => [
            'accessKey'    => env('OPENSEARCH_ACCESS_KEY'),
            'accessSecret' => env('OPENSEARCH_ACCESS_SECRET'),
            'appName'      => env('OPENSEARCH_APP_NAME'),
            'suggestName'  => env('OPENSEARCH_SUGGEST_NAME'),
            'host'         => env('OPENSEARCH_HOST'),
            'debug'        => env('OPENSEARCH_DEBUG'),
    ],
```

4. 修改 `.env` 配置 scout driver；

        SCOUT_DRIVER=opensearch
        
5. 添加 `.env` Open Search 相关配置。

        OPENSEARCH_ACCESS_KEY=ACCESS_KEY
        OPENSEARCH_ACCESS_SECRET=ACCESS_SECRET
        OPENSEARCH_HOST=HOST
        OPENSEARCH_APP_NAME=APP_NAME
        OPENSEARCH_SUGGEST_NAME=SUGGEST_NAME
        OPENSEARCH_DEBUG=true

## Desciption

    Based: https://github.com/ruogoo/laravel-scout-opensearch
    And:   https://github.com/lingxi/ali-opensearch-sdk
