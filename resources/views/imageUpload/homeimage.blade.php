<!doctype html>
<html>
    <head>
        <title>Register</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <style>
            #cloud{
                font-size: 2em;

            }
            .text{
                padding-top: 80px;
            }
        </style>
    </head>
    <body>
        <nav >
            @include('imageUpload.dashboard')
        </nav>
        <div class="container">
            <div class="col-md-5 col-md-offset-4">

                @if(isset($errorLogin))
                <div class="alert alert-danger">
                    {{$errorLogin}}
                </div>
                @endif
            </div>
            <div class="text">
                <div class="col-md-6">
                    <img src="{{URL::asset('cloud.jpg')}}">
                </div>
                <div class="col-md-6 text">         
                    <h1>
                        Upload Unlimited images on this cloud. Register for free Hurry! Limited period offer
                    </h1>               
                </div>      
            </div>
        </div>
    </body>
</html>