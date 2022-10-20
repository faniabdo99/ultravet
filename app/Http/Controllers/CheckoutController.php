<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;
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
        Order::create($OrderData);
        // TODO: Send an email
        // Redirect back to homepage
        return redirect()->route('home')->withSuccess('Order has been created! we will call you soon');
    }
}
