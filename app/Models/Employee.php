<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Employee extends Model
{
    use HasFactory;
    function Movie_details(){
        return $this->belongsToMany(Movie_detail::class);
        }
}
