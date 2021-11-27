<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher_novel extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'teacher_id',
        'novel_id',

    ];

    public function teacher()
    {
        return $this->belongsTo(teachers::class,"teacher_id");
    }

    public function novel()
    {
        return $this->belongsTo(novels::class,"novel_id");
    }
}
