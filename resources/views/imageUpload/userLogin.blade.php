<!doctype html>
<html>
    <head>
        <title>UserLogin</title>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    </head>
    <body>
        <nav>
        @include('imageUpload/userdashboard')
        </nav>
        <div class="container">
        <div class="col-md-8 col-md-offset-2">
                    @if(isset($message))
                    <div class="alert alert-success">
                        {{$message}}
                    </div>
                    @endif
                    @if(isset($error))
                    <div class="alert alert-danger">
                        {{$error}}
                    </div>
                    @endif
                </div>
        </div>
    </body>
</html>
