<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Skincare extends Model
{
    use Translatable;
    protected $translatable = ['name', 'excerpt', 'body'];

    public function SkincareCategory()
    {
        return $this->belongsTo('App\SkincareCategory');
    }
}
