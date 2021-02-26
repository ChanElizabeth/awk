<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_transfers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('flip_id')->nullable();
            $table->string('account_number');
            $table->string('bank_code');
            $table->integer('amount');
            $table->string('remark');
            $table->integer('fee')->nullable();
            $table->string('status')->nullable();
            $table->char('id_transaction', 8)->unique();
            $table->unsignedBigInteger('user_id');
            $table->foreign('id_transaction')->references('transaction_id')->on('transactions')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_transfers');
    }
}
