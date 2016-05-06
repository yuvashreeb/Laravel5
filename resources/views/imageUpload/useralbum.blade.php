<!doctype html>
<html>
    <head>
        <title>UserAlbums</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/custom.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    </head>
    <body>
        <nav>
            @include('imageUpload/userdashboard')
        </nav>
        <div class="container ">

            @if($Album)
            @foreach($Album as $Values)
            @foreach($Values as $value=>$key)
            @if($value=='Name')
            <div class="col-md-4 bottom">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2><a href="{{ URL::route('viewalbum',['name'=>$key])}}">{{$key}}</a></h2></div>
                    <div class="panel-body borderbottom"><div class="row "><div class="col-md-4 col-md-offset-2"><a href="{{ URL::route('editalbum',['name'=>$key])}}">EDIT</a></div>
                            <div class="col-md-6"><a href="{{ URL::route('deletealbum',['name'=>$key])}}">DELETE</a></div></div></div>
                    @else
                    <div class="panel-body"><h4><b>Description:</b></h4><p>{{$key}}</p></div>
                </div>
            </div>
            @endif
            @endforeach
            @endforeach
            @else

            <h1>You don't have any albums created</h1>
            @endif

        </div>

    </body>
</html>