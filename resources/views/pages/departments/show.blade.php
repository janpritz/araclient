@extends('master')
@section('title')
    Departments
@endsection
@section('content')
    <div class="container">
        <div class="mx-auto p-2" style="width: 800px;">
            <div class="card">
                <header class="card-header">
                    <div class="pt-4">
                        <h3>Department Info</h3>
                    </div>
                </header>
                <main class="card-body">

                    <div class="form-group pt-3">
                        <label for="departmentID">
                            <h5>Department ID</h5>
                        </label>
                        <input type="text" class="form-control" id="departmentID" name="departmentID"
                            value="{{ $department->data->departmentID }}" readonly>
                    </div>
                    <div class="form-group pt-3">
                        <label for="departmentName">
                            <h5>Department Name</h5>
                        </label>
                        <input type="text" class="form-control" id="departmentName" name="departmentName"
                            value="{{ $department->data->departmentName }}" readonly>
                    </div>
                    <div class="d-grid gap-2 d-md-block mt-2">
                        <button type="button" class="btn btn-secondary btn-block"
                            onclick="window.location.href='{{ url()->previous() }}'">Back</button>
                    </div>
                </main>
            </div>
        </div>
    @endsection
