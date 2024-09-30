@extends('layouts.dashboard')

@section('title', 'Edit Post')

@section('content')
<form method="post" action="{{ route('postupdate', $post->id) }}">
    @csrf
    @method('PUT')
   
    <div class="mb-3">
        <label for="title" class="form-label">Post Title</label>
        <input type="text" class="form-control bg-dark text-light border-secondary" name="title" placeholder="Enter the post title" value="{{ old('title', $post->title) }}">
        <x-input-error name="title"/>
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Post Content</label>
        <textarea class="form-control bg-dark text-light border-secondary" name="content" rows="6" placeholder="Write your post content here...">{{ old('content', $post->content) }}</textarea>
        <x-input-error name="content"/>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="tags" class="form-label">Tags (Separate with commas)</label>
            <input type="text" class="form-control bg-dark text-light border-secondary" id="tags" name="tags" placeholder="e.g., tech, programming, coding" value="{{ old('tags', $post->tags) }}">
            <x-input-error name="tags"/>
        </div>

        <div class="col-md-6 mb-3">
            <label for="url" class="form-label">Post URL</label>
            <div class="input-group">
                <span class="input-group-text bg-dark text-light border-secondary">localhost:8000/posts/</span>
                <input type="text" class="form-control bg-dark text-light border-secondary" id="url" name="url" placeholder="post-slug" value="{{ old('url', $post->url) }}">
                <x-input-error name="url"/>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Select Categories Input -->
        <div class="col-md-6 mb-3">
            <label for="categories" class="form-label">Select Categories</label>
            <div class="form-check">
                @foreach($categories as $category)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="category_{{ $category->id }}" name="categories[]" value="{{ $category->id }}" {{ (in_array($category->id, old('categories', $post->categories->pluck('id')->toArray()))) ? 'checked' : '' }}>
                        <label class="form-check-label" for="category_{{ $category->id }}">{{ $category->name }}</label>
                    </div>
                @endforeach
            </div>
            <x-input-error name="categories"/>
        </div>

        <div class="col-md-6 mb-3">
            <label for="status" class="form-label">Post Status</label>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="status_draft" name="status" value="0" {{ old('status', $post->status) == 0 ? 'checked' : '' }}>
                <label class="form-check-label" for="status_draft">Draft</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="status_publish" name="status" value="1" {{ old('status', $post->status) == 1 ? 'checked' : '' }}>
                <label class="form-check-label" for="status_publish">Publish</label>
            </div>
            <x-input-error name="status"/>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Update Post</button>
</form>
@endsection
