<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_en','name_ar','phone_number','age','sex','email','country','state','rate',
        'status_id','novel_id','qualification_id','Specialization',"password"

    ];

    public function status()
    {
        return $this->belongsTo(status::class,"status_id");
    }

    public function novel()
    {
        return $this->belongsTo(novel::class,"novel_id");
    }

    public function qualification()
    {
        return $this->belongsTo(qualification::class,"qualification_id");
    }

    public function compliment()
    {
        return $this->hasMany(compliment::class,"student_id");
    }

    public function session_reqester_request()
    {
        return $this->hasMany(session_reqester_request::class,"student_id");
    }
}
