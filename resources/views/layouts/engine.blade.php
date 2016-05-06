<!DOCTYPE Html>
<html>
    <head>
        <title>Search Engine</title>
    </head>
    <body>
        <h2>Search</h2>
        <form action="{{URL::route('searchenginepost')}}" method="post">
            @if(isset($Error))
            @foreach($Error as $fault)
            {{$fault}}
            @endforeach
            @endif
            <p>
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                Search Term:<input type="text" name='keywords'/>
                <input type="submit" value="search"/>
            </p>
        </form>
    </body>
</html>