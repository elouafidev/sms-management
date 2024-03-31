<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class ScheduledSMSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\ScheduledSms', 10)->create();
    }
}
