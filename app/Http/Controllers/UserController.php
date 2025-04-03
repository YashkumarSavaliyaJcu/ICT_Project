<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\services;
use App\Models\addtocart;
use App\Models\users;
use App\Models\blogs;
use App\Models\inquiry;
use App\Models\coupons;
use App\Models\serviceorder;
use App\Models\teams;
use App\Models\testimonial;
use DB;
use Mail;
use Config;

class UserController extends Controller
{
    public function index($url = '', $val = 0, $cid = 0)
    {
        $service = services::where('s_url', $url)->first();
        if (isset($service)) {
            return $this->servicedetail($url);
        } else {
            return $this->home();
        }
    }
    public function login(Request $request)
    {
        $data = $request->input();
        if (count($data) > 0) {
            $user = users::where([['email', $data['email']], ['password', md5($data['password'])], ['u_type', 0]])->first();
            if (isset($user)) {
                session()->put('userlogin', $user);
                return redirect('/');
            } else {
                return redirect('/login')->with('errormessage','Invalid Email Or Password');
            }
        }
        return view('User.Login');
    }

    public function signup(Request $request)
    {
        $data = $request->input();
        
        if (count($data) > 0) {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required|min:8',
                'c_password' => 'required|same:password',
            ], [
                'name.required' => 'Please enter your name',
                'email.required' => 'Please enter your email address',
                'password.required' => 'Please enter password',
                'password.min' => 'Please enter 8 character in password',
                'c_password.required' => 'Please enter confirm password',
                'c_password.same' => 'Confirm password not match to password',
            ]);
           $userData=array(
                'name'=>$data['name'],
                'email'=>$data['email'],
                'password'=>md5($data['password']),
                'u_type'=>0,
                'created_at'=>date('d-m-Y h:i:sa')
            );
            $user = users::create($userData);
            if (!is_null($user)) {
                return redirect('/login')->with('successmessage','Success! Registration completed');
            } else {
                return redirect()->back()->with('errormessage','Alert! Failed to register');
            }
        }
        return view('User.SignUp');
    }
    public function forgotpassword(Request $request)
    {
        $data = $request->input();
        if (count($data) > 0) {
            $user = users::where([['email', $data['email']],['u_type', 0]])->first();
            if (isset($user)) {
                $token = Str::random(8);
                users::where('u_id',$user->u_id)->update(['forgot_otp'=>$token]);
                $resetUrl = url('/set-password/' . $token);
                $msg = "<h2>Password Reset Request</h2>
                        <p>Hello,</p>
                        <p>We received a request to reset your password. Click the button below to reset it:</p>
                        <a href='".$resetUrl."' class='btn'>Reset Password</a>";
                $send=$this->emailsend([],[],$data['email'], 'Forgot password reset link', $msg);
                return redirect('/login')->with('successmessage','A password reset link has been sent to your email.');;
            } else {
                return redirect('/forgot-password')->with('errormessage','Invalid Email');
            }
        }
        return view('User.ForgotPassword');
    }
    public function setpassword()
    {
        return view('User.SetPassword');
    }
    public function updatenewpassword(Request $request)
    {
        $data = $request->input();
        if (count($data) > 0) {
            $this->validate($request, [
                'otp' => 'required',
                'password' => 'required|min:8',
                'c_password' => 'required|same:password',
            ], [
                'otp.required' => 'OTP is required',
                'password.required' => 'Please Enter New Password',
                'password.min' => 'Please Enter 8 character in password',
                'c_password.required' => 'Please Enter confirm password',
                'c_password.same' => 'Confirm password not match to password',
            ]);
            $user = users::where([['forgot_otp', $data['otp']],['u_type', 0]])->first();
            if (isset($user)) {
                users::where('u_id',$user->u_id)->update(['password'=> md5($data['password']),'forgot_otp'=>null]);
                return redirect('/login')->with('successmessage','Password Reset Successfully');
            } else {
                return redirect('/set-password/'.$data['otp'])->with('errormessage','Something Wrong Please Try Again...');
            }
        }
        return view('User.SetPassword');
    }
    public function logout()
    {
        session()->pull('userlogin');
        return redirect('/');
    }

    public function home()
    {
        $data['services']=services::orderBy('s_id','DESC')->limit(6)->get();
        $data['blogs']=blogs::orderBy('b_id','DESC')->limit(6)->get();
        return view('User.Home',$data);
    }
    public function aboutus()
    {
        $data['teams']=teams::orderBy('t_id','DESC')->limit(6)->get();
        $data['testimonial']=testimonial::orderBy('t_m_id','DESC')->limit(6)->get();
        return view('User.AboutUs',$data);
    }
    public function services()
    {
        $data['services']=services::orderBy('s_id','DESC')->get();
        return view('User.Services',$data);
    }
    public function blogs()
    {
        $data['teams']=teams::orderBy('t_id','DESC')->get();
        $data['blogs']=blogs::orderBy('b_id','DESC')->get();
        return view('User.Blogs',$data);
    }
    public function contact()
    {
        return view('User.Contact');
    }

    public function servicedetail($url = '')    //Single Product Detail Page
    {
        if ($url != '') {
            $uid = session()->get('userlogin.u_id');
            $data['service'] = DB::table('services')
                ->select('services.*')
                ->where(function ($subquery)  use ($url) {
                    $subquery->where('services.s_url', $url);
                })
                ->orderBy('services.s_id', 'DESC')->groupBy('services.s_id')->first();
            if (isset($data['service'])) {
                return view('User.ServiceDetail', $data);
            } else {
                return "Page Not Found";
            }
        } else {
            return redirect('/')->with('errormessage', 'Something Wrong Please Try Again...');
        }
    }

    public function addtocart(Request $request)
    {
        $data = $request->input();
        if (session()->has('userlogin')) {
            $uid = session()->get('userlogin.u_id');
            $isExist = addtocart::where([['u_id', $uid], ['s_id', $data['s_id']]])->first();
            $services = services::where('s_id', $data['s_id'])->first();
            if (isset($services)) {
                if(isset($isExist)){
                    echo json_encode(array(
                        'message' => 'This service has already been added to the cart.',
                        'status' => 'success'
                    ));
                } else {
                    addtocart::create(array(
                        's_id'=>$data['s_id'],
                        'u_id'=>$uid,
                    ));
                    $cart = addtocart::where('u_id', $uid)->get();
                    echo json_encode(array(
                        'message' => 'Added to Your Cart Successfully',
                        'status' => 'success',
                        'totalproduct' => count($cart)
                    ));
                }
            } else {
                echo json_encode(array(
                    'message' => 'Something Wrong Please Try Again!...',
                    'status' => 'error'
                ));
            }
        } else {
            echo json_encode(array(
                'message' => 'Please Sign In first',
                'status' => 'error'
            ));
        }
    }

    public function removecart(Request $request)
    {
        $data = $request->input();
        if (session()->has('userlogin')) {
            $uid = session()->get('userlogin.u_id');
            $isExist = addtocart::where([['u_id', $uid], ['id', $data['c_id']]])->first();
            if(isset($isExist))
            {
                addtocart::where('id',$data['c_id'])->delete();
                echo json_encode(array(
                    'message' => 'Product removed from cart successfully!',
                    'status' => 'success'
                ));
            } 
            else {
                echo json_encode(array(
                    'message' => 'Something Wrong Please Try Again!...',
                    'status' => 'error'
                ));
            }
        } else {
            echo json_encode(array(
                'message' => 'Please Sign In first',
                'status' => 'error'
            ));
        }
    }

    public function coupons()
    {
        $data['coupons'] = coupons::get();
        return view('User.Coupons',$data);
    }
    
    public function termsandcondition()
    {
        return view('User.TermsAndCondition');
    }

    public function agreement()
    {
        return view('User.Agreement');
    }

     public function contactmessage(Request $request)
    {
        $data=$request->input();
        if(!($data['hdata']!='' && isset($data['hdata'])))
        {
            $insert=array(
                'i_name'=>$data['name'],
                'i_mobile'=>$data['phone'],
                'i_email'=>$data['email'],
                'i_message'=>$data['message'],
                'i_date'=>date('d-m-Y h:i:sa'),
            );
            inquiry::create($insert);
            $msg = "<h2>Inquiry From Users</h2>
                    <b>Date : </b>" . date('d-m-Y h:i:sa') . "<br/>
                    <b>Name</b> : " . $data['name'] . "<br>
                    <b>Mobile</b> : " . $data['phone'] . "<br>
                    <b>Email</b> : " . $data['email'] . "<br>
                    <b>Message</b> : " . $data['message'];
                    
            $admin = users::where('u_type', 1)->first();
            $send=$this->emailsend([],[],$admin->email, 'Contact us Form Inquiry', $msg);
            return redirect()->back()->with('successmessage','Inquiry Send Successfully');
        }
        else{
            return redirect('/contact-us')->with('errormessage','Something Wrong Please Try Again!...');
        }
    }

    public function emailsend($view = [], array $data = [], $sendemail = '', $title = '', $msg = '')
    {
        $config = array(
            'driver'     => env('MAIL_MAILER', 'smtp'),
            'host'       => env('MAIL_HOST', 'smtp.gmail.com'),
            'port'       => env('MAIL_PORT', 587),
            'from'       => array('address' => env('MAIL_FROM_ADDRESS'), 'name' => env('APP_NAME', 'Your App')),
            'encryption' => 'tls',
            'username'   => env('MAIL_USERNAME'),
            'password'   => env('MAIL_PASSWORD'),
            'sendmail'   => '/usr/sbin/sendmail -bs',
            'pretend'    => false,
        );

        Config::set('mail', $config);

        Mail::send($view, $data, function ($message) use ($sendemail, $title, $msg) {
            $message->from(env('MAIL_FROM_ADDRESS'));
            $message->to($sendemail)->subject($title)->html($msg);
        });
    }

    public function profile()
    {
        if (session()->has('userlogin')) {
            $uid=session()->get('userlogin.u_id');
            $data['profile']=users::where('u_id',$uid)->first();
            if(isset($data['profile']))
            {
                return view('User.Profile',$data);
            }
            else{
                return redirect('/');
            }
        }
        else {
            return redirect('/')->with('errormessage','Please Sign In first');
        }
    }

    public function updateprofile(Request $request,$id='')
    {
        $data=$request->input();
        $uid=session()->get('userlogin')->u_id;
        $update=array(
            'name'=>$data['name'],
        );
        users::where('u_id',$uid)->update($update);
        return redirect('profile')->with('successmessage','Profile Updated Successfully');
    }

    public function changepassword(Request $request)
    {
        if (session()->has('userlogin')) {
            $uid=session()->get('userlogin.u_id');
            $data = $request->input();
            if (count($data) > 0) {
                $this->validate($request, [
                    'oldpassword' => 'required',
                    'new_password' => 'required|min:8',
                    'c_password' => 'required|same:new_password',
                ], [
                    'oldpassword.required' => 'Old password is required',
                    'new_password.required' => 'Please Enter New Password',
                    'new_password.min' => 'Please Enter 8 character in password',
                    'c_password.required' => 'Please Enter confirm password',
                    'c_password.same' => 'Confirm password not match to password',
                ]);
                $user = users::where([['password',md5($data['oldpassword'])],['u_id', $uid]])->first();
                if (isset($user)) {
                    users::where('u_id',$user->u_id)->update(['password'=> md5($data['new_password'])]);
                    return redirect('/change-password')->with('successmessage','Password Changed Successfully');
                } else {
                    return redirect('/change-password')->with('errormessage','Old Password is wrong');
                }
            }
            return view('User.ChangePassword');
        }
        else {
            return redirect('/')->with('errormessage','Please Sign In first');
        }
    }

    public function cart()
    {
        if (session()->has('userlogin')) {
            $uid=session()->get('userlogin')->u_id;
            $data['cart']=addtocart::join('services', 'services.s_id', 'add_to_cart.s_id')->where('u_id',$uid)->get();
            if(count($data['cart'])>0)
                return view('User.Cart', $data);
            else
                return redirect('/services')->with('errormessage','Your cart has been empty!');;
        }
        else {
            return redirect('/')->with('errormessage','Please Sign In first');
        }
    }

    public function applycoupon(Request $request)
    {
        $data=$request->input();
        $uid=session()->get('userlogin')->u_id;
        $cart = addtocart::join('services', 'services.s_id', 'add_to_cart.s_id')->where('u_id',$uid)->get();
        $total = 0;
        foreach ($cart as $value) {
            $total += $value->s_price;
        }
        session()->pull('couponcode');
        if($data['code']!='')
        {
            $coupon = coupons::where('code', strtoupper($data['code']))->first();
            if (isset($coupon)) 
            {
                $order = serviceorder::where([['coupon_id', $coupon->coupon_id], ['u_id', $uid]])->first();
                if(isset($order)){
                    echo json_encode(array(
                        'message' => 'Coupon code already used!',
                        'status' => 'error',
                        'finalamount'=> $total
                    ));
                }
                else
                {
                    if ($total >= $coupon->min_amount) {
                    $dis = round($coupon->c_amount);
                    $coddata = array(
                        'id' => $coupon->coupon_id,
                        'code' => $data['code'],
                        'dis' => $dis,
                    );
                    session()->put('couponcode', $coddata);
                    echo json_encode(array(
                        'message' => 'Coupon code applied successfully!',
                        'discount'=> $dis,
                        'finalamount'=> $total - $dis,
                        'status' => 'success',
                    ));
                } else {
                    echo json_encode(array(
                        'message' => 'Your Order is less then ₹'. $coupon->min_amount,
                        'status' => 'error',
                        'finalamount'=> $total
                    ));
                }
                }
            }
            elseif($coupon==''){
                echo json_encode(array(
                    'message' => 'Invalid Coupon',
                    'status' => 'error',
                    'finalamount'=> $total
                ));
            }
        }
        else{
                echo json_encode(array(
                    'message' => 'Please enter valid coupon code',
                    'status' => 'error',
                    'finalamount'=> $total
                ));
        }
    }

    public function removecoupon(Request $request)
    {
        session()->pull('couponcode');
        echo json_encode(array(
            'message' => 'Coupon code removed successfully!',
            'status' => 'success',
        ));
    }
    

    public function checkout()
    {
        if (session()->has('userlogin')) 
        {
            $uid=session()->get('userlogin')->u_id;
            $data['cart']=addtocart::join('services', 'services.s_id', 'add_to_cart.s_id')->where('u_id',$uid)->get();
            if(count($data['cart'])>0) {
                return view('User.Checkout', $data);
            }
            else {
                return redirect('/cart')->with('errormessage','Your cart has been empty!');
            }
        }
        else {
            return redirect('/');
        }
    }

    public function getorderdetail($oid)
    {
        $uid=session()->get('userlogin.u_id');
        $odetail = \DB::table('service_order')
                    ->join('service_order_details', 'service_order_details.s_o_id', 'service_order.s_o_id')
                    ->leftjoin('services', 'service_order_details.s_id', 'services.s_id')
                    ->select('service_order.*','services.*', 'service_order_details.*')
                    ->where([['service_order.s_o_id', $oid],['service_order.u_id',$uid]])->get();
        return $odetail;
    }

    public function confirmation(Request $request,$id=0)
    {
        if (session()->has('userlogin')) 
        {
            $data['orderdetails']=$this->getorderdetail($id);
            if(count($data['orderdetails']) > 0){
                return view('User.Confirmation',$data);
            }
            else {
                return redirect('/booking')->with('errormessage','Something Wrong Please Try Again!...');
            }
        }
        else {
            return redirect('/')->with('errormessage','Please Sign In first');
        }
    }

    public function booking()
    {
        if (session()->has('userlogin')) 
        {
            $uid=session()->get('userlogin.u_id');
            $data['orders']=serviceorder::where('u_id',$uid)->orderBy('s_o_id', 'DESC')->get();
            return view('User.Booking',$data);
        }
        else {
            return redirect('/')->with('errormessage','Please Sign In first');
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $services = services::where('s_title', 'LIKE', "%$query%")
            ->orWhere('s_description', 'LIKE', "%$query%")
            ->orderBy('s_id','DESC')
            ->get();

        return response()->json($services);
    }
}