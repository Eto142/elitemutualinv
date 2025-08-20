<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // database/migrations/xxxx_xx_xx_create_wallets_table.php
public function up()
{
    Schema::create('wallets', function (Blueprint $table) {
        $table->id();
        $table->string('method'); // usdt, btc, eth, xrp
        $table->string('address');
        $table->string('destination_tag')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallets');
    }
};
