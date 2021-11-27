<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class compliment extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'teacher_id',
        'student_id',
        'type'

    ];

    public function teacher()
    {
        return $this->belongsTo(teachers::class,"teacher_id");
    }

    public function student()
    {
        return $this->belongsTo(students::class,"student_id");
    }
}
