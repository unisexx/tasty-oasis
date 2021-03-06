<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Promotion extends Model implements Searchable
{
    use Translatable;
    protected $translatable = ['title', 'body'];

    public function getSearchResult(): SearchResult
    {
        $url = route('promotion.detail', $this->id);

        return new SearchResult(
            $this,
            $this->title,
            $url
        );
    }
}
