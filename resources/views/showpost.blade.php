<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            margin-top: 30px;
        }
        .badge {
            font-size: 1rem;
        }
        .comment-box, .reply-box {
            background-color: #1e1e1e;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .comment-box {
            color: #e0e0e0; 
        }
        .reply-box {
            margin-left: 30px;
            background-color: #2a2a2a;
            padding: 10px;
            border-radius: 5px;
            color: #e0e0e0; 
        }
        .comment-form {
            margin-top: 30px;
        }
        textarea {
            resize: none;
            color: #ffffff; 
            background-color: #333; 
        }
        .form-control {
            color: #ffffff; 
            background-color: #333; 
            border: 1px solid #555; 
        }
        .form-control::placeholder {
            color: #aaaaaa; 
        }

        
        .comment-box .text-muted, .reply-box .text-muted {
            color: #b0b0b0 !important; 
        }
    </style>
</head>
<body>
    <div class="container">
        
        <div class="mb-4">
            <h1 class="text-light border-bottom pb-2">{{ $post->title }}</h1>
        </div>

        
        <div class="mb-4">
            <p class="text-light">{{ $post->content }}</p>
        </div>

        
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

        
        <div class="mb-4 w-50">
            <h3 class="text-light">Comments</h3>

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
            
            @foreach($comments as $comment)
                <div class="comment-box">
                    
                    <strong>{{ $comment->user->name }}</strong> 
                    <span class="text-muted">{{ $comment->created_at->diffForHumans() }}</span>
                    <p>{{ $comment->content }}</p>

                    
                    @foreach($comment->replies as $reply)
                        <div class="reply-box">
                            
                            <strong>{{ $reply->user->name }}</strong> 
                            <span class="text-muted">{{ $reply->created_at->diffForHumans() }}</span>
                            <p>{{ $reply->content }}</p>
                        </div>
                    @endforeach

                    @auth
                    <form action="{{ route('comments.store') }}" method="POST" class="mt-2">
                        @csrf
                        
                        <div class="input-group">
                            <input type="text" name="content" class="form-control" placeholder="Reply to this comment..." required>
                            
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            
                            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                            
                            <button class="btn btn-secondary" type="submit">Reply</button>
                        </div>
                    </form>
                    @endauth
                </div>
            @endforeach

            @auth
                
            <div class="comment-form">
                <h4 class="text-light">Add a Comment</h4>
                <form action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <textarea name="content" class="form-control" rows="3" placeholder="Write a comment..." required></textarea>
                    </div>
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input type="hidden" name="parent_id" value="">
                    <button type="submit" class="btn btn-primary">Submit Comment</button>
                </form>
            @endauth

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
