<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolTerm extends Model
{
    //
    protected $table = "schoolterm";
    protected $primaryKey = "id";
    public $timestamps = false;
}
