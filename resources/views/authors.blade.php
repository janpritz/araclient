@extends('master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h1>Authors List</h1>
                                        </div>
                                        <div>
                                            <a href="#" id="create_author" data-toggle="modal"
                                                data-target="#addModal" class="btn bg-success btn-lg">Add New
                                                Author</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Author ID</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Department</th>
                                <th>ORCID</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($authors as $author)
                                @foreach ($author as $item)
                                    <tr>
                                        <td style="text-align: left">{{ $item->id }}</td>
                                        <td>{{ $item->fname }}</td>
                                        <td>{{ $item->mname }}</td>
                                        <td>{{ $item->lname }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->contact }}</td>
                                        <td>{{ $item->departmentName }}</td>
                                        <td>{{ $item->orcid }}</td>
                                        <td style="text-align: center;">
                                            <div class="row" role="group">
                                                <div class="col-md-4">
                                                    <button class="btn btn-info btn-md editBtn" data-toggle="modal"
                                                        data-target="#editModal" data-id="{{ $item->id }}"
                                                        data-fname="{{ $item->fname }}"
                                                        data-mname="{{ $item->mname }}"
                                                        data-lname="{{ $item->lname }}"
                                                        data-email="{{ $item->email }}"
                                                        data-contact="{{ $item->contact }}"
                                                        data-departmentid="{{ $item->departmentID }}"
                                                        data-orcid="{{ $item->orcid }}">

                                                        <i class="bi bi-pencil-square" style="font-size: 15px;"></i>
                                                    </button>
                                                </div>
                                                <div class="col">
                                                    <button class="btn btn-danger btn-md deleteBtn"
                                                        onclick="delete_author({{ $item->id }})"> <i
                                                            class="bi bi-trash" style="font-size: 15px;"></i>
                                                    </button>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
@endsection
