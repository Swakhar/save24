<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelatedIndustry extends Model
{
    protected $table = 'related_industry';

    protected $fillable = ['name'];

    public $timestamps = false;

}
