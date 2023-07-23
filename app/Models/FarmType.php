<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'unit',
        'unit_size',
        'description',
    ];

    public function farmTypeActivities()
    {
        return $this->hasMany(FarmTypeActivity::class,'farm_type_id')->orderBy('position');
    }

    public function activities()
    {
        return $this->hasManyThrough(Activity::class, FarmTypeActivity::class,'farm_type_id','id','id','activity_id');
    }

    public function projectedInputCosts()
    {
        $projectedCosts = 0;
        foreach ($this->farmTypeActivities as $farmTypeActivity)
        {
            $projectedCosts += $farmTypeActivity->activity->cost;
        }

        return $projectedCosts;
    }
}
