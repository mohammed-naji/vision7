<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <style>
        .table th, .table td {
            vertical-align: middle
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>All Categories</h1>
            <a href="{{ route('categories.create') }}" class="btn btn-dark w-25">Add new category</a>
        </div>

        @if (session('msg'))
        <div class="alert alert-{{ session('type') }} alert-dismissible fade show">
            {{ session('msg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <form action="{{ route('categories.index') }}" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control w-50" placeholder="Search about anything.." aria-label="Search about anything.." value="{{ request()->search }}" name="search" aria-describedby="Search about anything..">
                <select name="count" class="form-select w-25">
                    <option {{ request()->count == 10 ? 'selected' : '' }} value="10">10</option>
                    <option {{ request()->count == 15 ? 'selected' : '' }} value="15">15</option>
                    <option {{ request()->count ? '' : 'selected' }} {{ request()->count == 20 ? 'selected' : '' }} value="20">20</option>
                    <option {{ request()->count == 25 ? 'selected' : '' }} value="25">25</option>
                    <option {{ request()->count == 'all' ? 'selected' : '' }} value="all">All</option>
                </select>
                <button class="btn btn-dark" id="button-addon2">Search</button>
              </div>
        </form>
        {{-- {{ $categories->count() }} --}}
        <div class="table-content">
            @include('categories.table')
        </div>
        {{-- <i class="fab fa-facebook"></i>
        <i class="fas fa-star"></i>
        <i class="far fa-star"></i> --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $('body').on('click', '.btn-del', function(event) {
                event.preventDefault();

                var url = $(this).parent().attr('action');
                var row = $(this).parents('tr');

                // console.log(url);

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            type: 'post',
                            data: {
                            _token: '{{ csrf_token() }}',
                            _method: 'delete'
                            },
                            success: function(res) {
                                $('.table-content').html(res);
                            },
                            error: function(err) {

                            }
                        })

                    }
                    })


            });
            // $('.btn-del').click(function() {

            // })
        </script>

        <script>
            @if (session('msg'))
            Swal.fire({
            title: 'Success',
            text: '{{ session("msg") }}',
            icon: 'success',
            confirmButtonText: 'Done'
            })
            @endif
        </script>

        <script>
            // setTimeout(() => {
            //     document.querySelector('.alert').remove();
            // }, 3000);

            // setTimeout(() => {
            //     console.log('Timeout');
            // }, 2000);

            // setInterval(() => {
            //     console.log('Interval');
            // }, 2000);
        </script>
    </div>
</body>
</html>
