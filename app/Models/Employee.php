<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Employee extends Model
{
    public function employeeTypes()
    {
        return $this->belongsToMany(EmployeeType::class, 'employee_type_employee', 'emp_id', 'emp_type_id');
    }

    public function movies()
{
    return $this->belongsToMany(Movie::class, 'employee_movie', 'emp_id', 'movie_id');
}
}
