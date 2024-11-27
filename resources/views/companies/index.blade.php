@extends('layout.layout')

@php
    $title='Company';
    $subTitle = 'Settings - Company';

@endphp

@section('content')
<div class="card h-100 p-0 radius-12 overflow-hidden">
    <div class="card-body p-40">
        <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title mb-0">Striped Rows</h5> 
                    <div>
                        {{-- <button type="button" >Primary</button> --}}

                        <a href="{{ route('companies.create') }}" class="btn rounded-pill btn-primary-600 radius-8 px-20 py-11">Create</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table striped-table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">logo</th>
                                    <th scope="col">name</th>
                                    <th scope="col">email </th>
                                    <th scope="col">city</th>
                                    <th scope="col" class="text-center">country</th>
                                    <th scope="col" class="text-center">actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $company)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $company->logo }}" alt="company logo" width="100" height="100" class="flex-shrink-0 me-12 radius-8 me-12">
                                            <div class="flex-grow-1">
                                                <h6 class="text-md mb-0 fw-normal">Blue t-shirt</h6>
                                                {{-- <span class="text-sm text-secondary-light fw-normal">Fashion</span> --}}
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $company->name }} </td>
                                    <td>{{ $company->email }}</td>
                                    <td>{{ $company->city }}</td>
                                    <td class="text-center">
                                        <span class="bg-success-focus text-success-main px-32 py-4 rounded-pill fw-medium text-sm">{{ $company->country }}</span>
                                    </td>
                                    <td class="d-flex gap">
                                        <div class="me-4">
                                            <a  
                                            class="btn rounded-pill btn-primary-600 radius-8 px-20 py-11"
                                                href="{{ route('companies.edit',['company' => $company]) }}">edit
                                            </a>
                                        </div>    
                                        <div>
                                            <form action="" method="post">
                                                <button type="submit" class="btn rounded-pill btn-danger-600 radius-8 px-20 py-11">Delete</button>
                                            </form>
    
                                        </div>                                                                         
                                    </td>
                                </tr>
                                @endforeach
                                {{-- <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{  }}" alt="" class="flex-shrink-0 me-12 radius-8 me-12">
                                            <div class="flex-grow-1">
                                                <h6 class="text-md mb-0 fw-normal">Blue t-shirt</h6>
                                                <span class="text-sm text-secondary-light fw-normal">Fashion</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$500.00</td>
                                    <td>15%</td>
                                    <td>300</td>
                                    <td class="text-center">
                                        <span class="bg-success-focus text-success-main px-32 py-4 rounded-pill fw-medium text-sm">70</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets/images/product/product-img2.png') }}" alt="" class="flex-shrink-0 me-12 radius-8 me-12">
                                            <div class="flex-grow-1">
                                                <h6 class="text-md mb-0 fw-normal">Nike Air Shoe</h6>
                                                <span class="text-sm text-secondary-light fw-normal">Fashion</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$150.00</td>
                                    <td>N/A</td>
                                    <td>200</td>
                                    <td class="text-center">
                                        <span class="bg-success-focus text-success-main px-32 py-4 rounded-pill fw-medium text-sm">70</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets/images/product/product-img3.png') }}" alt="" class="flex-shrink-0 me-12 radius-8 me-12">
                                            <div class="flex-grow-1">
                                                <h6 class="text-md mb-0 fw-normal">Woman Dresses</h6>
                                                <span class="text-sm text-secondary-light fw-normal">Fashion</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$300.00</td>
                                    <td>$50.00</td>
                                    <td>1500</td>
                                    <td class="text-center">
                                        <span class="bg-success-focus text-success-main px-32 py-4 rounded-pill fw-medium text-sm">70</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets/images/product/product-img4.png') }}" alt="" class="flex-shrink-0 me-12 radius-8 me-12">
                                            <div class="flex-grow-1">
                                                <h6 class="text-md mb-0 fw-normal">Smart Watch</h6>
                                                <span class="text-sm text-secondary-light fw-normal">Fashion</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$400.00</td>
                                    <td>$50.00</td>
                                    <td>700</td>
                                    <td class="text-center">
                                        <span class="bg-success-focus text-success-main px-32 py-4 rounded-pill fw-medium text-sm">70</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('assets/images/product/product-img5.png') }}" alt="" class="flex-shrink-0 me-12 radius-8 me-12">
                                            <div class="flex-grow-1">
                                                <h6 class="text-md mb-0 fw-normal">Hoodie Rose</h6>
                                                <span class="text-sm text-secondary-light fw-normal">Fashion</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$300.00</td>
                                    <td>25%</td>
                                    <td>500</td>
                                    <td class="text-center">
                                        <span class="bg-success-focus text-success-main px-32 py-4 rounded-pill fw-medium text-sm">70</span>
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-20">{{ $companies->links() }}</div>
                    

                </div>
            </div><!-- card end -->
        </div>
        </div>
    </div>
</div>
@endsection