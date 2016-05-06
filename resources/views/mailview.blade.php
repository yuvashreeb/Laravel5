<!doctype html>
<html>
    <head>
        <title>Mailing List</title>
        <link href="/css/guest.css" rel="stylesheet">
        <script src="/js/jquery.js"></script>
        <style>
            #message{
                color:green;
            }
        </style>
    </head>
    <body>
        <?php $increment = 0; ?>
        <div class="container">
            <div class="content">
                <form action="{{URL::route('mailinglist/maillistsubmit')}}" method="post">
                    @if(isset($message))
                    <div class="col-md-6 col-md-offset-3 alert alert-info" id="message">
                        {{$message}}
                    </div>
                    @endif
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                    <div class="col-md-5 col-md-offset-3 top box">
                        <h2 class="header">Mailing List</h2>
                        @if(isset($mail))
                        @foreach($mail as $value)
                        @foreach($value as $values=>$key)
                        @if($values=="name")
                        <div>
                            <label>{{$key}}
                                @endif
                                @if($values=="email")
                                ({{$key}})<input type="checkbox" value="{{$key}}" name="mail_<?php echo $increment++; ?>"></label>
                        </div>
                        @endif
                        @endforeach
                        @endforeach
                        @endif
                        <p/>Message:<br><textarea class="form-control top" name="message" rows="5"></textarea>
                        <input type="hidden" name="count" value="<?php echo $increment; ?>">
                        <div class="form-group col-md-offset-5 top">
                            <input type="submit" class="btn btn-default">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>