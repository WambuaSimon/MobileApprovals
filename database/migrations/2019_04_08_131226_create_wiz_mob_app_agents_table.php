<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWizMobAppAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wiz_mob_app_agents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('AgentName');
            $table->integer('GroupID');
            $table->string('Password');
            $table->boolean('IsAdmin');
            $table->boolean('IsActive');
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
        Schema::dropIfExists('wiz_mob_app_agents');
    }
}
