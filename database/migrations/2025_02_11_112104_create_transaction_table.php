<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('service_id');
            $table->date('transaction-date');
            $table->decimal('payment', 5,2);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('service_id')->references('id')->on('service')->onDelete('cascade')->onUpdate('cascade');

        });

        DB::table('transaction')->insert([
            [
                'user_id' => 1,
                'product_id' => 1,
                'service_id' => 1,
                'transaction-date' => now(),
                'payment' => 500.00
            ],
            [
                'user_id' => 2,
                'product_id' => 2,
                'service_id' => 2,
                'transaction-date' => now(),
                'payment' => 400.00
            ],
            [
                'user_id' => 3,
                'product_id' => 3,
                'service_id' => 3,
                'transaction-date' => now(),
                'payment' => 500.00
            ]
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
