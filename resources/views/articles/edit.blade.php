@extends('app')

@section('content')
<div class="card shadow mt-4 col-10 p-0">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Update Article</h6>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('articles.update', $article->id) }}">
            @method('PUT')
            @csrf

            <div class="input mb-4">
                <label for="input-category"><strong>Article's category</strong></label>
                <select name="articlecategory" id="input-category" class="form-control @error('articlecategory') is-invalid @enderror">
                    <option value="">Select Category</option>

                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($category->id === $article->category->id) selected @endif>{{ strtoupper($category->name) }}</option>
                    @endforeach
                </select>
                @error('articlecategory')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="input mb-4">
                <label for="input-article"><strong>Title</strong></label>
                <input type="text" name="title" id="input-title" class="form-control  @error('title') is-invalid @enderror" placeholder="Input title here.." value="{{ $article->title }}">
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="input mb-4">
                <label for="input-description"><strong>Description</strong></label>
                <textarea type="text" name="description" id="input-description" class="form-control  @error('description') is-invalid @enderror" rows="3" placeholder="Input description here..">{{ $article->description }}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="input mb-4">
                <label for="input-content"><strong>Content</strong></label>
                <textarea type="text" name="content" id="input-content" class="form-control  @error('content') is-invalid @enderror" rows="6" placeholder="Write content here..">{{ $article->content }}</textarea>
                @error('content')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection