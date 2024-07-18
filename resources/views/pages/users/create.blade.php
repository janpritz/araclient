@extends('master')
@section('title')
    Users
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User </h5>
            </div>
            <div class="modal-body">
                {{-- create a form here.. --}}
                <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" name="fname" class="form-control" id="">
                    {{-- <span id="name_name_error" class="text-danger"></span> --}}
                </div>
                <div class="form-group">
                    <label for="">Middle Name</label>
                    <input type="text" name="mname" class="form-control" id="">
                    {{-- <span id="name_name_error" class="text-danger"></span> --}}
                </div>
                <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" name="lname" class="form-control" id="">
                    {{-- <span id="name_name_error" class="text-danger"></span> --}}
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control" id="">
                    {{-- <span id="username_name_error" class="text-danger"></span> --}}
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control" id="">
                    <span id="email_name_error" class="text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="">Contact</label>
                    <input type="text" name="contact" class="form-control" id="">
                    <span id="contact_name_error" class="text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" id="" placeholder="Password must be 8 characters">
                    <span id="password_name_error" class="text-danger" ></span>
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select class="form-select form-control" name="role" id="role"
                        aria-label="Default select example" required>
                        <option disabled selected>Select Role</option>
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="resetForm()">Close</button>
                <button type="submit" class="btn btn-primary addBtn">Save</button>
            </div>
            {{-- this is to make sure the save changes button is within form --}}
        </form>
    </div>
@endsection
