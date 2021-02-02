@extends('app')

@section('content')
<!-- Page Heading -->

@if (session('message'))
<div class="mt-4 alert alert-success alert-dismissible fade show">
    {{ session('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<p class="my-4">Manage Categories Data</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header d-flex py-3 justify-content-between">
        <h6 class="m-0 d-inline font-weight-bold text-primary">Categories Table</h6>

        <a href="{{ route('categories.create') }}" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                +
            </span>
            <span class="text">Add category</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ strtoupper($category->name) }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Edit</span>
                            </a>

                            <a href="#" class="btn btn-danger btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Delete</span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection