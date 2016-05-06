<html>
    <head>
        <title>
            Cross Site Request Forgery  Protection
        </title>
        <link href='/css/styles.css' rel="stylesheet"/>
        <link rel="stylesheet" href="/css/search.css"/>
    </head>
    <body>
        <div class="container">
            <div class="content">
                @if(isset($message))
                {{$message}}
                @endif
                <form action="{{ URL::route('csrf') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="token" value="{{$value}}">
                    <strong>A product</strong><p/>
                    Quantity <input type="text" name='quantity'/><p/>
                    <input type="hidden" name="product" value="1"/>
                    <input type="submit" value="Order"/>

                </form>
            </div>
        </div>
    </body>
</html>
