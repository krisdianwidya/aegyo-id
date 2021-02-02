@extends('app')

@section('content')
<div class="card shadow mt-4 col-6 p-0">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Insert New Category</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('categories.store') }}">
            @csrf

            <input type="text" name="category" id="input-category" class="form-control  @error('category') is-invalid @enderror" placeholder="Input category name here..">

            @error('category')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror



            <button type="submit" class="btn btn-success mt-2">Insert</button>

        </form>
    </div>
</div>
@endsection