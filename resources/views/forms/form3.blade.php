<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form 3</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-5">
        <h1>Add New Post</h1>

        {{-- @dump($errors->any())
        @dump($errors->all()) --}}

        @include('forms.errors')

        <form action="{{ route('form3_date') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" placeholder="Title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" />
                @error('title')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Body</label>
                <textarea id="mytextarea" maxlength="100" name="body" placeholder="Body" rows="5" class="form-control @error('body') is-invalid @enderror">{{ old('body') }}</textarea>
                <span id="count">0</span> / 100
                @error('body')
                    {{-- <small class="text-danger">{{ $message }}</small> --}}
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-warning w-100">Add</button>
        </form>
    </div>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $('#mytextarea').keyup(function() {
            var count = $('#mytextarea').val().length;
            if(count == 100) {
                $('#count').css('color', 'red')
            }else {
                $('#count').css('color', 'black')
            }
            $('#count').text(count)
        })
    </script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.1.0/tinymce.min.js" integrity="sha512-dr3qAVHfaeyZQPiuN6yce1YuH7YGjtUXRFpYK8OfQgky36SUfTfN3+SFGoq5hv4hRXoXxAspdHw4ITsSG+Ud/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        tinymce.init({
          selector: '#mytextarea',
          plugins: [
          'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
          'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
          'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount','code'],
          toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
          'alignleft aligncenter alignright alignjustify | ' +
          'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
        })
    </script>
</body>
</html>
