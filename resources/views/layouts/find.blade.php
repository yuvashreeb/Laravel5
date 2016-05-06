<!DCOTYPE html>
<html>
    <head>
        <title>Find And Replace</title>
    </head>
    <body>
        <form method="POST" action="{{URL::route('findreplace')}}">
            Words To Find:<input type="text" name="find" placeholder="Words to find">
            Replacement Text:<input type="text" name="replace" placeholder="Replacement text here">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <p>Text Here!<br><textarea name="text" rows="8" cols="40">{{(empty($text) === false) ? $text : ''}}</textarea></p>
            <input type="submit">
        </form>
    </body>
</html>



