<!doctype html>
<html>
    <head>
        
        <title>Cart</title>
        <script src="/js/jquery-2.2.2.min.js" type="text/javascript"></script>
        
        <script src="/js/shoppingcart.js" type='text/javascript'></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        
    </head>
    <body>
        <nav>
            @include('shoppingcart/dashboard')
        </nav>
        <?php $id=null;?>
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>Product Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>quantity</th>
                    <th></th>
                    <th></th>
                    <th>Price</th>
                    <th></th>
                    <th></th>
                    
                </tr>
                <?php $total=0;?>
                @foreach($product as $values)
                <tr>
                @foreach($values as $value=>$key)
                <td>{{$key}}</td>
                @if($value=="Id")
                <?php $id=$key;?>
                @endif
                @if($value=="quantity")
                <?php $price=$key;?>
                <th><a href="{{ URL::route('incrementproduct',['id'=>$id])}}">[+]</a></th>
                <th><a href="{{ URL::route('decrementproduct',['id'=>$id])}}">[-]</a>
                </th>
                @endif
                @if($value=="Price")
                <?php $price=$price*$key;?>
                @endif
                @endforeach
                <td><?php $total=$total+$price;  echo $price;?></td>
                <td><a href="{{ URL::route('deleteproduct',['id'=>$id])}}">DELETE</a></td>
                </tr>
                @endforeach
                <tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th><?php if(isset($total)){echo $total;}?></th></tr>
            </table>
                </div>
            </div>
          <div class=" col-md-5 col-md-offset-5">
            <form method="post" action="{{ URL::route('payment')}}">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="price" value="<?php echo $total;?>">
                <input type="submit" class="btn btn-success" value="MakePayment">
            </form>
            </div>
        </div>
    </body>
</html>
