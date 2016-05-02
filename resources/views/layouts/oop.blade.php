<!DOCTYPE html>
<html>
    <head>
        <title>OOP Concepts</title>

    </head>
    <body>
        @if(isset($output))
        {{$output}}
        @endif
        @if(isset($total))
        Total after performing addition and subtraction is: {{$total}}
        @endif
        @if(isset($price))
        The Book costs {{$price}}
        @endif
        @if(isset($Amount))
        {{$Amount}}
        @endif
        @if(isset($ISBN))
        {{$ISBN}}
        @endif
        @if(!empty($type && $costs))
        {{$type}} {{$costs}}
        @endif
        @if(isset($code))
        {{$code}}
        @endif

    </body>
</html>