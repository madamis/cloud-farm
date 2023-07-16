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
}
