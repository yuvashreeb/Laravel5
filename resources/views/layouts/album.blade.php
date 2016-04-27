<!DOC TYPE=html>
<head>
    <title>
        PHOTO ALBUM
    </title>
    <script type="text/javascript" src="js/jquery-2.2.2.min.js"></script>
    <script type="text/javascript" src="js/lightbox-2.6.min.js"></script>
    <link href="css/lightbox.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <table align="center" width="600" border="1" cellpadding="10" bgcolor="EFEFEF">
        <tr>
            <td>
                @if(isset($Photoalbum_folder))
                <b>{{$Choice}}</b><br/>
                @foreach($Photoalbum_folder as $Folder)
                <a href="{{URL::route('folder',["folder"=>$Folder])}}">{{$Folder}}</a> <br/>
                @endforeach
                @endif
                @if(isset($Photoalbum_image))
                @foreach($Photoalbum_image as $Folder)
                <a href="{{$Folder}}" data-lightbox='nondatabasealbum'><img src="{{$Folder}}" width="100" height="100"/></a>
                @endforeach
                <br><a href='{{URL::route('photoalbum')}}' >Back to album </a>
                @endif
                
            </td>
        </tr>
    </table>

</body>
</html>