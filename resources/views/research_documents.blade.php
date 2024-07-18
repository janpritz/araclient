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
                                                <h1>Research Documents List</h1>
                                            </div>
                                            <div>
                                                <a href="#" id="create_researchDocument" data-toggle="modal"
                                                    data-target="#addModal" class="btn bg-success btn-lg">Add New
                                                    Research Document</a>
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
                                    <th>Research ID</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Publication Date</th>
                                    <th>Department</th>
                                    <th>Abstract</th>
                                    <th>Category</th>
                                    <th>Link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($researchDocuments as $researchDocument)
                                    @foreach ($researchDocument as $item)
                                        <tr>
                                            <td style="text-align: left">{{ $item->id }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->authorName }}</td>
                                            <td>{{ $item->publicationDate }}</td>
                                            <td>{{ $item->departmentName }}</td>
                                            <td>{{ $item->Abstract }}</td>
                                            <td>{{ $item->category }}</td>
                                            <td>{{ $item->link }}</td>
                                            <td style="text-align: center;">
                                                <div class="row" role="group">
                                                    <div class="col-md-4">
                                                        <button class="btn btn-info btn-md editBtn" data-toggle="modal"
                                                            data-target="#editModal" data-id="{{ $item->id }}"
                                                            data-title="{{ $item->title }}"
                                                            data-authorid="{{ $item->authorID }}"
                                                            data-publicationdate="{{ $item->publicationDate }}"
                                                            data-departmentid="{{ $item->departmentID }}"
                                                            data-abstract="{{ $item->Abstract }}"
                                                            data-category="{{ $item->category }}"
                                                            data-link="{{ $item->link }}">
                                                            <i class="bi bi-pencil-square" style="font-size: 15px;"></i>
                                                        </button>
                                                    </div>
                                                    <div class="col">
                                                        <button class="btn btn-danger btn-md deleteBtn"
                                                            onclick="delete_researchDocument({{ $item->id }})"> <i
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
