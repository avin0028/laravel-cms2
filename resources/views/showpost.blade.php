<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - Show Post</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
        }
        .container {
            margin-top: 30px;
        }
        .badge {
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Post Title -->
        <div class="mb-4">
            <h1 class="text-light border-bottom pb-2">{{ $post->title }}</h1>
        </div>

        <!-- Post Content -->
        <div class="mb-4">
            <p class="text-light">{{ $post->content }}</p>
        </div>

        <!-- Post Tags -->
        <div class="mb-4">
            @php
            
            $tags = explode(',', $post->tags);
        @endphp
            <ul class="list-inline">
                @foreach($tags as $tag)
                    <li class="list-inline-item">
                        <span class="badge bg-secondary">{{ $tag }}</span>
                    </li>
                @endforeach
            </ul>
        </div>

 
    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
