<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeType extends Model
{
    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_type_employee', 'emp_type_id', 'emp_id');
    }

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'employee_type_movie', 'emp_type_id', 'movie_id');
    }
}
