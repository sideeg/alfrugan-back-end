<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group_detials extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id',
        'group_id',

    ];

    public function student()
    {
        return $this->belongsTo(student::class,"student_id");
    }

    public function group()
    {
        return $this->belongsTo(group::class,"group_id");
    }
}
