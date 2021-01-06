<?php
/**
 * This file is part of ruogoo.
 *
 * Created by HyanCat.
 * Updated by Bruce.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace Ecode\OpenSearch;

require_once __DIR__ . '/../sdk/OpenSearch/Autoloader/Autoloader.php';

use Illuminate\Config\Repository;
use Illuminate\Database\Eloquent\Collection;
use Laravel\Scout\Builder;
use Laravel\Scout\Engines\Engine;
use OpenSearch\Client\DocumentClient;
use OpenSearch\Client\OpenSearchClient;
use OpenSearch\Client\SuggestClient;
use OpenSearch\Util\SuggestParamsBuilder;
use OpenSearch\Client\SearchClient;
use OpenSearch\Generated\Common\OpenSearchResult;
use OpenSearch\Util\SearchParamsBuilder;
use \Illuminate\Support\Facades\Log;

class OpenSearchEngine extends Engine
{
    protected $client;
    protected $documentClient;
    protected $searchClient;
    protected $suggestClient;
    protected $config;
    protected $suggestName;
    protected $appName;
    protected $logFile;
    protected $debug;

    public function __construct(Repository $config)
    {
        $accessKeyID          = $config->get('scout.opensearch.accessKey');
        $accessKeySecret      = $config->get('scout.opensearch.accessSecret');
        $host                 = $config->get('scout.opensearch.host');
        $option['debug']      = $config->get('scout.opensearch.debug');
        $option['timeout']    = $config->get('scout.opensearch.timeout');


        $this->appName        = $config->get('scout.opensearch.appName');
        $this->suggestName    = $config->get('scout.opensearch.suggestName');
        $this->logFile        = $config->get('scout.opensearch.logFile', 'opensearch');
        $this->debug          = $config->get('scout.opensearch.debug');

        $this->client         = new OpenSearchClient($accessKeyID, $accessKeySecret, $host, $option);
        $this->documentClient = new DocumentClient($this->client);
        $this->searchClient   = new SearchClient($this->client);
        $this->suggestClient  = new SuggestClient($this->client);
    }

    public function update($models){}

    public function delete($models){}

    public function search(Builder $builder){}

    public function paginate(Builder $builder, $perPage, $page)
    {
        return $this->getOpenSearch($builder, ($page - 1) * $perPage, $perPage);
    }

    public function mapIds($results)
    {
        $result = $this->checkResults($results);
        if (array_get($result, 'result.num', 0) === 0) {
            return collect();
        }

        return collect(array_get($result, 'result.items'))->pluck('fields.id')->values();
    }

    /**
     * @param mixed  $results
     * @param \Illuminate\Database\Eloquent\Model $model
     *
     * @return Collection|\Illuminate\Support\Collection
     */
    public function map(Builder $builder, $results, $model)
    {
        if ($this->debug) {
            $monolog = Log::getMonolog();
            $monolog->popHandler();
            Log::useFiles(storage_path() . "/logs/{$this->logFile}.log");
            Log::info(urldecode($results->traceInfo->tracer));
        }

        $result = $this->checkResults($results);

        if (array_get($result, 'result.num', 0) === 0) {
            return collect();
        }
        $keys   = collect(array_get($result, 'result.items'))->pluck('fields.id')->values()->all();
        $models = $model->whereIn($model->getQualifiedKeyName(), $keys)->get()->keyBy($model->getKeyName());

        $res = collect(array_get($result, 'result.items'))->map(function ($item) use ($model, $models) {
            $key = $item['fields']['id']; // todo

            if (isset($models[$key])) {
                return $models[$key];
            }
        })->filter()->values();

        return $res;
    }

    /**
     * @param mixed $results
     *
     * @return mixed
     */
    public function getTotalCount($results)
    {
        $result = $this->checkResults($results);

        return array_get($result, 'result.total', 0);
    }

    /**
     * Get open-search-result
     *
     * @param Builder $builder
     * @param         $from
     * @param         $count
     *
     * @return OpenSearchResult
     */
    protected function getOpenSearch(Builder $builder, $from, $count)
    {
        $params = new SearchParamsBuilder();
        $params->setStart($from);
        $params->setHits($count);
        $params->setAppName($this->appName);
        //设置查询query
        if ($builder->index) {
            $params->setQuery("$builder->index:'$builder->query'");
        } else {
            $params->setQuery("$builder->query");
        }

        if ($builder->fields) {
            //设置需返回哪些字段
            $params->setFetchFields($builder->fields);
        }

        if ($builder->filters || $builder->rawFilters) {
            $arr = [];

            // 添加过滤条件
            foreach ($builder->filters as $value) {
                $arr[] = implode('',$value);
            }

            // 添加原生过滤条件
            if($builder->rawFilters){
                $arr = array_unique(array_merge($arr,$builder->rawFilters));
            }

            $params->setFilter(implode(' AND ',$arr));
        }

        // 设置排序条件
        if ($builder->orders) {
            foreach ($builder->orders as $value) {
                list($field, $sort) = array_values($value);
                if ($sort == 'asc') {
                    $params->addSort($field, SearchParamsBuilder::SORT_INCREASE);
                } elseif ($sort == 'desc') {
                    $params->addSort($field, SearchParamsBuilder::SORT_DECREASE);
                }
            }
        } elseif($builder->model->sortField()) {
            $params->addSort($builder->model->sortField(), SearchParamsBuilder::SORT_DECREASE);
        }

        $params->setFormat('fullJson');

        return $this->searchClient->execute($params->build());
    }

    /**
     * For suggestion
     *
     * @param Builder $builder
     *
     * @return OpenSearchResult
     */
    public function getSuggestSearch(Builder $builder)
    {
        $params = SuggestParamsBuilder::build(
                $this->appName,
                $this->suggestName,
                $builder->query, 10
        );

        return $this->suggestClient->execute($params);
    }

    /**
     * @param $results
     *
     * @return mixed
     */
    protected function checkResults($results)
    {
        $result = [];
        if ($results instanceof OpenSearchResult) {
            $result = json_decode($results->result, true);
        }

        return $result;
    }

    public function flush($model)
    {

    }
}
