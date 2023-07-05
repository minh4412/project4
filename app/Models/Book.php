<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'book';
    public $timestamps = false;
    // protected $fillable = ['book_name', 'qty', 'subject_id'];
    public $primaryKey = 'book_id';

    // public function subject() {
    //     return $this->belongsTo(Subject::class, 'idSubject', 'idSubject');
    // }

    // public function students() {
    // 	return $this->belongsToMany(Student::class, 'bill', 'idBook', 'idStudent');
    // }
}
