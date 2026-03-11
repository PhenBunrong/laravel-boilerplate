<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('membership_tiers', function (Blueprint $table) {
            $table->id('id')->index()->unique()->primary();
            $table->string('name', 50)->unique();
            $table->unsignedInteger('min_transactions')->unique()->index();
            $table->unsignedInteger('max_transactions')->nullable();
            $table->char('color', 9)->nullable();
            $table->foreignId('creator_id')->constrained('users')->cascadeOnDelete();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('membership_tiers');
    }
};
