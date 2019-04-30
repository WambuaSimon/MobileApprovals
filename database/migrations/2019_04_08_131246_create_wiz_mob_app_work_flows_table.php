<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWizMobAppWorkFlowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wiz_mob_app_work_flows', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('DocType');
            $table->string('SequenceID');
            $table->integer('GroupID');
            $table->integer('AgentID');
            $table->boolean('IsApproved');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wiz_mob_app_work_flows');
    }
}
