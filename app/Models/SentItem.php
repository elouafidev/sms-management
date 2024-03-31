<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SentItem extends Model
{
    // custom table name
    public $table = "sentitems";

    // custom primary key field name
    protected $primaryKey = "ID";
}
