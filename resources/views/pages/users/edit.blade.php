@extends('master')
@section('title')
    Users
@endsection
@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit User</h2>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.update', $user->data->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="modal-body">
                                {{-- create a form here.. --}}
                                <div class="form-group">
                                    <label for="">First Name</label>
                                    <input type="text" name="fname" class="form-control" id="" value="{{$user->data->fname}}">
                                    {{-- <span id="name_name_error" class="text-danger"></span> --}}
                                </div>
                                <div class="form-group">
                                    <label for="">Middle Name</label>
                                    <input type="text" name="mname" class="form-control" id="" value="{{$user->data->mname}}>
                                    {{-- <span id="name_name_error" class="text-danger"></span> --}}
                                </div>
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" name="lname" class="form-control" id="" value="{{$user->data->lname}}>
                                    {{-- <span id="name_name_error" class="text-danger"></span> --}}
                                </div>
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username" class="form-control" id="" value="{{$user->data->username}}>
                                    {{-- <span id="username_name_error" class="text-danger"></span> --}}
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control" id="" value="{{$user->data->email}}>
                                    <span id="email_name_error" class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="">Contact</label>
                                    <input type="text" name="contact" class="form-control" id="" value="{{$user->data->contact}}>
                                    <span id="contact_name_error" class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control" id="" value="{{$user->data->lname}}>
                                    <span id="password_name_error" class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-select form-control" name="role" id="role"
                                        aria-label="Default select example" value="{{$user->data->role}}>
                                        <option value="Admin">Admin</option>
                                        <option value="User">User</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-1 mt-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
                                    </button>
                                    <a href="{{ route('departments.index') }}" class="btn btn-secondary">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
