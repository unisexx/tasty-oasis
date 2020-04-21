<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Translatable;

class Doctor extends Model
{
    use Resizable;
    use Translatable;
    protected $translatable = ['name', 'position', 'education', 'experience'];
}
