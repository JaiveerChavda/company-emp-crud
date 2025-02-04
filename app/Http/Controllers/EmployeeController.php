<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\Company;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('employees.index',[
            'employees' => Employee::latest()->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create',[
            'companies' => Company::orderBy('name')->get(['id','name']),
            'designations' => Designation::orderBy('name')->get(),
            'departmants' => Department::orderBy('name')->get(),
        ]);        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeStoreRequest $request)
    {
        //get validated data
        $validated = $request->validated();

        // handle image upload
        if($request->has('profile')){
            $image = $request->file('profile')->store('employees-profile');
            $validated['profile'] = $image;
        }

        // create new company
        Employee::query()->create($validated);

        return redirect(route('employees.index'))->with('success','Employee created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit',[
            'employee' => $employee,
            'companies' => Company::orderBy('name')->get(['id','name']),
            'designations' => Designation::orderBy('name')->get(),
            'departmants' => Department::orderBy('name')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeUpdateRequest $request, Employee $employee)
    {
         //get validated data
         $validated = $request->validated();

        // handle image upload
         if($request->has('profile')){
            $image = $request->file('profile')->store('employees-profile');
            $validated['profile'] = $image;
         }
       
        // create new company
        $employee->update($validated);

        return redirect()->back()->with('success','Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->back()->with('success','Employee deleted successfully');
    }
}
