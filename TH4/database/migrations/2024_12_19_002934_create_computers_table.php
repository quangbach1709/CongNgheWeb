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
        Schema::create('computers', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('computer_name', 58);
            $table->string('model', 199);
            $table->string('operating_system', 50);
            $table->string('processor', 58);
            $table->integer('memory'); // RAM in GB
            $table->boolean('available'); // Operational status
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computers');
    }
};
