<!doctype html>
<html>
    <head>
        <title>UserCreateAlbum</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        
    </head>
    <body>
        <nav>
        @include('imageUpload/userdashboard')
        </nav>
        
        <div class="container ">
            <div class="col-md-12">
                <div class="col-md-6 col-md-offset-4">
                    <h2 ><u>Edit Album Name</u></h2></div>
                    <form class="form-horizontal" action="{{ URL::route('editalbumname')}}" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="form-group text">
                    <div class="col-sm-4 col-md-offset-3">
                        <input type="text" id="albumName" value="{{$albumname}}" placeholder="Enter Album Name" name="albumName" class="form-control " required>
                    </div>
                    
                </div>
                <div class="form-group">
                    <div class="col-sm-4 col-md-offset-3">
                        <input type="text" id="albumDesc" placeholder="Enter Album Description" name="albumDesc" class="form-control " required>
                    </div>
                    <input type="hidden" name="previousname" value="{{$albumname}}">
                </div>
                <div class="form-group ">
                    <div class=" col-sm-offset-4 col-sm-5">
                        <input type="submit"  class="btn btn-success left" name="submitSignUp" value='CREATE'>
                        
                    </div>
                </div>

            </form>
            </div>
        </div>
    </body>
</html>
