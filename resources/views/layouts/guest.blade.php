<html>
    <head>
        <title>
            Guest Book
        </title>
        <link href="css/guest.css" rel="stylesheet"/>

    </head>
    <body>
        <div class="container">
            <div class="content">
                <form action="{{URL::route('upload')}}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div>
                        @if(isset($Guest_error))
                        @foreach($Guest_error as $error)
                        {{$error}}<br/>
                        @endforeach
                        @endif
                        @if(isset($Guest_user))
                        @foreach($Guest_user as $attribute)
                        @foreach($attribute as $x=>$value)

                        {{$value}}<br/>
                        @endforeach
                        @endforeach
                        @endif
                    </div>

                    <br/>
                    <strong>
                        Post Here!
                    </strong><br/>
                    Name: <input type="text" name="name" ><br/>
                    <br/>
                    Email: <input type="email" name="email"><br/><br/>
                    Message:  <textarea name="message" cols="30" rows="5"></textarea><br/>
                    <input type="submit" value="POST">
                </form>
            </div></div>
    </body>
</html>