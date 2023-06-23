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
}
