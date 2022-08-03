@extends('layouts.main')
@section('content')
<div>
    <form action="{{ route('post.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input
            value="{{ old('title') }}"
            type="text" name="title" class="form-control" id="title" placeholder="Title">
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea name="content" class="form-control" id="content" placeholder="Content">{{ old('content') }}</textarea>
            @error('content')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input
            value="{{ old('image') }}"
            type="text" name="image" class="form-control" id="image" placeholder="Image">
            @error('image')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <label class="form-label">Category</label>
        <select class="form-select" aria-label="Category" name="category_id">
            @foreach ($categories as $category)
                <option
                {{ old('category_id') == $category->id ? 'selected' : ''}}
                value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>

        <label class="form-label">Tags</label>
        <select class="form-select" multiple aria-label="tags" name="tags[]">
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
            @endforeach
        </select>

        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Create</button>
        </div>
    </form>
</div>
@endsection

