<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use App\Models\serviceorder;
use App\Models\serviceorderdetails;
use App\Models\addtocart;

class PayPalController extends Controller
{
    private $apiContext;

    public function __construct()
    {
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                config('paypal.client_id'),
                config('paypal.secret')
            )
        );
        $this->apiContext->setConfig(config('paypal.settings'));
    }

    public function success(Request $request)
    {
        $uid = session()->get('userlogin.u_id');
        $discount = 0;
        $coupon_id = null;
        if(session()->has('couponcode')){
            $discount = $request->discount;
            $coupon_id = session()->get('couponcode.id');
        }
        $order = serviceorder::create([
            'full_name' => $request->name,
            'u_id' => $uid,
            'email' => $request->email,
            'address' => $request->address,
            'additional_notes' => $request->notes,
            'phone_number' => $request->phone,
            'selected_date' => $request->date,
            'suburb' => $request->suburb,
            'postcode' => $request->postcode,
            'total_amount' => $request->amount,
            'payment_id' => $request->payment_id,
            'date' => date('d-m-Y h:i:sa'),
            'discount_amount' => $discount,
            'coupon_id' => $coupon_id,
            'order_status' => 0,
        ]);

        
        $cart = addtocart::join('services', 'services.s_id', 'add_to_cart.s_id')->where('u_id', $uid)->get();
        foreach ($cart as $value) {
            serviceorderdetails::create([
                's_o_id' => $order->s_o_id,
                's_id' => $value->s_id,
                'price' => $value->s_price,
            ]);
        }

        addtocart::where('u_id', $uid)->delete();
        session()->pull('couponcode');
        echo json_encode(array(
            'message' => 'Order Successfully Placed',
            'status' => 'success',
            'order_id'=> $order->s_o_id
        ));
    }

    public function cancel()
    {
        return redirect('/checkout')->with('errormessage', 'Payment cancelled');
    }
}
