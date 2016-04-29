<html>
    <head>
        <title>Spell checker</title>
        <link href="css/guest.css" rel="stylesheet"/>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <form action="{{URL::route('check')}}" method="post">
                    @if(isset($Words))
                    @foreach($Words as $word)
                    <li>
                    {{$word}}
                    </li>
                    @endforeach
                    @endif
                    <h3>Check single word spelling</h3>
                    Enter Word:<br><input type="text" name="word"/><p />
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <input type="submit" value="check"/>
                </form>
            </div>
        </div>
    </body>
</html>