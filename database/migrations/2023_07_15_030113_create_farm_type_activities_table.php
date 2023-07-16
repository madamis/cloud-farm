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
        Schema::create('farm_type_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\FarmType::class)->constrained();
            $table->foreignIdFor(\App\Models\Activity::class)->constrained();
            $table->unsignedInteger('position');
            $table->float('cost',8,2)->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farm_type_activities');
    }
};
