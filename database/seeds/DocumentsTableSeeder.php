<?php

use Illuminate\Database\Seeder;
use App\WizMobAppWorkFlow;

class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\WizMobAppDocument', 10)->create()->each(function($doc){
            $doc->workflow()->save(factory(App\WizMobAppWorkFlow::class)->make());
               });

    
    }
}
