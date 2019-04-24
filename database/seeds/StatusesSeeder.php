<?php

use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\WizMobAppStatus', 10)->create();
        
        // ->each(function ($grp) {
        //     $grp->documents()->save(factory(App\WizMobAppDocument::class)->make());
        // 
    
    }
}
