<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dept extends Model
{
    protected $table = 'depts';

    protected $fillable = ['name', 'id'];

    protected $hidden = ['created_at', 'updated_at'];

    public function employees() {
      return $this->belongsToMany('App\Employee', 'employees', 'dept_id');
    }
}
