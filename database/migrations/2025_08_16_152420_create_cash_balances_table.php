<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cash_balances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('description'); // e.g. "Deposit", "Withdrawal"
            $table->decimal('amount', 15, 2);
            $table->date('date');
            $table->string('reference_id')->unique(); // 🔑 Unique reference
            $table->unsignedTinyInteger('status')->default(0); // 0 = Pending, 1 = Approved
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cash_balances');
    }
};
