<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-5">
        <h1 class="text-center">Form</h1>

        <form method="POST" action="{{ route('form1') }}">
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> --}}
            {{-- {{ csrf_field() }} --}}
            @csrf

            <label>Your Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter your name here.." />
            <div class="text-center">
                <button class="btn btn-success mt-2 px-5">Send</button>
            </div>
        </form>
    </div>

</body>
</html>
