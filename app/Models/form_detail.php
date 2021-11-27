<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form_detail extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ "form_id",
            "teacher_id",
            "entry_date",
            "start_Surah",
            "start_ayah",
            "end_Surah",
            "end_ayah",
            "rate",
            "notes"];

    public function form()
    {
        return $this->belongsTo(form::class,"from_id");
    }
}
