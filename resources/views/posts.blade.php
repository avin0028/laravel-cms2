<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
        }
        .post-title {
            color: #007bff;
            text-decoration: none;
        }
        .post-title:hover {
            text-decoration: underline;
        }
        .pagination .page-link {
            background-color: #343a40;
            color: #ffffff;
        }
        .pagination .page-link:hover {
            background-color: #007bff;
            color: #ffffff;
        }
        .pagination .active .page-link {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <h1 class="mb-4"> Posts</h1>

        @if ($posts->count())
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ url('/posts/' . $post->url) }}" class="post-title">{{ $post->title }}</a>
                                </h5>
                                <p class="card-text">
                                    {{ \Illuminate\Support\Str::limit($post->content, 150, '...') }}
                                </p>
                                <a href="{{ url('/posts/' . $post->url) }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

      
            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        @else
            <p>No posts available at the moment.</p>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
