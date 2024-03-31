<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    // custom table name to "inbox"
    public $table = "inbox";

     // change primary ke to 'ID'
     protected $primaryKey = 'ID';
}
