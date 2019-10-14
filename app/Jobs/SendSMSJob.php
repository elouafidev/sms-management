<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Outbox;
use App\ScheduledSms;

class SendSMSJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected   $phone_number,
                $sms_content,
                $CreatorID,
                $repeat,
                $id
    ;

    public function __construct($id, $phone_number, $sms_content, $CreatorID, $repeat)
    {
        //
        $this->phone_number = $phone_number;
        $this->sms_content = $sms_content;
        $this->CreatorID = $CreatorID;
        $this->id = $id;
        $this->repeat = $repeat;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->repeat == 0) {
            Outbox::create(['DestinationNumber' => $this->phone_number, 'TextDecoded' => $this->sms_content, 'CreatorID' => $this->CreatorId]);
            ScheduledSms::findOrFail($this->id)->delete();
        } else {
            Outbox::create(['DestinationNumber' => $this->phone_number, 'TextDecoded' => $this->sms_content, 'CreatorID' => $this->CreatorID]);
        }
    }
}
