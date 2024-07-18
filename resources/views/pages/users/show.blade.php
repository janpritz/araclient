@extends('master')
@section('title')
    Users
@endsection
@section('content')
    <div class="container">
        <div class="mx-auto p-2" style="width: 800px;">
            <div class="card">
                <header class="card-header">
                    <div class="pt-4">
                        <h3>User Info</h3>
                    </div>
                </header>
                <main class="card-body">

                    <div class="form-group pt-3">
                        <label for="userID">
                            <h5>User ID</h5>
                        </label>
                        <input type="text" class="form-control" id="id" name="id"
                            value="{{ $user->data->id }}" readonly>
                    </div>
                    <div class="form-group pt-3">
                        <label for="userFname">
                            <h5>User First Name</h5>
                        </label>
                        <input type="text" class="form-control" id="fname" name="fname"
                            value="{{ $user->data->fname }}" readonly>
                    </div>
                    <div class="form-group pt-3">
                        <label for="mname">
                            <h5>User Middle Name</h5>
                        </label>
                        <input type="text" class="form-control" id="mname" name="mname"
                            value="{{ $user->data->mname }}" readonly>
                    </div>
                    <div class="form-group pt-3">
                        <label for="lname">
                            <h5>User Middle Name</h5>
                        </label>
                        <input type="text" class="form-control" id="lname" name="lname"
                            value="{{ $user->data->lname }}" readonly>
                    </div>
                    <div class="form-group pt-3">
                        <label for="username">
                            <h5>Username</h5>
                        </label>
                        <input type="text" class="form-control" id="username" name="username"
                            value="{{ $user->data->username }}" readonly>
                    </div>
                    <div class="form-group pt-3">
                        <label for="email">
                            <h5>Email</h5>
                        </label>
                        <input type="text" class="form-control" id="email" name="email"
                            value="{{ $user->data->email }}" readonly>
                    </div>
                    <div class="form-group pt-3">
                        <label for="contact">
                            <h5>Contact</h5>
                        </label>
                        <input type="text" class="form-control" id="contact" name="contact"
                            value="{{ $user->data->contact }}" readonly>
                    </div>
                    <div class="form-group pt-3">
                        <label for="role">
                            <h5>Role</h5>
                        </label>
                        <input type="text" class="form-control" id="role" name="role"
                            value="{{ $user->data->role }}" readonly>
                    </div>
                    <div class="d-grid gap-2 d-md-block mt-2">
                        <button type="button" class="btn btn-secondary btn-block"
                            onclick="window.location.href='{{ url()->previous() }}'">Back</button>
                    </div>
                </main>
            </div>
        </div>
    @endsection
