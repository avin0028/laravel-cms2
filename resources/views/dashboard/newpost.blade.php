@extends('layouts.dashboard')

@section('title', 'New Post')

@section('content')
<form method="post" action="">
    @csrf
   
    <div class="mb-3">
        <label for="title" class="form-label">Post Title</label>
        <input type="text" class="form-control bg-dark text-light border-secondary" name="title" placeholder="Enter the post title" >
    </div>

    
    <div class="mb-3">
        <label for="content" class="form-label">Post Content</label>
        <textarea class="form-control bg-dark text-light border-secondary" name="content" rows="6" placeholder="Write your post content here..." ></textarea>
    </div>

    
    <div class="row">
        
        <div class="col-md-6 mb-3">
            <label for="tags" class="form-label">Tags (Separate with commas)</label>
            <input type="text" class="form-control bg-dark text-light border-secondary" id="tags" name="tags" placeholder="e.g., tech, programming, coding" required>
        </div>

        
        <div class="col-md-6 mb-3">
            <label for="url" class="form-label">Post URL</label>
            <div class="input-group">
                <span class="input-group-text bg-dark text-light border-secondary">localhost:8000/posts/</span>
                <input type="text" class="form-control bg-dark text-light border-secondary" id="url" name="url" placeholder="post-slug" required>
            </div>
        </div>
    </div>

    
    <button type="submit" class="btn btn-primary">Create Post</button>
</form>

 
@endsection
