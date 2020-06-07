<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Miscellaneous extends Model
{
    protected $table = 'miscellaneous';

    protected $fillable = ['name'];

    public $timestamps = false;

}
