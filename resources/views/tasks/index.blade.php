@extends('layout.main')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>taskss</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashtasks')}}">Dashtasks</a></li>
                        <li class="breadcrumb-item active">taskss</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">taskss list</h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Assignment</th>
                            <th>Status</th>
                            <th>Date of creation</th>
                            <th style="width: 40px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($taskss as $tasks)
                            <tr>
                                <td>{{$tasks->id}}</td>
                                <td>
                                    <a href="{{route('tasks.view', ['id' => $tasks->id])}}" class="link">{{$tasks->name}}</a>
                                </td>
                                <td>{{$tasks->user->name}}</td>
                                <td>
                                    {{count($tasks->Task)}}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-xs btn-primary"
                                                type="button"
                                                data-tasks="{{json_encode($tasks)}}"
                                                data-toggle="modal"
                                                data-target="#tasksEditModal">
                                            <i class="fas fa-edit"></i></button>
                                        <button class="btn btn-xs btn-danger"
                                                type="button"
                                                data-tasks="{{json_encode($tasks)}}"
                                                data-toggle="modal"
                                                data-target="#tasksDeleteModal">
                                            <i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            

        <div class="modal fade" id="tasksEditModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit tasks</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="tasksEditButton">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="tasksDeleteModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete tasks</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger hidden" id="tasksDeleteAlert"></div>
                        <input type="hidden" id="tasksDeleteId" value="" />
                        <p>Are you sure you want to delete: <span id="tasksDeleteName"></span>?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" id="tasksDeleteButton">Delete</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

    </section>
    <!-- /.content -->
@endsection