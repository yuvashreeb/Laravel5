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
                    <button type="button" class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse">
                        <span class="sr-only"> Toggle</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav ">
                        <li ><a href="{{ URL::route('homeimage')}}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                        <li ><a href="{{ URL::route('register')}}"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                    </ul>
                    <form class="navbar-form navbar-right loginform" action="{{ URL::route('loginUser')}}" method="post">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="form-group ">
                            <input type="email" placeholder="User Email Address" name="userEmail" class="form-control left" required>

                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="User Password" name="userPassword" class="form-control left" required>

                        </div>
                        <div class="form-group"><input type="submit" class="btn btn-success left" name="loginSubmit" value="LogIn"></div>

                    </form>
                </div>
            </div>
        </nav>
    </body>
</html>