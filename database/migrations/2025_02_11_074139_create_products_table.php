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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('product_name', 50);
            $table->decimal('product_price', 5,2);
            $table->integer('product_quantity');
            $table->integer('sales_volume');
            $table->tinyInteger('archived')->default(1);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });

        DB::table('products')->insert([
            [
                'user_id' => 1,
                'product_name' => 'Keratin',
                'product_price' => '200',
                'product_quantity' => '5',
                'sales_volume' => '500',
                'archived' => 0

            ],
            [
                'user_id' => 2,
                'product_name' => 'Sunsilk Black',
                'product_price' => '360',
                'product_quantity' => '35',
                'sales_volume' => '400',
                'archived' => 0
            ],
            [
                'user_id' => 3,
                'product_name' => 'Palmolive',
                'product_price' => '170',
                'product_quantity' => '29',
                'sales_volume' => '250',
                'archived' => 0
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
