<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relations</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="container my-5">
        <div class="text-center">
            <h1>{{ $post->title }}</h1>
            <img class="my-4" src="{{ $post->image }}" alt="">
            <p>{{ $post->body }}</p>
        </div>

        <hr>

        <h3 class="mb-4">Comments ({{ $post->comments->count() }})</h3>
        @forelse ($post->comments()->orderByDesc('id')->get()->load('user') as $comment)
        <div >
            <h5>{{ $comment->user->name }}</h5>
            <p>{{ $comment->comment }}</p>
            <hr>
        </div>
        @empty
        <div >
            <p>There is no comment yet, be the first one</p>
            <hr>
        </div>
        @endforelse


        <form action="{{ route('one_to_many_data') }}" method="post">
            @csrf
            <input type="hidden" name="post_id" value="{{ $id }}">
            <textarea rows="5" class="form-control mb-3" name="comment" placeholder="Type your comment here .."></textarea>
            <button class="btn btn-dark">Post comment</button>
        </form>
    </div>

</body>
</html>
