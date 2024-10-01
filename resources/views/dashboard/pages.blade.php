@extends('layouts.dashboard')

@section('title', 'Manage Pages')

@section('content')

    <h1>Pages</h1>
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
                @foreach($pages as $page)
                @can('view',$page)
                    
                
                    <tr>
                        <td>{{ $page->title }}</td>
                        <td><a href="" class="text-info" target="_blank">{{ $page->url }}</a></td>
                        <td>
                            <a href="{{route('postedit',$page->id)}}" class="btn btn-sm btn-primary">
                                Edit
                            </a>
                       
                            <form action=" {{ route('deletepage', $page->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" 
                                    onclick="return confirm('Are you sure you want to delete this page?');">
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