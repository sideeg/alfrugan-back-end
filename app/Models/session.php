<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class session extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_en','name_ar', "mosque_id","teacher_id", "session_type_id","start_date","end_date"
        ,"register_available","brief_ar","brief_en","image","reason_registry_suspension",

    ];

    public function mosque()
    {
        return $this->belongsTo(mosque::class,"mosque_id");
    }

    public function teacher()
    {
        return $this->belongsTo(teacher::class,"teacher_id");
    }

    public function session_type()
    {
        return $this->belongsTo(session_type::class,"session_type_id");
    }
}
