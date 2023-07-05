<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bill';
    public $timestamps = false;
    public $primaryKey = 'bill_id';
    public function getStatusTextAttribute()
    {
        if ($this->status == 0) {
            return "Pending";
        } elseif ($this->status == 1) {
            return "Approved";
        } else {
            return "Cancelled";
        }
    }
}
