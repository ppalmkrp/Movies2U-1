<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class review extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function Users(){
        return $this->hasMany(User::class);
    }
    public function Movie(){
        return $this->hasMany(Movie::class);
    }
}
