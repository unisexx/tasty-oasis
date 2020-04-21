<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Product extends Model implements Searchable
{
    use Translatable;
    protected $translatable = ['name', 'body', 'review'];

    public function getSearchResult(): SearchResult
    {
        $url = route('product-review.detail', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }
}
