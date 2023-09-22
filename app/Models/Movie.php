<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function criticalRate()
    {
        return $this->belongsTo(Critical_rate::class, 'ctr_id');
    }
    public function Movie_type()
    {
        return $this->belongsTo(Movie_type::class, 'type_id');
    }


}
