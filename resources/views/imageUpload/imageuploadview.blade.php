<!doctype html>
<html>
    <head>
        <title>UserCreateAlbum</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <script src="/js/jquery.js" type="text/javascript"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="/js/customjs.js"></script>
    </head>
    <body>
        <nav>
            @include('imageUpload/userdashboard')
        </nav>

        <div class="container ">
            <div class="col-md-12">
                <div class="col-md-6 col-md-offset-4">
                    <h2 ><u>Upload Image</u></h2></div>
                <form class="form-horizontal" action="{{ URL::route('imageuploadsubmit')}}" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group text">
                        <div class="col-sm-4 col-md-offset-3">
                            <input type="file" id="imageupload" name="imageupload" class="form-control " required>
                            <p id="imageerror"></p>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 col-md-offset-3">
                            <select class="form-control" name="albumname" required>
                                
                                @if($Album)
                                @foreach($Album as $Values)
                                @foreach($Values as $value=>$key)
                                <option value="{{$key}}">{{$key}}</option>
                                @endforeach
                                @endforeach
                                @else
                                <option disabled>You don't have any albums</option>
                                    @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class=" col-sm-offset-4 col-sm-5">
                            <input type="submit"  class="btn btn-success left" name="submitSignUp" value='UPLOAD'>

                        </div>
                    </div>

                </form>
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
        </div>
    </body>
</html>
