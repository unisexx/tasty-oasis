<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Spatial;
use TCG\Voyager\Traits\Translatable;

class Contact extends Model
{
    use Spatial;
    use Translatable;
    protected $translatable = ['name', 'address'];
}
