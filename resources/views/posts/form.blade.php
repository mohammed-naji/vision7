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
