<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Skincare extends Model implements Searchable
{
    use Translatable;
    protected $translatable = ['name', 'excerpt', 'body'];
    
    public function getSearchResult(): SearchResult
    {
        $url = route('skincare.detail', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }

    public function SkincareCategory()
    {
        return $this->belongsTo('App\SkincareCategory');
    }
}
