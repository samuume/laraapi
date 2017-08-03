<?php

namespace App\Http\Controllers;

use App\Employee;

use App\Http\Controllers\DeptController;

use Illuminate\Http\Request;
use Illuminate\Http\Support\Facades\DB;
 
class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->dept = new DeptController;
    }
    public function index()
    {
        $employees = Employee::all();
        return $employees;
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Employee $id)
    {
        $employees = Employee::find($id, array('id', 'name', 'email', 'contact_number', 'gender'));
        return $employees;
    }


    public function edit(Employee $employee)
    {
        //
    }


    public function update(Request $request, Employee $employee)
    {
        //
    }


    public function destroy(Employee $employee)
    {
        //
    }
}
