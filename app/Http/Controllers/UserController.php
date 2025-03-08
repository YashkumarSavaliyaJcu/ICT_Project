<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\services;
use App\Models\addtocart;
use App\Models\users;
use App\Models\blogs;
use App\Models\inquiry;
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
                'password.alpha_num' => 'password should be a combination of number and alphanumeric',
                'c_password.required' => 'Please enter confirm password',
                'c_password.same' => 'Confirm password not match to password',
            ]);
           $userData=array(
                'name'=>$data['name'],
                'email'=>$data['email'],
                'password'=>md5($data['password']),
                'u_type'=>0
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

    public function termsandcondition(){
        return view('User.TermsAndCondition');

    }

    public function agreement(){
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
                    
            $admin = users::where('u_type', 1)
            ->first();
            $send=$this->emailsend([],[],$admin->email, 'Inquiry From Users', $msg);
            return redirect('/contact-us')->with('successmessage','Inquiry Send Successfully');
        }
        else{
            return redirect('/contact-us')->with('errormessage','Something Wrong Please Try Again!...');
        }
    }

    public function emailsend($view = [], array $data = [], $sendemail = '', $title = '', $msg = '', $attachment = '')
    {

        // $websetting = websetting::first();
        // $config = array(
        //     'driver'     => 'smtp',
        //     'host'       => $websetting->smtp_host,
        //     'port'       => $websetting->smtp_port,
        //     'from'       => array('address' => $websetting->e_from, 'name' => '${APP_NAME}'),
        //     'encryption' => $websetting->smtp_crypto,
        //     'username'   => $websetting->smtp_user,
        //     'password'   => $websetting->smtp_password,
        //     'sendmail'   => '/usr/sbin/sendmail -bs',
        //     'pretend'    => false,

        // );
        // Config::set('mail', $config);
        // $msgre = $msg;
        // Mail::send($view, $data, function ($message) use ($sendemail, $title, $msgre, $attachment, $websetting) {
        //     $message->from($websetting->e_from);
        //     $message->to($sendemail)->subject($title)->setBody($msgre, 'text/html');
        //     if ($attachment != '') {
        //         foreach ($attachment as $file) {
        //             $message->attach($file);
        //         }
        //     }
        // });
    }

    public function profile()
    {
        $uid=session()->get('userlogin')->u_id;
        $data['profile']=users::where('u_id',$uid)->first();
        if(isset($data['profile']))
        {
            return view('User.Profile',$data);
        }
        else{
            return redirect('/');
        }
    }

    public function updateprofile(Request $request,$id='')
    {
        $data=$request->input();
        $uid=session()->get('userlogin')->u_id;
        $update=array(
            'name'=>$data['name'],
            'email'=>$data['email'],
        );
        users::where('u_id',$uid)->update($update);
        return redirect('profile')->with('successmessage','Profile Updated Successfully');
    }
}