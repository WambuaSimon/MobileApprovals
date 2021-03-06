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
            $table->bigIncrements('DocId');
            $table->integer('DocType')->nullable();
            $table->text('SequenceID')->nullable();
            $table->integer('AgentID')->nullable();
            $table->integer('LastGroup')->nullable();
            $table->integer('LastAgent')->nullable();
            $table->integer('NextGroup')->nullable();
            $table->integer('ApprovalStatus');
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
