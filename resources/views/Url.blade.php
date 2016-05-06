<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
            URL Shortening
        </title>
        <link href="css/guest.css" rel="stylesheet"/>
        <link href="css/urlStyles.css" rel="stylesheet"/>
        <script type="text/javascript" src="js/jquery-2.2.2.min.js" />  </script> 
    <script type="text/javascript" src="js/url.js" /> </script> 
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="heading">
                <h1>It's a simple. It's short. It's min.bz</h1>
                <p>Go ahead, enter a long URL and have to shortened</p>
            </div>
            <form>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <p><input type="text" name="url" id="url" size="60" />
                    <input type="button" value="Shorten" onclick="go()"></p>
                <div id="message"><p>&nbsp;</p></div>
                <div id="copyright">Brought to you by <a href="">Phpacademy</a></div>
            </form>
        </div>
    </div>
</body>
</html>