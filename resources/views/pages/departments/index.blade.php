@extends('master')
@section('title')
    Departments
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <header class="card-header">
                        {{-- Display flash messages --}}
                        @if(session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @if(session()->has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        <div class="d-flex justify-content-between">
                            <h1>Department List</h1>
                            <a href="{{ route('departments.create') }}" id="create_departments"
                                class="btn bg-success btn-lg">Add New
                                Department</a>
                        </div>
                    </header>
                    <main class="card-body">
                        <table id="table" class="table table-bordered table-hover display compact">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align: left; font-size: 25px;">Department ID</th>
                                    <th scope="col" style="text-align: left; font-size: 25px;">Department Name</th>
                                    <th scope="col" style="text-align: center; font-size: 25px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = 1;
                                @endphp
                                @foreach ($departments as $department)
                                    @foreach ($department as $item)
                                        <tr>
                                            <td style="text-align: left">{{ $item->departmentID }}</td>
                                            <td>{{ $item->departmentName }}</td>
                                            <td style="text-align: center;">
                                                <a href="{{ route('departments.show', $item->departmentID) }}"
                                                    class="btn btn-warning btn-md showbtn"><i class="bi bi bi-eye-fill"
                                                        style="font-size: 15px;"></i>
                                                </a>

                                                <a href="{{ route('departments.edit', $item->departmentID) }}"
                                                    class="btn btn-info btn-md editBtn">
                                                    <i class="bi bi-pencil-square" style="font-size: 15px;"></i>
                                                </a>

                                                <form method="POST"
                                                    action="{{ route('departments.destroy', $item->departmentID) }}"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('Are you sure you want to delete {{ $item->departmentName }}?')"
                                                        class="btn btn-danger btn-md deleteBtn">
                                                        <i class="bi bi-trash" style="font-size: 15px;"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </main>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete(departmentID) {
            if (confirm('Are you sure you want to delete this department?')) {
                document.getElementById('deleteForm' + departmentID).submit();
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.all.min.js"></script>
@endsection
