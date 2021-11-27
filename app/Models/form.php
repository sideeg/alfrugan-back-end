<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        "student_id",
        "group_id",
        "session_id",


    ];
    public function details()
    {
        return $this->hasMany(form_detail::class ,"form_id");
    }

    public function student()
    {
        return $this->belongsTo(student::class ,"student_id");
    }


    public function session()
    {
        return $this->belongsTo(session::class ,"session_id");
    }

    public function group()
    {
        return $this->belongsTo(group::class ,"group_id");
    }
}
