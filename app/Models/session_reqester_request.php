<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class session_reqester_request extends Model
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
        'session_id'

    ];

    public function teacher()
    {
        return $this->belongsTo(teacher::class,"teacher_id");
    }

    public function student()
    {
        return $this->belongsTo(student::class,"student_id");
    }

    public function session()
    {
        return $this->belongsTo(session::class,"session_id");
    }
}
