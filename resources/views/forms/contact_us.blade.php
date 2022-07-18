<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-5">
        <h1 class="text-center">Contact Us</h1>
        <div class="row justify-content-center">
            <div class="col-md-6 mb-5">
                @include('forms.errors')
                <form action="{{ route('contact_us_data') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}" />
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image" accept=".png,.jpeg,.jpg" class="form-control" />
                    </div>

                    <div class="mb-3">
                        <label>Message</label>
                        <textarea name="message" placeholder="Message" class="form-control" rows="5">{{ old('message') }}</textarea>
                    </div>
                    <button class="btn btn-primary w-25">Send</button>
                </form>
            </div>

            <div class="col-md-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3401.22501681601!2d34.44237301499595!3d31.517979231370386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14fd7f15b3028f35%3A0x105e0bdde215c6f0!2sAl%20Shuhada&#39;!5e0!3m2!1sen!2s!4v1658147615599!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

</body>
</html>
