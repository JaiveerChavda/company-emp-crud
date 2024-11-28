@extends('layout.layout')

@php
    $title='Employee';
    $subTitle = 'Employee - List';

@endphp

@section('content')
<div class="card h-100 p-0 radius-12 overflow-hidden">
    <div class="card-body p-40">
        <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title mb-0">Employees list</h5> 
                    <div>
                        {{-- <button type="button" >Primary</button> --}}

                        <a href="{{ route('employees.create') }}" class="btn rounded-pill btn-primary-600 radius-8 px-20 py-11">Create</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table striped-table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">profile/ <span class="text-sm">name</span></th>
                                    <th scope="col">company </th>
                                    <th scope="col">department</th>
                                    <th scope="col" class="text-center">designation</th>
                                    <th scope="col" class="text-center">actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $emp)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $emp->profile }}" alt="employee logo" width="50" height="50" class="flex-shrink-0 me-12 radius-8">
                                            <div class="flex-grow-1">
                                                <h6 class="text-md mb-0 fw-normal">{{ $emp->first_name }}</h6>
                                                {{-- <span class="text-sm text-secondary-light fw-normal">Fashion</span> --}}
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $emp->company->name }}</td>
                                    <td>{{ $emp->department->name }}</td>
                                    <td class="text-center">
                                        <span class="bg-success-focus text-success-main px-32 py-4 rounded-pill fw-medium text-sm">{{ $emp->designation->name }}</span>
                                    </td>
                                    <td class="d-flex gap">
                                        <div class="me-4">
                                            <a  
                                            class="btn rounded-pill btn-primary-600 radius-8 px-20 py-11"
                                                href="{{ route('employees.edit',['employee' => $emp]) }}">edit
                                            </a>
                                        </div>    
                                        <div>
                                            <form id="deleteForm" onsubmit="confirm('Are you sure you want to delete?')" action="{{ route('employees.destroy',['employee' => $emp]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn rounded-pill btn-danger-600 radius-8 px-20 py-11">Delete</button>
                                            </form>
    
                                        </div>                                                                         
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-20">{{ $employees->links() }}</div>

                </div>
            </div><!-- card end -->
        </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        document.getElementById('deleteForm').addEventListener('submit', 
            function(event) { 
                var confirmDelete = confirm('Are you sure you want to delete this company?'); 
                if (!confirmDelete) { 
                    event.preventDefault(); 
                }
        })
    </script>
@endpush