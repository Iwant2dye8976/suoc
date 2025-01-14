<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Student extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'email', 'student_number', 'class_id', 'status', 'date_of_birth'];
    public function class(){
        return $this->belongsTo(Class_::class);
    }
}
