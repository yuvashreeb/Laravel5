<html>
    <head>
        <title>WaterMark</title>
    </head>
    <body>
        <form action="{{URL::route('Secureupload')}}" method="post" enctype="multipart/form-data">
            <p>
                <input type="file" name="image"/>
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <input type="submit" value="upload"/>
            </p>
            <p>@if(isset($Secure_value))
                @foreach($Secure_value as $value)
                {{ $value}}
                @endforeach
                @endif</p>
        </form>
    </body>
</html>