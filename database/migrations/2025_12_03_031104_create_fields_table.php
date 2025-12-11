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
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->integer('cluster_id');
            $table->string('field_number');
            $table->string('area');
            $table->string('plant');
            $table->string('variety');
            $table->string('fan');
            $table->date('dopR');
            $table->string('assigned_to');
            $table->string('fertilizer');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fields');
    }
};
