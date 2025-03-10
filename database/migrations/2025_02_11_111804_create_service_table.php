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
        Schema::create('service', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('service_name', 50);
            $table->decimal('service_price', 5,2);
            $table->integer('service_popularity');
            $table->tinyInteger('archived')->default(1);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });

        DB::table('service')->insert([
            [
                'user_id' => 1,
                'service_name' => 'Wolfcut L',
                'service_price' => 400,
                'service_popularity' => 3,
                'archived' => 0
            ],
            [
                'user_id' => 2,
                'service_name' => 'Hair Straightening',
                'service_price' => 400,
                'service_popularity' => 3,
                'archived' => 0
            ],
            [
                'user_id' => 3,
                'service_name' => 'Rebond',
                'service_price' => 400,
                'service_popularity' => 3,
                'archived' => 0
            ]
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service');
    }
};
