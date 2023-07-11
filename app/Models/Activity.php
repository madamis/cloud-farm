<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    public function childActivities(){
        return $this->hasMany(Activity::class, 'parent_activity');
    }

    public function parentActivity(){
        return $this->belongsTo(Activity::class, 'parent_activity');
    }

    public function nextActivities(){
        return $this->hasMany(Activity::class, 'previous_activity');
    }

    public function previousActivity(){
        return $this->belongsTo(Activity::class, 'previous_activity');
    }

}
