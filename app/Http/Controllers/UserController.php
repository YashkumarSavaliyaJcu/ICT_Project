<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\services;
use App\Models\addtocart;
use App\Models\users;
use App\Models\blogs;
use DB;

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

    public function signup()
    {
        return view('User.SignUp');
    }
    public function forgotpassword()
    {
        return view('User.ForgotPassword');
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
        return view('User.AboutUs');
    }
    public function services()
    {
        $data['services']=services::orderBy('s_id','DESC')->get();
        return view('User.Services',$data);
    }
    public function blogs()
    {
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
                'message' => 'Please Sign In First',
                'status' => 'error'
            ));
        }
    }
}