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
        Schema::create('farm_managers', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Farm::class);
            $table->foreignIdFor(\App\Models\User::class,'manager_id');
            $table->enum('chief',['0','1']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farm_managers');
    }
};