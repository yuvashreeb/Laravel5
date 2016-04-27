<!DOCTYPE html>
<html>
    <head>
        <title>Auto suggest field</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="stylesheet" type="text/css" href="/css/style.css">
        <script type="text/javascript" src="/js/jquery-2.2.2.min.js"></script>
        <script type="text/javascript" src="/js/jquery.js"></script>
    </head>
    <body>
        <h3>  Input Field For Auto Suggestion:</h3>
       
            <input type="text" class="autosuggest" name="textfield">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <input type="submit" value="Search">
            <div class="dropdown">
                <ul class="result">
                </ul>
            </div>
        
    </body>
</html>
