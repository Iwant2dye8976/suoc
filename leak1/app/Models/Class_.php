<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Class_ extends Model
{
    protected $table = 'classes';
    use HasFactory;
    protected $fillable = ['class_name', 'program', 'start_date', 'end_date'];
}
