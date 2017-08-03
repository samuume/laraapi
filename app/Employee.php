<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';

    protected $fillable = ['name', 'email', 'contact_number', 'gender', 'dept_id'];

    protected $hidden = ['created_at', 'updated_at'];

    public function depts() {
      return $this->hasOne('App\Dept', 'id');
    }
}
