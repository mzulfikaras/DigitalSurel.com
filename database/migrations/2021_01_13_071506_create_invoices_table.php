<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->bigInteger('no_telepon');
            $table->bigInteger('checkout_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->integer('qty');
            $table->integer('total');
            $table->string('paid');
            $table->timestamps();


            $table->foreign('checkout_id')->references('id')->on('checkouts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade')->onUpdate('cascade');
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
