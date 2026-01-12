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
        Schema::create('farm_activity_logs', function (Blueprint $table) {
            $table->id();
            $table->string('farm_activity_id');
            $table->string('user_id');
            $table->date('date');
            $table->integer('mandays_accomplished');
            $table->string('image_url')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farm_activity_logs');
    }
};
