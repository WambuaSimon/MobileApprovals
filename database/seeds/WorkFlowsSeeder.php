<?php

use Illuminate\Database\Seeder;
use App\WizMobAppDocument;
use App\WizMobAppWorkFlow;

class WorkFlowsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(App\WizMobAppWorkFlow::class, 10)->create()->each(function($workfow){
            $workfow->document()->save(factory(App\WizMobAppDocument::class)->make());
               });
    }
}
