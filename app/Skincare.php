<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skincare extends Model
{
    public function SkincareCategory()
    {
        return $this->belongsTo('App\SkincareCategory');
    }
}
