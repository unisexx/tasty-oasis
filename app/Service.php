<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Service extends Model implements Searchable
{
    use Translatable;
    protected $translatable = ['title', 'excerpt', 'body'];

    public function getSearchResult(): SearchResult
    {
        $url = route('service.detail', $this->id);

        return new SearchResult(
            $this,
            $this->title,
            $url
        );
    }
    
    public function ServiceCategory()
    {
        return $this->belongsTo('App\ServiceCategory');
    }
}
