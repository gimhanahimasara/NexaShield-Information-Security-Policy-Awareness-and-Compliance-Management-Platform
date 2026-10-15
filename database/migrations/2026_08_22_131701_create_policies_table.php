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
            Schema::create('policies', function (Blueprint $table) {
                $table->id();
                $table->string('title'); // ප්‍රතිපත්තියේ නම
                $table->text('description'); // සම්පූර්ණ විස්තරය
                $table->string('version')->default('1.0'); // සංස්කරණය (උදා: 1.0, 1.1)
                $table->string('status')->default('active'); // active හෝ inactive
                $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('policies');
    }
};
