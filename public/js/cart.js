let Toast
$(document).ready(function() { 
   Toast =Swal.mixin({
toast: true, 
position: 'bottom-end', 
iconColor: 'white', 
customClass: {
    popup: 'colored-toast'
},
showConfirmButton: false,
timer: false
});
});
function addToCart(id) {
    console.log(id);
    let token =document.getElementById('accessToken').value; 
    let quantity =document.getElementById('qty'+id).value;
    console.log(quantity);
let data {
 qty: quantity,
}
if (id&&token && quantity) {
   $.ajax({
         type: "GET",
         headers: {"Authorization": 'Bearer ${token)'}, 
         url: "/api/add-to-cart/"+id,
         success: function (response) {
              console.log(response);
              Toast.fire({
                  icon: 'success',
                  title: '<i class="fa fa-shopping-cart me-3"></i> Added to cart'
              });
            document.getElementById('cart-badge').innerHTML = response.item_count;
            },
    error: function (error) {
        console.log(error.responseJSON.message);
Toast.fire({
icon: 'error',
title: error.responseJSON.message
});
}
})
}
}
function incrementDecremental(id, btn)
{
         let qty =document.getElementById("qty"+id).value; 
         console.log(id); 
                console.log(btn);
         if(btn=== 'minus' & qty>1)
        {
            qty--;
         }
         else if(btn ==='plus')
        {
            qty++;
         }
    document.getElementById("qty"+id).value=qty;
        }
function cartItemQtyUpdate(id, btn)
{
    let qty = document.getElementById("qty"+id).value; 
    let token = document.getElementById("accessToken").value; 
    console.log(id);
    console.log(btn); 
    console.log(qty);
    let data={

        btn: btn,
    }
        console.log(data); 
        console.log(token);
      if (id && token && qty) {
       $.ajax({
           type: "PUT",
           headers: {"Authorization":'Bearer ${token)'}, 
           url: "/api/cart-items/quantity/update/"+id, 
           data: data,
           success: function (response){
               document.getElementById("qty"+id).value-response;
                         Swal.fire( 'Success', 'Quantity Updated Successfully', 'success');
                         console.log(response);
               Toast.fire({
                                    icon: 'success',
                                    title:'<i class="fas fa-shopping-cart ne-3">Quantity updated</i>'
                   document.getElementById("cart_badge").innerHTML=response.item_count;
            console.log(response)
        }),
         error: function(error){ 
            console.log(error);
         }
        })
    }
}
