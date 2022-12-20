<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(10);
        return view('employees', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();

        return view('new-employee', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstName' => 'string|required',
            'lastName' =>'string|nullable',
            'employeeEmail' =>'email|nullable',
            'employeePhone' =>['nullable', 'regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
          ]);

        $employee = new Employee();
        $employee->firstName = $request->firstName;
        $employee->lastName = $request->lastName;
        $employee->email = $request->employeeEmail;
        $employee->phone = $request->employeePhone;
        $employee->company_id = $request->company;

        $employee->save();

        return redirect('/employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('edit-employee', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'firstName' => 'string|required',
            'lastName' =>'string|nullable',
            'employeeEmail' =>'email|nullable',
            'employeePhone' =>['nullable', 'regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
        ]);

        $employee->firstName = $request->firstName;
        $employee->lastName = $request->lastName;
        $employee->email = $request->employeeEmail;
        $employee->phone = $request->employeePhone;
        $employee->company_id = $request->company;

        $employee->save();

        return redirect('/employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect('/employees');
    }
}
