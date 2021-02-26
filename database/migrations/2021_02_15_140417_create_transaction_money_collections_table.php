<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionMoneyCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_money_collections', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->char('id_transaction', 8)->unique();
            $table->unsignedBigInteger('partner_id');
            $table->unsignedBigInteger('admin_id')->nullable();
            $table->integer('amount');
            $table->integer('status')->default(0);
            $table->integer('notified')->default(0);
            $table->foreign('id_transaction')->references('transaction_id')->on('transactions')->onDelete('cascade');
            $table->foreign('partner_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_money_collections');
    }
}
