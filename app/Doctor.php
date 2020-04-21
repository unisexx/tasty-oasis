<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Translatable;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Doctor extends Model implements Searchable
{
    use Resizable;
    use Translatable;
    protected $translatable = ['name', 'position', 'education', 'experience'];

    public function getSearchResult(): SearchResult
    {
        $url = route('doctor.profile', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }
}
