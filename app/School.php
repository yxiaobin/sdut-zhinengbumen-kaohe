<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    //
    protected $table = "school";
    protected $primaryKey = "id";
    public $timestamps = false;
}
