<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){
        
        $oldCartItems = Cart::where('user_id',Auth::id())->get();
        foreach($oldCartItems as $item)
        {
            if(!Product::where('id',$item->prod_id)->where('qty','>=',intval($item->prod_qty))->exists())
            {
            $removeItem = Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
            $removeItem->delete();
            }
        }
        
        $cartItems=Cart::where('user_id',Auth::id())->get();
        $cantidadItems = Cart::where('user_id',Auth::id())->count();
        return view('frontend.checkout',compact('cartItems','cantidadItems'));
    }

    public function placeorder(Request $request){
        
        $total = 0;
        $cartItems_total = Cart::where('user_id',Auth::id())->get();
        
        foreach($cartItems_total as $prod)
        {
            $total += $prod->Products->selling_price;
        }
        
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->pincode = $request->input('pincode');
        $order->status = '0';
        $order->message = '';
        $order->tracking_no = 'maferpa'.rand(1111,9999);
        $order->total_price = $total;
        $order->save();

        $cartItems=Cart::where('user_id',Auth::id())->get();
        foreach($cartItems as $item)
        {
            OrderItem::create([
                'order_id'=>$order->id,
                'prod_id'=>$item->prod_id,
                'qty'=>$item->prod_qty,
                'price'=>$item->Products->selling_price,
            ]);

            $prod = Product::where('id',$item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();
        }
        
        if (Auth::user()->address1==NULL)
        {
            $user = User::where('id',Auth::id())->first();
            $user->name = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->pincode = $request->input('pincode');
            $user->update();
        }
        
        $cartItems = Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartItems);

        return redirect('/home')->with('status',"Order placed successfully");

    }

}
