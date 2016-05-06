<!doctype html>
<html>
    <head>
        <title>View Image</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <link href="/css/lightbox.css" rel="stylesheet">
        <link href="/css/custom.css" rel="stylesheet">
        <script src="/js/jquery-1.10.2.min.js"></script>
        <script src="/js/lightbox-2.6.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


    </head>
    <body>
        <nav>
            @include('imageUpload/userdashboard')
        </nav>
        <div class="container">   
            <div class="bottom">
            @if($images)
            @foreach($images as $value=>$key)
            <div class="col-md-2 ">
            <a href="/{{$key}}" data-lightbox='nondatabasealbum'><img src="/{{$key}}" height="170" width="160"></a><br>
            <?php $path=explode("/",$key);
            $path1=  implode(",",$path);?>
            <a href="{{ URL::route('imagedelete',['name'=>$path1])}}">[X]</a>
            </div>
            @endforeach

            @endif
        </div>
        </div>
    </body>
</html>

