@extends('master')
@section('content')
    <div class="container">
        <div class="mx-auto p-2" style="width: 800px;">
            <div class="pt-4">
                <h3>Are you sure you want to delete this department?</h3>
            </div>
            @if($department)
                <div class="form-group pt-3">
                    <label for="departmentID">
                        <h5>Department ID: {{ $department->data->departmentID }}</h5>
                    </label>
                    <label for="departmentName">
                        <h5>Department Name: {{ $department->data->departmentName }}</h5>
                    </label>
                </div>
                <div class="d-grid gap-2 d-md-block mt-2">
                    <form action="{{ route('departments.delete', $department->data->departmentID) }}" method="DELETE">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('departments.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            @else
                <div class="alert alert-danger mt-4" role="alert">
                    Department not found.
                </div>
            @endif
        </div>
    </div>
@endsection
