<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class contactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Contact', 10)->create();
    }
}
