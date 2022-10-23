<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderCart;
class CheckoutController extends Controller{
    public function getCheckout(){
        return view('order.checkout');
    }
    public function postCheckout(Request $r){
        // Validate the requests
        $r->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'address' => 'required'
        ]);
        // Calculate order amount
        $OrderData = $r->all();
        $OrderData['tracking_number'] = 'UVM-'.rand(1,9999);
        $OrderData['user_id'] = (auth()->check()) ? auth()->user()->id : null;
        $OrderData['total'] = getCartTotal();
        $OrderData['exchange_rate'] = getExchangeRate();
        $TheOrder = Order::create($OrderData);
        // Clear user cart and populate the cart product table
        foreach(userCart(getUserId()) as $CartItem){
            // Update each item status to 'completed'
            $CartItem->update(['status' => 'completed']);
            // Create a new record in OrderCart
            OrderCart::create([
                'cart_id' => $CartItem->id,
                'order_id' => $TheOrder->id,
                'user_id' => $CartItem->user_id,
                'product_id' => $CartItem->product_id
            ]);
        }
        // TODO: Send an email
        // Redirect back to homepage
        return redirect()->route('home')->withSuccess('Order has been created! we will call you soon');
    }
}
