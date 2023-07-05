<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table='course';
    public $timestamps = false;
    public $primaryKey = 'course_id';

    // public function grades() {
    // 	return $this->hasMany(Grade::class, 'idCourse', 'idCourse');
    // }
    
}
