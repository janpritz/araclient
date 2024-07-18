@extends('master')
@section('title')
    Users
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <header class="card-header">
                        <span class="alert alert-success" id="alert-success" style="display:none"></span>
                        <span class="alert alert-danger" id="alert-danger" style="display:none"></span>
                        <div class="d-flex justify-content-between">
                            <h1>Users List</h1>
                            <a href="{{ route('users.create') }}" id="create_user"
                                class="btn bg-success btn-lg">Add New User</a>
                        </div>
                    </header>
                    <main class="card-body">
                        <table id="table" class="table table-bordered table-hover display compact">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align: left; font-size: 25px;">ID</th>
                                    <th scope="col" style="text-align: left; font-size: 25px;">First Name</th>
                                    <th scope="col" style="text-align: left; font-size: 25px;">Second Name</th>
                                    <th scope="col" style="text-align: left; font-size: 25px;">Last Name</th>
                                    <th scope="col" style="text-align: left; font-size: 25px;">Username</th>
                                    <th scope="col" style="text-align: left; font-size: 25px;">Email</th>
                                    <th scope="col" style="text-align: left; font-size: 25px;">Contact</th>
                                    {{-- <th scope="col" style="text-align: left; font-size: 25px;">Password</th> --}}
                                    <th scope="col" style="text-align: left; font-size: 25px;">Role</th>
                                    <th scope="col" style="text-align: center; font-size: 25px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = 1;
                                @endphp
                                @foreach ($users as $user)
                                    @foreach ($user as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->fname }}</td>
                                            <td>{{ $item->mname }}</td>
                                            <td>{{ $item->lname }}</td>
                                            <td>{{ $item->username }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->contact }}</td>
                                            {{-- <td>{{ $item->password }}</td> --}}
                                            <td>{{ $item->role }}</td>
                                            <td><a href="{{ route('users.show', $item->id) }}"
                                                    class="btn btn-warning btn-md showbtn"><i class="bi bi bi-eye-fill"
                                                        style="font-size: 15px;"></i>
                                                </a>

                                                <a href="{{ route('users.edit', $item->id) }}"
                                                    class="btn btn-info btn-md editBtn">
                                                    <i class="bi bi-pencil-square" style="font-size: 15px;"></i>
                                                </a>


                                                <form method="POST" action="{{ route('departments.destroy', $item->id) }}"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('Are you sure you want to delete {{ $item->fullname }}?')"
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
@endsection
