<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table='users';
    public $timestamps = false;
    public $primaryKey = 'user_id';
    public function getGenderNameAttribute()
    {
    	if ($this->gender == 0) {
    		return "Male";
    	} else {
    		return "Female";
    	}
    }
}
