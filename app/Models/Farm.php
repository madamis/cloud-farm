<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'farm_type_id',
        'unit_size_multiplier',
    ];

    function farm_type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(FarmType::class);
    }

    function farmType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(FarmType::class);
    }

    public function size()
    {
        $unit = $this->farmType->unit;
        $unitSize = $this->farmType->unit_size;
        return $this->unit_size_multiplier * $unitSize ." ".$unit;
    }

    public function projectedCosts()
    {
        return $this->farmType->projectedInputCosts();# * $this->unit_size_multiplier;
    }

    public function activities()
    {
        return $this->farmType->activities();
    }

    public function farmActivities()
    {
        return $this->farmType->farmTypeActivities();
    }

    public function startDate()
    {
        return "2023-01-01 00:00:00";
    }

    public function totalDays()
    {
        return $this->activities()->sum('duration');
    }

    public function endDate()
    {
        $endDate = date('Y-m-d', strtotime($this->startDate() . " +{$this->totalDays()} days"));
        return $endDate;
    }
}
