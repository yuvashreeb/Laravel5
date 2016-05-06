<!doctype html>
<html>
    <head>
        <title>Register</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/custom.css">
        <script src="/js/jquery.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="/js/formjs.js"></script>
    </head>
    <body>
        <nav >
            @include('imageUpload.dashboard');
        </nav>
        <div class="container">
            <div class="col-md-12">
                <div class="col-md-6 col-md-offset-4">
                    <h2 ><u>REGISTRATION</u>   <u>FORM</u></h2></div>
                <form class="form-horizontal" action="{{ URL::route('registersubmit')}}" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group text">
                        <label class="control-label col-sm-2 col-sm-offset-1" for="firstName">NAME:</label>
                        <div class="col-sm-6">
                            <input type="text" id="firstName" name="firstName" class="form-control " required>
                        </div>
                        <p id="firstnamepara"></p>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2 col-sm-offset-1" for="emailAddress">EMAILADDRESS:</label>
                        <div class="col-sm-6">
                            <input type="text" id="emailAddress" class="form-control " name="emailAddress" required>
                        </div>
                        <p id="emailpara"></p>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2 col-sm-offset-1" for="password">PASSWORD:</label>
                        <div class="col-sm-6">
                            <input type="password" maxlength="13" id="password" name="password" class="form-control " required>
                        </div>
                        <p id="passwordpara"></p>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2 col-sm-offset-1" for="confirmPassword">CONFIRM PASSWORD:</label>
                        <div class="col-sm-6">
                            <input type="password" maxlength="13" id="confirmPassword" name="confirmPassword" class="form-control "  required>
                        </div>
                        <p id="confirmpasswordpara"></p>
                    </div>

                    <div class="form-group ">
                        <div class=" col-sm-offset-3 col-sm-6">
                            <input type="submit"  class="btn btn-success left" name="submitSignUp" value="SUBMIT">
                            <input type="reset"  class="btn btn-success left" value="RESET">
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