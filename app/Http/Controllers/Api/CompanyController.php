<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CompanyStoreRequest;
use App\Models\Company;
use Illuminate\Http\Response;

class CompanyController extends Controller
{
    public function store(CompanyStoreRequest $request)
    {
        $validated = $request->validated();

        
        $Company = Company::query()->create($validated);

        // if we need more controll on response structure then we can create 
        // resource class, but in this case it's not needed. 


        return response()->json($Company,Response::HTTP_CREATED);
    }
}
