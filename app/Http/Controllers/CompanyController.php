<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('companies.index',[
            'companies' => Company::latest()->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create',[
            'countries' => Country::orderBy('name')->get('name'),
            'cities' => City::orderBy('name')->get('name')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyStoreRequest $request)
    {
        //get validated data
        $validated = $request->validated();

        // handle image upload
        if($request->has('logo')){
            $image = $request->file('logo')->store('companies-logo');
            $validated['logo'] = $image;
        }

        // create new company
        Company::query()->create($validated);

        return redirect(route('companies.index'))->with('success','Company created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {        
        return view('companies.edit',[
            'company' => $company,
            'countries' => Country::orderBy('name')->get('name'),
            'cities' => City::orderBy('name')->get('name')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyUpdateRequest $request, Company $company)
    {
         //get validated data
         $validated = $request->validated();

        // handle image upload
         if($request->has('logo')){
            $image = $request->file('logo')->store('companies-logo');
            $validated['logo'] = $image;
         }
       
        // create new company
        $company->update($validated);

        return redirect()->back()->with('success','Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect(route('companies.index'));
    }
}
