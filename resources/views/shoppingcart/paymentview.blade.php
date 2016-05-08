<!doctype html>
<html>
    <head>
        
        <title>Cart</title>
        <link href="/css/guest.css" rel="stylesheet">
        <script src="/js/jquery-2.2.2.min.js" type="text/javascript"></script>
        
        <script src="/js/shoppingcart.js" type='text/javascript'></script>

        
    </head>
    <body>
        <nav>
            @include('shoppingcart/dashboard')
        </nav>
        
          <div class=" col-md-6 col-md-offset-2 top">
              <h1 class="top col-md-offset-3"> <u>Account</u> <u>Details</u></h1>
            <form method="post" action="{{ URL::route('paid')}}">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="col-sm-12 top">
                        <input type="text" placeholder="Enter Name" name="name" class="form-control " required>
                    </div>
                <div class="col-sm-12 top">
                        <input type="text" placeholder="Enter Account Number" name="number" class="form-control " required>
                    </div>
                <div class="col-sm-12 top">
                        <input type="password" placeholder="Enter Password" name="password" class="form-control " required>
                    </div>
                 <div class="col-sm-12 top">
                     <h2><u>Total</u> <u>Payment</u>: {{$price}}</h2>
                 </div>
                <div class="col-sm-2 col-sm-offset-3 top">
                <input type="submit" class="btn btn-success" value="MakePayment">
                </div>
            </form>
            </div>
        </div>
    </body>
</html>
