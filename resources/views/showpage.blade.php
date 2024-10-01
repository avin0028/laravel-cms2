<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $page->title }}</title>
    
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
            <h1 class="text-light border-bottom pb-2">{{ $page->title }}</h1>
        </div>

        
        <div class="mb-4">
            <p class="text-light">{{ $page->content }}</p>
        </div>

    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
