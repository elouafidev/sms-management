<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outbox extends Model
{
    // disable timestamp
    protected $table = "outbox";
    protected $fillable = ['DestinationNumber', 'TextDecoded', 'CreatorID'];
    public $timestamps = false;
}
