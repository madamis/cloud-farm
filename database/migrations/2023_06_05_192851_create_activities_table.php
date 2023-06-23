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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Activity::class, 'parent_activity')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('duration');#days
            $table->foreignIdFor(\App\Models\Activity::class,'previous_activity')->nullable();
            $table->float('cost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
