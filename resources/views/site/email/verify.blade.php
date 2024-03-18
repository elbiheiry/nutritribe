<!doctype html>
<html lang="en">
<head>
    <title>Verify your email</title>
</head>
<body>
    <div class="content">
        <b>Dear :</b> {{$name}}

        <p>Thank you for registering in our website , Please click on this link to complete your registeration :</p>
        <a href="{{route('site.verify' , ['username' => $username])}}" target="_blank">Click here</a>
        <p>Best regards ,</p>
        Nutritribe
        <p><img src="https://nutritribego.com/public/site/images/logo.png"></p>
    </div>
</body>
</html>