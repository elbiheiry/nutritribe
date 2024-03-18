<!doctype html>
<html lang="en">
<head>
    <title>New Appointment</title>
</head>
<body>
    <div class="content">
        <b>Dear :</b> {{$data['name']}}

        <p>{{$template->description1}} ({{$data['available_date']}}) at ({{$data['start']}})</p>
        <p>One time session : {{$data['one_time']}}</p>
        @foreach(explode("\n" , $template->description2) as $item)
            <p>{{$item}}</p>
        @endforeach
        <p><img src="https://nutritribego.com/public/site/images/logo.png"></p>
    </div>
</body>
</html>