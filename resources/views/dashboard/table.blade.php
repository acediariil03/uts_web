@extends('layout.dashboardlayout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">These are my products and projects that I have worked on</a></p>

        <!-- DataTables Project -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary py-2">Data Tables Project</h6>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add
                    Porto</button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Project</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('porto.submit') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Project Name:</label>
                                        <input type="text" class="form-control" id="recipient-name" name="project_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Desc:</label>
                                        <textarea class="form-control" id="message-text" name="description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Upload Image:</label>
                                        <input type="file" class="file-input" id="customFile" name="image">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Project Name</th>
                                <th>Desc</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Updated At </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($porto as $row)
                                <tr>

                                    <td>{{ $row->project_name }}</td>
                                    <td>{{ $row->description }}</td>
                                    <td>{{ $row->image }}</td>
                                    <td>{{ $row->created_at }}</td>
                                    <td>{{ $row->updated_at }}</td>
                                    <td><button type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#exampleModal-edit{{$row->id}}">Edit
                                            Porto</button>

                                        <div class="modal fade" id="exampleModal-edit{{$row->id}}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Project</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{route('porto.update', $row->id)}}">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="recipient-name" class="col-form-label">Project
                                                                    Name:</label>
                                                                <input type="text" class="form-control"
                                                                    id="recipient-name" name="project_name" value="{{$row->project_name}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="message-text"
                                                                    class="col-form-label">Desc:</label>
                                                                <textarea class="form-control" id="message-text" name="description" value="{{$row->description}}"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="message-text" class="col-form-label">Upload
                                                                    Image:</label>
                                                                <input type="file" class="file-input" id="customFile"
                                                                    name="image" value="{{$row->image}}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-warning">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{route('porto.delete', $row->id)}}"
                                            class="btn btn-danger btn-sm">Delete Porto</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
