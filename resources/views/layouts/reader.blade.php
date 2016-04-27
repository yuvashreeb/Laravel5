<!DOCTYPE html>
<html>
    <head>
        <title>Atom Feeds</title>
    </head>
    <body>
       @if(isset($Url)&& $Feed)
       <?php
       for($y=0;$y<count($Feed);$y++)
       echo '<li><a href="', $Url[$y], '">', $Feed[$y], '</a></li>';?>
       @endif
    </body>
</html>