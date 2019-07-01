<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWizMobAppDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wiz_mob_app_documents', function (Blueprint $table) {
            $table->bigIncrements('DocType');
            $table->string('DocName');
            $table->string('AccountName');
            $table->date('DocDate');
            $table->float('ExclAmt');
            $table->float('VATAmt');
            $table->float('InclAmt');
            $table->float('Price');
            $table->float('Quantity');
            $table->float('Total');
            $table->integer('AppStatus');
            $table->string('RejectionReason')->nullable();
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
        Schema::dropIfExists('wiz_mob_app_documents');
    }
}
