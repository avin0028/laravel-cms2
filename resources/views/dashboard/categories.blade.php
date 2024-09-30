@extends('layouts.dashboard')

@section('title', 'Manage Categories')

@section('content')
<div class="container-fluid">
    <h2 class="my-4">Categories</h2>

    <div class="table-responsive">
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    
                    <th scope="col">Category Name</th>
                    <th scope="col">Parent ID</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->parent_id ?? 'None' }}</td>
                    <td>
                        <!-- Delete Button -->
                        <form method="POST" action="{{ route('dashboard.deletecategory', $category->id) }}" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?');">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection