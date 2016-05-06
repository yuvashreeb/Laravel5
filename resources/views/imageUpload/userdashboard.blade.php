<!doctype html>
<html>
    <head>
        
        <title>Dashboard</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <style>
            #cloud{
                font-size: 2em;

            }
            li:hover{
                background-color: #DBDBDB;
            }

        </style>
    </head>
    <body>
        <nav class="navbar-inverse navbar-fixed">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" id="cloud"><span  class="glyphicon glyphicon-film"></span></a>
                    <ul class="nav navbar-nav">
                        <li><a><span class="glyphicon glyphicon-user"></span> @if(isset($Name)){{$Name}}@endif</a></li></ul>
                    <button type="button" class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse">
                        <span class="sr-only"> Toggle</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav pull-right">

                        <li ><a href="{{ URL::route('loginUser')}}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                        <li ><a href="{{ URL::route('albums')}}"><span class="glyphicon glyphicon-folder-close"></span> Album</a></li>
                        <li ><a href="{{ URL::route('createalbum')}}"><span class="glyphicon glyphicon-folder-open"></span> CreateAlbum</a></li>
                        <li ><a href="{{ URL::route('imageupload')}}"><span class="glyphicon glyphicon-cloud-upload"></span> ImageUpload</a></li>
                        <li ><a href="{{ URL::route('homeimage')}}"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </body>
</html>