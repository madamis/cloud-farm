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
        Schema::create('farm_owners', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Farm::class)->constrained();
            $table->foreignIdFor(\App\Models\User::class)->constrained();
            $table->float('percentage',3,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farm_owners');
    }
};
