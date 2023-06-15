<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index() {
        $employee = employee::all();

        return view('people.employee', compact('employee'));
    }

    public function store(Request $request)
    {   $validatedData = $request->validate([
        'name' => 'string|max:100',
        'email' => 'email|unique|max:100',
        'phone' => 'string|max:50',
        'position' => 'string|max:50',
        'address' => 'string|max:50',
    ]);

    if ($validatedData){
        $employee = new employee();
        $employee->name=$request->name;
        $employee->email=$request->email;
        $employee->number=$request->number;
        $employee->position=$request->position;
        $employee->address=$request->address;
        $employee->save();

        return back()->with('success', 'Account Added.');
    }else{
        return back()->withErrors(['error'=>'There is a problem.']);
    }
}

    public function update(Request $request, $id)
    {
        $emp = employee::findOrFail($id);

        $emp->name=$request->input('name');
        $emp->email=$request->input('email');
        $emp->number=$request->input('number');
        $emp->position=$request->input('position');
        $emp->address=$request->input('address');

        $emp->save();

        return back()->with('success', 'Update successfull.');
    }

    public function destroy($id)
    {
        $employee = employee::findOrFail($id);

        $employee -> delete();

        return back()->with('success', 'Employee deleted.');
    }
}
