<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
</head>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Edit Post : <span class="text-danger">{{ $post->title }}</span></h1>
            {{-- <a href="{{ route('posts.index') }}" class="btn btn-dark w-25">All Posts</a> --}}
            <a onclick="history.back()" class="btn btn-dark w-25">Return Back</a>
        </div>

        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Title" value="{{ old('title', $post->title) }}" />
                @error('title')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror

            </div>

            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" />
                @error('image')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
                <img width="80" src="{{ asset('uploads/'.$post->image) }}" alt="">
            </div>

            <div class="mb-3">
                <label>Body</label>
                <textarea name="body" id="mytextarea" class="form-control @error('body') is-invalid @enderror" placeholder="Body">{{ old('body', $post->body) }}</textarea>
                @error('body')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-success btn-lg w-25">Update</button>

        </form>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.0/tinymce.min.js"></script>
    <script>
        tinymce.init({
        selector: '#mytextarea',
        })
    </script>
</body>
</html>
