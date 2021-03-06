<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice_number');
            $table->date('invoice_date');
            $table->string('client_code');
            $table->string('name');
            $table->string('street')->nullable();
            $table->string('city'); 
            $table->string('tin')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->string('sub_total');
            $table->string('cgst_6');
            $table->string('cgst_9');
            $table->string('cgst_14');
            $table->string('sgst_6');
            $table->string('sgst_9');
            $table->string('sgst_14');
            $table->string('gst_12');
            $table->string('gst_18');
            $table->string('gst_28');
            $table->string('grand_total');
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
        Schema::dropIfExists('invoices');
    }
}
