<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawalsTable extends Migration
{
    public function up()
    {
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->string('reference_id')->unique();
            $table->enum('method', ['bank', 'crypto']);
            $table->string('currency')->nullable(); // e.g., BTC, ETH
            $table->decimal('amount', 15, 2);
            $table->decimal('fee', 15, 2)->default(0.00);
            
            $table->tinyInteger('status')->default(0)->comment('0 = pending, 1 = approved'); // <-- Status integer
            
            $table->json('details')->nullable(); // Optional: bank or crypto info

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('withdrawals');
    }
}
