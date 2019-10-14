<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduledSms extends Model
{
    public $table = "scheduled_sms";

    protected $fillable = ([
        'phone_number', 
        'sms_content', 
        'day',
        'time', 
        'repeat',
        'sent_at',
        'CreatorID'
    ]);

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
