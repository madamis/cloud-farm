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
        Schema::create('farm_type_plan_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\FarmTypePlan::class)->constrained();
            $table->foreignIdFor(\App\Models\Activity::class)->constrained();
            $table->integer('duration');
            $table->foreignIdFor(\App\Models\FarmTypePlanActivity::class)->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farm_type_plan_activities');
    }
};
