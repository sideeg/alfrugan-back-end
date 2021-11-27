<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'teacher_id',
        'session_id','name'

    ];

    public function teacher()
    {
        return $this->belongsTo(teacher::class,"teacher_id");
    }

    public function session()
    {
        return $this->belongsTo(session::class,"session_id");
    }
}
