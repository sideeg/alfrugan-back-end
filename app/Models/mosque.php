<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mosque extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'image',
        "brief_location_description",
        "full_location_description",
        "lat",
        "long",
    ];

    public function session()
    {
        return $this->hasMany(session::class,"mosque_id");
    }
}
