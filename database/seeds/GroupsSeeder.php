<?php

use Illuminate\Database\Seeder;

class GroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\WizMobAppGroup', 20)->create()->each(function ($grp) {
            $grp->agents()->save(factory(App\WizMobAppAgent::class)->make());
        });

        factory('App\WizMobAppGroup', 20)->create()->each(function ($grp) {
            $grp->workFlows()->save(factory(App\WizMobAppWorkFlow::class)->make());
        });
    }
}
