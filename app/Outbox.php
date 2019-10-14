<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outbox extends Model
{
    // disable timestamp
    protected $table = "outbox";

    // change primary ke to 'ID'
    protected $primaryKey = 'ID';

    protected $fillable = ['DestinationNumber', 'TextDecoded', 'CreatorID'];
    public $timestamps = false;
}
