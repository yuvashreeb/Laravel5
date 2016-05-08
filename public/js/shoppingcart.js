$(document).ready(function(){
    
    $('.checkout').hide();
    
    function checkcart(){
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 var value=null;

        $.ajax({
            url: 'checkcart',
            type: 'post',
            data: {value: value},
            success:function(data){
            
                if(data>0){
                
                $('.checkout').show();
            }
            }
        });
        
    }
    checkcart();
    
});

function add(value){
    
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            url: 'addtocart',
            type: 'post',
            data: {value: value},
            success:function(data){
                if(data=="Product already added to cart"){
                    
                    alert(data);
                }
                else{
                    
               alert("product added to the cart");
               $('.checkout').show();
           }
            }
        });
    
}




