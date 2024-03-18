<!doctype html>
<html lang="en">
<head>
    <title>New Order</title>
</head>
<body>
    <div class="content">
        <b>Dear :</b> {{$name}}

        <p>{{$template->description3}} </p>

        @foreach(json_decode($items) as $item)
            <p> Package name : <b>{{$item->name}}</b> and price is : <b>{{$item->price}} USD</b> , you ordered <b>{{$item->quantity}}</b> of this package</p>
        @endforeach
        @foreach(explode("\n" , $template->description4) as $item)
            <p>{{$item}}</p>
        @endforeach
        <p>Please click on this link to complete your data :</p>
        <a href="{{route('site.booking.mail' , ['id' => $id])}}" target="_blank">Click here</a>

        @foreach(explode("\n" , $template->description5) as $item)
            <p>{{$item}}</p>
        @endforeach
        <p><img src="https://nutritribego.com/public/site/images/logo.png"></p>
    </div>
</body>
</html>