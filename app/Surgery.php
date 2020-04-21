<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Surgery extends Model
{
    use Translatable;
    protected $translatable = ['title', 'excerpt', 'body'];
}
