@extends('layouts.dashboard')

@section('title', 'New Category')

@section('content')
<form method="post" action="{{route('category.store')}}">
    @csrf
    <div class="mb-3 w-25">
        <label  class="form-label">Category Name</label>
        <input type="text" class="form-control bg-dark text-light border-secondary" name="name" placeholder="Enter category name" required>
        <x-input-error name="name"/>
    </div>
    <div class="mb-3 w-25">
        <label for="parent-category" class="form-label">Parent Category (Optional)</label>
        <select class="form-control bg-dark text-light border-secondary"  name="parent_id">
            <option value="">None</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Create Category</button>
</form>
@endsection