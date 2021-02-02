@extends('app')

@section('nav')
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <p class="mt-2">Manage Articles Data</p>


</nav>
@endsection

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

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header d-flex py-3 justify-content-between">
        <h6 class="m-0 d-inline font-weight-bold text-primary">Articles Table</h6>

        <a href="{{ route('articles.create') }}" class="btn btn-success btn-icon-split">
            <span class="icon text-white-50">
                +
            </span>
            <span class="text">Add article</span>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTableArticles" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Article's category</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                    <tr>
                        <td>{{ strtoupper($article->category->name) }}</td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->description }}</td>
                        <td>{{ $article->content }}</td>
                        <td>
                            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-edit"></i>
                                </span>
                                <span class="text">Edit</span>
                            </a>

                            <button class="btn btn-danger btn-icon-split btn-modalDel" data-toggle="modal" data-target="#deleteModal" data-id="{{ $article->id }}">
                                <span class="icon text-white-50">
                                    <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">Delete</span>
                                <form style="display:none" action="{{ route('articles.destroy',$article->id) }}" id="{{ 'form-delete-'.$article->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('deletemodal')

@endsection

@section('script')
<script type="text/javascript">
    document.addEventListener('click', e => {
        if (e.target.parentElement.classList.contains('btn-modalDel')) {
            const articleId = e.target.parentElement.dataset.id;

            $('#btn-del').on('click', () => {
                $(`#form-delete-${articleId}`).submit();
            });
        }
    });
</script>
@endsection