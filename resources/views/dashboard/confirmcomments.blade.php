@extends('layouts.dashboard')

@section('title', 'Confirm Comments')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4 text-white">Pending Comments</h1>

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-dark table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">User</th>
                        <th scope="col">Comment</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $comment)
                        <tr>
                            <td>{{ $comment->user->name }}</td>

                            <td class="text-truncate" style="max-width: 300px;">
                                @if (strlen($comment->content) > 100)
                                    <!-- Truncate long comment with ellipsis -->
                                    {{ Str::limit($comment->content, 100, '...') }}
                                    <!-- "Read More" Tooltip to show full comment -->
                                    <a href="#" class="text-info" data-bs-toggle="tooltip" title="{{ $comment->content }}">Read more</a>
                                @else
                                    {{ $comment->content }}
                                @endif
                            </td>

                            <td>
                                <!-- Confirm Button -->
                                <form action="{{ route('actioncomment', $comment) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    <input type="hidden" name="action" value="confirm"/>
                                    <button type="submit" class="btn btn-sm btn-success">
                                        Confirm
                                    </button>
                                </form>

                                <!-- Delete Button -->
                                <form action="{{ route('actioncomment', $comment) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    <input type="hidden" name="action" value="delete"/>
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Optional: Include Bootstrap JS for tooltip -->
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
@endsection
