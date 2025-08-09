<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration
{
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('method')->nullable(); // 'bank' or 'crypto'
            $table->string('currency')->nullable(); // 'btc', 'eth', 'usd', etc.
            $table->decimal('amount', 15, 2);
            $table->integer('tenure')->nullable(); // in months
            $table->decimal('interest_rate', 5, 2)->nullable();
            $table->string('payment_method')->nullable(); // wallet or bank
            $table->date('maturity_date')->nullable();
            $table->decimal('maturity_amount', 15, 2)->nullable();
            $table->tinyInteger('status')->default(0)->comment('0 = pending, 1 = approved');
             $table->string('transaction_id')->unique();
            $table->string('reference_id')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('deposits');
    }
}

