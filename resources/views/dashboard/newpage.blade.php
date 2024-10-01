@extends('layouts.dashboard')

@section('title', 'New Page')

@section('content')
<form method="post" action="{{route('storepage')}}">
    @csrf
   
    <div class="mb-3">
        <label for="title" class="form-label">Page Title</label>
        <input type="text" class="form-control bg-dark text-light border-secondary" name="title" placeholder="Enter the post title" value="{{ old('title') }}">
        <x-input-error name="title"/>
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Page Content</label>
        <textarea class="form-control bg-dark text-light border-secondary" name="content" rows="6" placeholder="Write your post content here...">{{ old('content') }}</textarea>
        <x-input-error name="content"/>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="url" class="form-label">Page URL</label>
            <div class="input-group">
                <span class="input-group-text bg-dark text-light border-secondary">localhost:8000/pages/</span>
                <input type="text" class="form-control bg-dark text-light border-secondary" id="url" name="url" placeholder="post-slug" value="{{ old('url') }}">
                <x-input-error name="url"/>
            </div>
        </div>
    </div>

    <div class="row">
       
        <div class="col-md-6 mb-3">
            <label for="status" class="form-label">Page Status</label>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="status_draft" name="status" value="0" checked {{ old('status') == 'draft' ? 'checked' : '' }}>
                <label class="form-check-label" for="status_draft">Draft</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="status_publish" name="status" value="1" {{ old('status') == 'publish' ? 'checked' : '' }}>
                <label class="form-check-label" for="status_publish">Publish</label>
            </div>
            <x-input-error name="status"/>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Create Page</button>
</form>
@endsection
