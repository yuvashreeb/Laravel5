<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>
            Like Button
        </title>
        <link href="css/guest.css" rel="stylesheet"/>
        <link href="css/Likestyles.css" rel="stylesheet"/>
        <link href="css/urlStyles.css" rel="stylesheet"/>
        <script type="text/javascript" src="js/jquery-2.2.2.min.js" />  </script> 
    <script type="text/javascript" src="js/like.js" /> </script> 

</head>
<body>
    <div class="container">
        <div class="content">
            <form action="{{ URL::route('LikeButton') }}" method="post" >
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="view">
                    @if(isset($Result))
                    @foreach ($Result as $result_data)
                    <ul>
                        <li><p> {{$result_data['ArticleTitle']}}</p><p> <a href="#" class="like" onClick="like_add({{$result_data['ArticleId']}})">Like</a> <span id="article_{{$result_data['ArticleId']}}_likes">{{ $result_data['ArticleLike']}}</span> Like this</p></li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <span id="danger">
                </span>
            </form>

        </div>
    </div>
</body>
</html>

