<?php

namespace App\Http\Controllers;

use App\Dept;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeptController extends Controller
{
    public function __construct()
    {

    }
    public function index($id = null)
    {
        if ($id == null) {
          $depts = Dept::all();
          return $depts;
        } else {
          $depts = Dept::find($id, array('id', 'name'));
          return $depts;
        }
    }

    public function store(Request $request)
    {
        $name = $request->name;
    }

    public function show(Dept $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dept  $dept
     * @return \Illuminate\Http\Response
     */
    public function edit(Dept $dept)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dept  $dept
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dept $dept)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dept  $dept
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dept $dept)
    {
        //
    }
}
