<?php

use Illuminate\Database\Seeder;

class WorkFlowsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\WizMobAppWorkFlow', 10)->create();
    }
}
