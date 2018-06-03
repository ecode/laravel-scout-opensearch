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

use Closure;
use Laravel\Scout\Searchable as ScoutSearchable;

trait OpenSearchable
{
    use ScoutSearchable;

    /**
     * Get the app name for the model defined in Aliyun Open Search.
     * @return string
     */
    public function openSearchAppName(): string
    {
        return config('scout.opensearch.appName');
    }

    /**
     * Get the app name for the model defined in Aliyun Open Search.
     * @return string
     */
    public function openSearchSuggestName(): string
    {
        return config('scout.opensearch.suggestName');
    }
    /**
     * Get the sort field for the model.
     * @return string
     */
    public function sortField(): string
    {
        return $this->primaryKey;
    }

    /**
     * Perform a search against the model's indexed data.
     *
     * @param  string  $query
     * @param  Closure $callback
     *
     * @return OpenSearchBuilder
     */
    public static function search($query, $callback = null)
    {
        return new OpenSearchBuilder(new static, $query, $callback);
    }
}
