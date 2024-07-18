@extends('master')
@section('content')
    <div class="container">
        <div class="mx-auto p-2" style="width: 800px;">
            <div class="pt-4">
                <h3>Add New Department</h3>
            </div>
            <form action="{{ route('departments.store') }}" method="POST">
                @csrf
                <div class="form-group pt-3">
                    <label for="departmentName">
                        <h5>Department Name</h5>
                    </label>
                    <input type="text" class="form-control" id="departmentName" name="departmentName" required>
                </div>
                <div class="d-grid gap-2 d-md-block mt-2">
                    <button type="submit" class="btn btn-success btn-block">Save</button>
                    <button type="button" class="btn btn-secondary btn-block" onclick="window.location.href='{{ url()->previous() }}'">Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endsection
