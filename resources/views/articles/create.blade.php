@extends('app')

@section('content')
<div class="card shadow mt-4 col-6 p-0">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Insert New Article</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('articles.store') }}">
            @csrf

            <div class="input mb-3">
                <select name="articlecategory" id="input-category" class="form-control @error('articlecategory') is-invalid @enderror" value="{{ old('articlecategory') }}">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ strtoupper($category->name) }}</option>
                    @endforeach
                </select>
                @error('articlecategory')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="input mb-3">
                <input type="text" name="title" id="input-article" class="form-control  @error('title') is-invalid @enderror" placeholder="Input title here.." value="{{ old('title') }}">
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="input mb-3">
                <textarea type="text" name="description" id="input-article" class="form-control  @error('description') is-invalid @enderror" rows="3" placeholder="Input description here..">{{ old('title') }}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="input mb-3">
                <textarea type="text" name="content" id="input-article" class="form-control  @error('content') is-invalid @enderror" rows="6" placeholder="Write content here..">{{ old('title') }}</textarea>
                @error('content')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Insert</button>
        </form>
    </div>
</div>
@endsection