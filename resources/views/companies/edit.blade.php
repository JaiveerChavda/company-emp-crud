@extends('layout.layout')

@php
    $title='Company';
    $subTitle = 'Company - Edit';

@endphp

@section('content')
<div class="card h-100 p-0 radius-12 overflow-hidden">
    <div class="card-body p-40">
        <form action="{{ route('companies.update',['company' => $company]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-20">
                        <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">Name <span class="text-danger-600">*</span></label>
                        <input type="text" class="form-control radius-8" id="name" name="name" value="{{ $company->name }}" placeholder="Enter Full Name">
                        @error('name')
                        <span class="text-danger mt-4">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-20">
                        <label for="email" class="form-label fw-semibold text-primary-light text-sm mb-8">Email <span class="text-danger-600">*</span></label>
                        <input type="email" class="form-control radius-8" id="email" name="email" value="{{ $company->email }}" placeholder="Enter email address">
                        @error('email')
                        <span class="text-danger mt-4">{{ $message }}</span>
                        @enderror
                    </div>
                </div>         
                <div class="col-sm-6">
                    <div class="mb-20">
                        <label for="country" class="form-label fw-semibold text-primary-light text-sm mb-8">Country <span class="text-danger-600">*</span> </label>
                        <select class="form-control radius-8 form-select" id="country" name="country">
                            <option selected disabled>Select Country</option>
                            <option value="usa">USA</option>
                            <option value="bangladesh">Bangladesh</option>
                            <option value="pakistan">Pakistan</option>
                            <option value="india">India</option>
                            <option value="canada">Canada</option>
                        </select>
                        @error('country')
                        <span class="text-danger mt-4">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-20">
                        <label for="city" class="form-label fw-semibold text-primary-light text-sm mb-8">City <span class="text-danger-600">*</span> </label>
                        <select class="form-control radius-8 form-select" id="city" name="city">
                            <option selected disabled>Select City</option>
                            <option value="Washington">Washington</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Lahor">Lahor</option>
                            <option value="Panjab">Panjab</option>
                        </select>
                        @error('city')
                        <span class="text-danger mt-4">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <label class="form-label">Choose Company logo</label>
                    <input class="form-control form-control-sm" name="logo" type="file">
                    <img src="{{ $company->logo }}" alt="company logo" class="mt-12" width="100" height="100">
                    @error('logo')
                    <span class="text-danger mt-4">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <div class="mb-20">
                        <label for="address" class="form-label fw-semibold text-primary-light text-sm mb-8"> Address* <span class="text-danger-600">*</span></label>
                        <input type="text" name="address" class="form-control radius-8" id="address" value="{{ $company->address }}" placeholder="Enter Your Address">
                        @error('address')
                        <span class="text-danger mt-4">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-center gap-3 mt-24">
                    <button type="reset" class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-40 py-11 radius-8">
                        Reset
                    </button>
                    <button type="submit" class="btn btn-primary border border-primary-600 text-md px-24 py-12 radius-8">
                        Save Change
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection