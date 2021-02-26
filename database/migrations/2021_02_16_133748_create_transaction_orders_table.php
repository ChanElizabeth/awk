<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->char('order_id', 8)->unique();
            $table->char('id_transaction', 8)->unique();
            $table->integer('nominal');
            $table->string('bank_tujuan_code');
            $table->string('bank_tujuan_rek');
            $table->integer('kode_unik');
            $table->timestamp('verified_at')->nullable()->default(NULL);
            $table->foreign('id_transaction')->references('transaction_id')->on('transactions')->onDelete('cascade');
            $table->foreign('kode_unik')->references('kode')->on('kode_unik_orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_orders');
    }
}
