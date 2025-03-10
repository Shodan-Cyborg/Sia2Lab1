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
        Schema::create('miscellaneous', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('misc_name', 50);
            $table->decimal('misc_budget', 5,2);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        DB::table('miscellaneous')->insert([
            [
                'user_id' => 1,
                'misc_name' => 'Banana Teracotta Pie',
                'misc_budget' => 800,
            ],
            [
                'user_id' => 2,
                'misc_name' => 'Chop Suey',
                'misc_budget' => 300,
            ],
            [
                'user_id' => 3,
                'misc_name' => 'Internet Load',
                'misc_budget' => 500,
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('miscellaneous');
    }
};
