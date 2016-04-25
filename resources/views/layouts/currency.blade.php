<html>
    <head>
        <title>
            CURRENCY CONVERTER
        </title>
    </head>
    <body>
        <h3>Currency Converter</h3>
        <form action="{{URL::route('currencyconvertor')}}" method="post">
            Amount:
            <input type="text" name="amount"/><p />
            From:
            <input type="text" name="from"/><p />
            To:
            <input type="text" name="to"/><p />
            <input type='hidden'name='_token' value="{{csrf_token()}}"/>
            <input type="submit" name="convert"/>
        </form>  
    </body>
</html>
{{$converted_value}}
