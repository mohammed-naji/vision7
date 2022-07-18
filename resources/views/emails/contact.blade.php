<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="background: #eee;font-family: Arial, Helvetica, sans-serif">

    <div style="background: #fff;width:600px;padding:30px;border: 1px solid #bbb;margin: 30px auto">

        <h3>Dear Admin,</h3>
        <p>Hope this email find you will</p>
        <br>
        <p>There is new cntact us data as bellow:</p>
        <p><b>Name:</b> {{ $info['name'] }}</p>
        <p><b>Email:</b> {{ $info['email'] }}</p>
        <p><b>Message:</b> {{ $info['message'] }}</p>
        <br>
        <br>
        <p>Best Regards</p>

    </div>

</body>
</html>
