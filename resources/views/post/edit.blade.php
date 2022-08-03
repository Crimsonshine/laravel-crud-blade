@extends('layouts.main')
@section('content')
<div>
    <form action="{{ route('post.update', $post->id) }}" method="post">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{ $post->title }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea name="content" class="form-control" id="content" placeholder="Content">{{ $post->content }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="text" name="image" class="form-control" id="image" placeholder="Image" value="{{ $post->image }}">
        </div>

        <label class="form-label">Category</label>
        <select class="form-select" aria-label="Category" name="category_id">
            @foreach ($categories as $category)
                <option
                {{ $category->id === $post->category->id ? 'selected' : ''}}

                value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>

        <label class="form-label">Tags</label>
        <select class="form-select" multiple aria-label="tags" name="tags[]">
            @foreach ($tags as $tag)
                <option
                @foreach ($post->tags as $postTag)
                    {{ $tag->id === $postTag->id ? 'selected' : ''}}
                @endforeach
                value="{{ $tag->id }}">{{ $tag->title }}</option>
            @endforeach
        </select>

        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Update</button>
        </div>
    </form>
</div>
@endsection

