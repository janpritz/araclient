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
                                                <h1>Reviews List</h1>
                                            </div>
                                            <div>
                                                <a href="#" id="create_reviews" data-toggle="modal"
                                                    data-target="#addModal" class="btn bg-success btn-lg">Add Review</a>
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
                                    <th>Review ID</th>
                                    <th>Research Document</th>
                                    <th>User</th>
                                    <th>Rating</th>
                                    <th>Comment</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = 1;
                                @endphp
                                @foreach ($reviews as $review)
                                    @foreach ($review as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->rating }}</td>
                                            <td>{{ $item->comment }}</td>
                                            <td style="text-align: center;">
                                                <div class="row" role="group">
                                                    <div class="col-md-4">
                                                        <button class="btn btn-info btn-md editBtn" data-toggle="modal"
                                                            data-target="#editModal" data-id="{{ $item->id }}"
                                                            data-researchid = "{{ $item->researchID }}"
                                                            data-userid="{{ $item->userID }}"
                                                            data-rating="{{ $item->rating }}"
                                                            data-comment="{{ $item->comment }}">
                                                            <i class="bi bi-pencil-square" style="font-size: 15px;"></i>
                                                        </button>
                                                    </div>
                                                    <div class="col">
                                                        <button class="btn btn-danger btn-md deleteBtn"
                                                            onclick="delete_review({{ $item->id }})"> <i
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
