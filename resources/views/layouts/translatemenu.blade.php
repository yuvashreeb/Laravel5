<!DOCTYPE HTML>
<html>
    <head>
        <title>Translate Pages</title>
    </head>
    <body>
        <ul>
            <li><a href="{{URL::route('english')}}">English</a></li>
            <li><a href="{{URL::route('telugu')}}">Telugu</a></li>
        </ul>
        <ul>
            <li><a href="{{URL::route('index')}}">Home</a></li>

        </ul>
        @if(isset($value))
        {{$value}}
        @endif
    </body>
</html>