<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmTypeActivity extends Model
{
    use HasFactory;

    public function farmType()
    {
        return $this->belongsTo(FarmType::class, 'farm_type_id');
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }

    public function moveUp()
    {
        if ($this->position > 1) {
            $itemAbove = self::where('position', $this->position - 1)->first();

            if ($itemAbove) {
                $this->decrement('position');
                $itemAbove->increment('position');
            }
        }
    }

    public function moveDown()
    {
        $maxPosition = self::max('position');

        if ($this->position < $maxPosition) {
            $itemBelow = self::where('position', $this->position + 1)->first();

            if ($itemBelow) {
                $this->increment('position');
                $itemBelow->decrement('position');
            }
        }
    }

    public function farmActivityCost($multiplier)
    {
        return $this->activity->cost * $multiplier;
    }

    // Generate the function to calculate the start date of an activity
    public function calculateStartDate($firstActivityStartDate)
    {
        // Calculate the start date of the current activity based on the duration and the start date of the first activity
        // $daysToAdd = ($this->position - 1) * $this->activity->duration; // Assuming the 'position' attribute determines the order of the activities
        $daysToAdd = $this->previousDays();
        $startDate = date('Y-m-d', strtotime($firstActivityStartDate . " +{$daysToAdd} days"));

        return $startDate;
    }

    // Generate the function to calculate the end date of an activity
    public function calculateEndDate($firstActivityStartDate)
    {
        // Calculate the start date of the current activity based on the duration and the start date of the first activity
        // $daysToAdd = ($this->position - 1) * $this->activity->duration + $this->activity->duration - 1;
        $daysToAdd = $this->previousDays() + $this->activity->duration - 1;
        $endDate = date('Y-m-d', strtotime($firstActivityStartDate . " +{$daysToAdd} days"));

        return $endDate;
    }

    // Generate the function to get previous activities
    public function getPreviousActivities()
    {
        // Retrieve all activities with a lower 'position' value than the current activity
        return $this->farmType->farmTypeActivities()->where('position', '<', $this->position)->get();
    }

    public function previousDays()
    {
        $days = 0;
        foreach ($this->getPreviousActivities() as $previousActivity)
        {
            $days += $previousActivity->activity->duration;
        }
        return $days;
    }
}
