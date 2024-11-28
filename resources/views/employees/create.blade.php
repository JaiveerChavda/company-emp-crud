@extends('layout.layout')

@php
    $title='Employee';
    $subTitle = 'Employee - Create';

@endphp

@section('content')
<div class="card h-100 p-0 radius-12 overflow-hidden">
    <div class="card-body p-40">
        <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-20">
                        <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">First Name <span class="text-danger-600">*</span></label>
                        <input 
                            type="text" 
                            class="form-control radius-8" 
                            id="first_name" 
                            name="first_name" 
                            placeholder="Enter First Name"
                            value="{{ old('first_name') }}"
                        >
                        @error('first_name')
                        <span class="text-danger mt-4">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-20">
                        <label for="email" class="form-label fw-semibold text-primary-light text-sm mb-8">Last Name <span class="text-danger-600">*</span></label>
                        <input 
                            type="text" 
                            class="form-control radius-8" 
                            id="last_name" 
                            name="last_name" 
                            placeholder="Enter Last Name"
                            value="{{ old('last_name') }}"
                        >
                        @error('last_name')
                        <span class="text-danger mt-4">{{ $message }}</span>
                        @enderror
                    </div>
                </div>  
                <div class="col-sm-6">
                    <label class="form-label">Choose Profile Photo</label>
                    <input class="form-control form-control-sm" name="profile" type="file">
                    @error('profile')
                    <span class="text-danger mt-4">{{ $message }}</span>
                    @enderror
                </div>       
                <div class="col-sm-6">
                    <div class="mb-20">
                        <label for="country" class="form-label fw-semibold text-primary-light text-sm mb-8">Company <span class="text-danger-600">*</span> </label>
                        <select class="form-control radius-8 form-select" id="company_id" name="company_id">
                            <option selected disabled value="">Select Company</option>
                            @foreach ($companies as $company)
                            <option 
                                value="{{ $company->id }}"
                                
                                @if ($company->id == old('company_id',null)) selected @endif
                            >
                                {{ strtoupper($company->name) }}
                            </option>
                            @endforeach             
                        </select>
                        @error('company_id')
                        <span class="text-danger mt-4">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-20">
                        <label for="city" class="form-label fw-semibold text-primary-light text-sm mb-8">Department <span class="text-danger-600">*</span> </label>
                        <select class="form-control radius-8 form-select" id="department_id" name="department_id">
                            <option selected disabled value="">Select Department</option>
                            @foreach ($departmants as $department)
                            <option 
                                value="{{ $department->id }}"
                                @if ($department->id == old('department_id')) selected @endif
                            >
                                {{ strtoupper($department->name) }}
                            </option>                         
                            @endforeach
                        </select>
                        @error('department_id')
                        <span class="text-danger mt-4">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-20">
                        <label for="city" class="form-label fw-semibold text-primary-light text-sm mb-8">Designation <span class="text-danger-600">*</span> </label>
                        <select class="form-control radius-8 form-select" id="designation_id" name="designation_id">
                            <option selected disabled value="">Select Designation</option>
                            @foreach ($designations as $designation)
                            <option 
                                value="{{ $designation->id }}"
                                @if ($designation->id == old('designation_id')) selected @endif
                            >
                                {{ strtoupper($designation->name) }}
                            </option>                         
                            @endforeach
                        </select>
                        @error('designation_id')
                        <span class="text-danger mt-4">{{ $message }}</span>
                        @enderror
                    </div>
                </div>                
                <div class="d-flex align-items-center justify-content-center gap-3 mt-24">
                    <a type="reset" class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-40 py-11 radius-8" href="{{ route('employees.index') }}">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary border border-primary-600 text-md px-24 py-12 radius-8">
                        Create
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection