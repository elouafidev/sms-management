<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\ScheduledSms;
use App\Jobs\SendSMSJob;

class NotifySmsContact extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:sms-contact';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Every Minutes SMS to contacts or clients';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        // $ids = ScheduledSms::all();
        // $ids->map(function ($item, $key) {
        //     ScheduledSms::destroy($item->id);
        //     return "ScheduledSms with id $item->id deleted"; 
        // });

        // echo "notify:sms-contact done operate\n\n";

        $now_day = (int) date("d", strtotime(Carbon::now()));
        $now_hour = date("H:i:00", strtotime(Carbon::now()));
        $scheduledSmses = ScheduledSms::all();

        if ($scheduledSmses !== null) {
            //Get all scheduledSmses that their dispatch date is due
            $scheduledSmses->where('day', $now_day)->where('time', $now_hour)->each(function($scheduledSms) {
                if($scheduledSms->sent_at == null || $scheduledSms->repeat == 0){
                    \dispatch(new SendSMSJob(
                        $scheduledSms->id, 
                        $scheduledSms->phone_number, 
                        $scheduledSms->sms_content, 
                        $scheduledSms->CreatorID, 
                        $scheduledSms->repeat)
                    );
                    
                    $scheduledSms->sent_at = Carbon::now();
                    $scheduledSms->save();
                }

                echo "[" . date('d-m-Y H:m:i', time()) . "] success run crontab : execute ScheduledSms with id = " . $scheduledSms->id;
            });
        }
    }
}
