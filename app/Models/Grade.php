<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $table='class';
    public $timestamps = false;
    public $primaryKey = 'class_id';

    // public function course() {
    // 	return $this->belongsTo(Course::class, 'course_id', 'course_id');
    // }

    // public function students() {
    // 	return $this->hasMany(Student::class, 'class_id', 'class_id');
    // }

    // public function subjects() {
    // 	return $this->hasMany(Subject::class, 'class_id', 'class_id');
    // }
}
