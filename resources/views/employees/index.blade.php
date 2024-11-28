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
                    <h5 class="card-title mb-0">Striped Rows</h5> 
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
                                    <th scope="col">logo</th>
                                    <th scope="col">email </th>
                                    <th scope="col">city</th>
                                    <th scope="col" class="text-center">country</th>
                                    <th scope="col" class="text-center">actions</th>
                                </tr>
                            </thead>
                           
                        </table>
                    </div>


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