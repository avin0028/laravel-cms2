@extends('layouts.dashboard')

@section('title', 'Manage Posts')

@section('content')
    <h1>Posts</h1>
    <div class="table-responsive">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">URL</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                @can('view',$post)
                    
                
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td><a href="{{route('showpost',$post->url)}}" class="text-info" target="_blank">{{ $post->url }}</a></td>
                        <td>
                            {{-- {{ route('posts.edit', $post->id) }} --}}
                            <a href="{{route('postedit',$post->id)}}" class="btn btn-sm btn-primary">
                                Edit
                            </a>
                       
                            <form action=" {{ route('deletepost', $post->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" 
                                    onclick="return confirm('Are you sure you want to delete this post?');">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endcan
                @endforeach
            </tbody>
        </table>
    </div>


@endsection