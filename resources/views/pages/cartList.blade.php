@extends('layouts.app', ['key' => !empty($key)? $key : ''])
@section('content') 
                    <div class="bg-grey"> 
                                       <div class="container"> 
                                                          <div class="py-5">
               <h3>Cart Items</h3>
              </div>
         </div>
    </div>
    <div class="container"> 
       <div class="row py-5">
            <div class="col md-9">
                   
                   <table class="table table-bordered">
                         <thead>
                            <th>SN</th>
                            <th>Items</th> 
                                     <th>Qty</th> 
                                     <th>Action</th>
    </tr>
</thead>
<tbody>
    @if (!empty($cartItems) && count($cartItems) > 0) 
         @foreach ($cartItems as $item)
              <tr>
                  <td>1</td>
                  <td>{{$item->product->name}}</td>                        
                                     <td>12</td> 
                                     <td>
                                     <button class="btn btn-sm btn-danger" title="Delete item"><i class="fas fa-trash"></i></button>
                                     </td>
</tr>
         @endforeach
         @else
              <tr>
       <td colspan="4" class="text-center">
           <i>No cart items found</i>
         </td>
     </tr>
         @endif
         </tbody> 
</table> 
</div>
<div class="col-md-3">
<form action="{{route('checkout')}}" method="POST">
   @csrf
    <div>
    <label for="shipping-address">Shipping Address</label>
    <input id="shipping-address" type="text" name="shipping_address" class="form-control">
    </div>
    @if (count($cartItems) > 0)
    <input type="hidden" value="{{$cartItems[0]->cart_id}}" name="cart_id">
    @endif  
    <button type="submit" class="btn btn-primary w-100 mt-3" {{count($cartItems)<1 ? 'disabled' : ''}}>Checkout</button>
   </form> 
   </div>
       <!-- <div class="col-md-4">
           <a
          href="{{route('restaurant.detail', $vendor->id)}}">
            <div class="card restaurant-card">
            </div>
         </div> -->
</div>
         </div>
@endsection