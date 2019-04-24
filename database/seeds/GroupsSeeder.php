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
        $groups = factory('App\WizMobAppGroup', 6)->create();
        
        
        $groups->each(function ($grp) {
            $grp->agents()->save(factory(App\User::class)->make());
        });

        $groups->each(function ($grp) {
            $grp->workFlows()->save(factory(App\WizMobAppWorkFlow::class)->make());
        });
    }
}
