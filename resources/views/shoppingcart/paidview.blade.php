<!doctype html>
<html>
    <head>
        
        <title>Cart</title>
        
        <script src="/js/jquery-2.2.2.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <style>
            p{
                font-size: 1.5em;
            }
            h1 {
                color: green;
            }
            #top{
                margin-top: 50px;
            }
        </style>
    </head>
    <body>
        <nav>
            @include('shoppingcart/dashboard')
        </nav>
        <div class="container">
          <div class=" col-md-6 col-md-offset-2">
              <h1><u>Payment</u> <u>Successfully</u> <u>done</u> </h1>
              <p id="top">Name:{{$name}}</p>
            <p>Account:{{$account}}</p>
            <p>Total Payment:{{$price}}</p>
            </div>
            
            <div class="col-md-6 col-md-offset-2 alert alert-success">
                Your Product will be delivered to you shortly 
            </div>
        </div>
    </body>
</html>
