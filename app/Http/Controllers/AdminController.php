<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use App\Models\users;
use App\Models\services;
use App\Models\blogs;
use App\Models\coupons;
use App\Models\teams;
use App\Models\testimonial;
use Session;
use Config;
use DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(true || session()->has('adminlogin'))
            {
                return $next($request);
            }
        });
    }
    public function index()
    {
        return redirect('/');
    }
    public function login(Request $request)
    {
        $data = $request->input();
        if (count($data) > 0)
        {
            $admin = users::where(function ($query) use ($data) {
                $query->where('name', $data['name'])
                    ->orWhere('email', $data['name']);
            })
             ->where('password', md5($data['password']))
            ->where('u_type', 1)
            ->first();
            if (isset($admin)) 
            {
                session()->put('adminlogin', $admin);
                return redirect('/Admin/dashboard');
            }
            else
            {
                $this->flashmessage('Invalid Email Or Password', 1);
                return redirect('/Admin');
            }
        }
        if(session()->has('adminlogin'))
            return redirect('/Admin/dashboard');
        else
            return view('Admin.AdminLogin');
    }
    public function dashboard()
    {
        if(session()->has('adminlogin'))
        {
            $data['totalservices']=services::all();
            $data['totalusers']=users::where('u_type',0)->get();
            $data['totalblogs']=blogs::all();
            $data['totalcoupons']=coupons::all();
            return view('Admin.AdminDashboard',$data);
        }
        else{
            return redirect('/Admin');
        }
        
    }
    public function logout()
    {
        session()->pull('adminlogin');
        return redirect('/Admin');
    }
    public function flashmessage($msg, $status = 0)
    {
        if ($status == 1) 
        {
            Session::flash('message', "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">". $msg ." <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                <span aria-hidden=\"true\">&times;</span>
            </button>
            </div> ");
        } 
        else 
        {
            Session::flash('message', "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">". $msg . "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                <span aria-hidden=\"true\">&times;</span>
            </button>
            </div> ");
        }
    }

    public function images(Request $request, $name, $path)
    {
        if ($request->hasFile($name)) {
            $file = [];
            $image = $request->file($name);
            if (is_array($image)) {
                $path = public_path('/Assets/' . $path);
                foreach ($image as $key => $val) {
                    $filename = time().$key.".".$val->extension();
                    $filename = preg_replace('/[^a-z0-9\.]/i', "_", $filename);
                    $filename = str_replace(' ', '_', $filename);
                    $val->move($path, $filename);
                    $file[] = $filename;
                }
            } else {
                $path = public_path('/Assets/' . $path);
                $filename = $name.'_'.time().".".$image->extension();
                $filename = preg_replace('/[^a-z0-9\.]/i', "_", $filename);
                $filename = str_replace(' ', '_', $filename);
                $image->move($path, $filename);
                $file[] = $filename;
            }
        }
        if (isset($file) && count($file) > 0) { 
            return $file;
        } else {
            return 0;
        }
    }

    public function delete(Request $request)
    {
        $data=$request->input();
        if($data['delete_table']!='' && $data['delete_field']!='' && $data['delete_value']!='' && $data['delete_message']!='' && $data['delete_redirect']!='')
        {
            $delete=\DB::table($data['delete_table'])->where($data['delete_field'], $data['delete_value'])->delete();
            if($delete==1)
                $this->flashmessage($data['delete_message'].' Deleted Successfully');
            else
                $this->flashmessage('Something Wrong Please Try Again..',1);
            return redirect('/Admin/'.$data["delete_redirect"]);
        }
        else
        {
            $this->flashmessage('Something Wrong Please Try Again..',1);
            return redirect()->back();
        }
    }

    public function service(Request $request,$id=0)
    {
        if(session()->has('adminlogin'))
        {
            $data=$request->input();
            if($id==='new')
            {
                return view('Admin.AdminAddService');
            }
            elseif(count($data)>0 && $id==0)
            {
                $insert=array(
                    's_title'=>$data['s_title'],
                    's_url'=>$data['s_url'],
                    's_description'=>$data['s_description'],
                    's_detail_description'=>$data['s_detail_description'],
                    's_price'=>$data['s_price'],
                    'cleaning_hour'=>$data['cleaning_hour'],
                    'no_of_cleaner'=>$data['no_of_cleaner'],
                    'visiting_hours'=>$data['visiting_hours'],
                    's_contact'=>$data['s_contact'],
                    's_email'=>$data['s_email'],
                );
                $simagename = $this->images($request, 's_image', 'images/services/');
                $slogoname = $this->images($request, 's_logo', 'images/services/');
                if ($simagename != 0)
                {
                    foreach ($simagename as $value) {
                        $insert['s_image'] = $value;
                    }
                }
                else
                {
                    $insert['s_image'] = '';
                }
                if ($slogoname != 0)
                {
                    foreach ($slogoname as $value) {
                        $insert['s_logo'] = $value;
                    }
                }
                else
                {
                    $insert['s_logo'] = '';
                }
                services::create($insert);

                $this->flashmessage("Service Inserted Successfully");
                return redirect('/Admin/services');
            }
            elseif(count($data)>0 && $id!=0)
            {
                $update=array(
                    's_title'=>$data['s_title'],
                    's_url'=>$data['s_url'],
                    's_description'=>$data['s_description'],
                    's_detail_description'=>$data['s_detail_description'],
                    's_price'=>$data['s_price'],
                    'cleaning_hour'=>$data['cleaning_hour'],
                    'no_of_cleaner'=>$data['no_of_cleaner'],
                    'visiting_hours'=>$data['visiting_hours'],
                    's_contact'=>$data['s_contact'],
                    's_email'=>$data['s_email'],
                );
                $simagename = $this->images($request, 's_image', 'images/services/');
                $slogoname = $this->images($request, 's_logo', 'images/services/');
                if ($simagename != 0)
                {
                    foreach ($simagename as $value) {
                        $update['s_image'] = $value;
                    }
                }
                if ($slogoname != 0)
                {
                    foreach ($slogoname as $value) {
                        $update['s_logo'] = $value;
                    }
                }
                services::where('s_id',$id)->update($update);

                $this->flashmessage('Service Successfully Updated');
                return redirect('Admin/services/'.$id);
            }
            elseif($id!=0)
            {
                $data['edit']=services::where('s_id',$id)->first();
                if(!isset($data['edit']))
                {
                    $this->flashmessage("Something Wrong Please Try Again...!",1);
                    return redirect('Admin/services');
                }
                return view('Admin.AdminAddService',$data);
            }
            $data['services']=services::orderBy('services.s_id','DESC')->get();
            return view('Admin.AdminService',$data);
        }
        else
        {
            return redirect('/Admin');
        }
    }

    public function blogs(Request $request,$id=0)
    {
        if(session()->has('adminlogin'))
        {
            $data=$request->input();
            if (count($data) > 0 && $id == 0) 
            {
                $insert = array(
                    'b_title' => $data['b_title'],
                    'b_url' => $data['b_url'],
                    'b_description' => $data['b_description'],
                    'b_date' => $data['b_date'],
                    'b_created_at' => date("Y-m-d"),
                );
                $name = $this->images($request, 'b_image', 'images/blogs/');
                if ($name != 0)
                {
                    foreach ($name as $value) {
                        $insert['b_image'] = $value;
                    }
                }
                else
                {
                    $insert['b_image'] = '';
                }
                blogs::create($insert);
                $this->flashmessage('Blog Inserted Successfully');
                return redirect('/Admin/blogs');
            }  
            elseif (count($data) > 0 && $id != 0) 
            {
                $update = array(
                    'b_title' => $data['b_title'],
                    'b_url' => $data['b_url'],
                    'b_description' => $data['b_description'],
                    'b_date' => $data['b_date'],
                );
                $name = $this->images($request, 'b_image', 'images/blogs/');
                if ($name != 0) 
                {
                    foreach ($name as $value) 
                    {
                        $update['b_image'] = $value;
                    }
                }
                blogs::where('b_id', $id)->update($update);
                $this->flashmessage('Blog Updated Succesfully');
                return redirect('/Admin/blogs');
            }                 
            elseif ($id != 0) 
            {
                $data['fetchblog'] = blogs::where('b_id', $id)->first();
            }
            $data['blogs'] = blogs::orderBy('b_id','desc')->get();
            return view('Admin.AdminBlogs',$data);
        }
        else
        {
            return redirect('/Admin');
        }
    }

    public function coupons(Request $request,$id=0)
    {
        if(session()->has('adminlogin'))
        {
            $data=$request->input();
            if (count($data) > 0 && $id == 0) 
            {
                $existCoupon= coupons::where('code',$data['code'])->first();
                if(isset($existCoupon)){
                    $this->flashmessage('This coupon code already exists.',1);
                    return redirect('/Admin/coupons');
                }
                $insert = array(
                    'title' => $data['title'],
                    'description' => $data['description'],
                    'code' => strtoupper($data['code']),
                    'min_amount' => $data['min_amount'],
                    'c_amount' => $data['c_amount'],
                );
                $name = $this->images($request, 'c_image', 'images/coupons/');
                if ($name != 0)
                {
                    foreach ($name as $value) {
                        $insert['c_image'] = $value;
                    }
                }
                else
                {
                    $insert['c_image'] = '';
                }
                coupons::create($insert);
                $this->flashmessage('Coupons Inserted Successfully');
                return redirect('/Admin/coupons');
            }  
            elseif (count($data) > 0 && $id != 0) 
            {
                $existCoupon= coupons::where('code', $data['code'])->where('coupon_id', '!=', $id)->first();
                if(isset($existCoupon)){
                    $this->flashmessage('This coupon code already exists.',1);
                    return redirect('/Admin/coupons/'.$id);
                }
                $update = array(
                    'title' => $data['title'],
                    'description' => $data['description'],
                    'code' => strtoupper($data['code']),
                    'min_amount' => $data['min_amount'],
                    'c_amount' => $data['c_amount'],
                );
                $name = $this->images($request, 'b_image', 'images/blogs/');
                if ($name != 0) 
                {
                    foreach ($name as $value) 
                    {
                        $update['b_image'] = $value;
                    }
                }
                coupons::where('coupon_id', $id)->update($update);
                $this->flashmessage('Coupon Updated Succesfully');
                return redirect('/Admin/coupons');
            }                 
            elseif ($id != 0) 
            {
                $data['fetchcoupon'] = coupons::where('coupon_id', $id)->first();
            }
            $data['coupons'] = coupons::orderBy('coupon_id','desc')->get();
            return view('Admin.AdminCoupon',$data);
        }
        else
        {
            return redirect('/Admin');
        }
    }

    public function teams(Request $request,$id=0)
    {
        if(session()->has('adminlogin'))
        {
            $data=$request->input();
            if (count($data) > 0 && $id == 0) 
            {
                $insert = array(
                    'name' => $data['name'],
                    'position' => $data['position'],
                    'twitter' => $data['twitter'],
                    'instagram' => $data['instagram'],
                    'youtube'=>$data['youtube'],
                    'facebook'=>$data['facebook']
                );
                $name = $this->images($request, 't_image', 'images/teams/');
                if ($name != 0)
                {
                    foreach ($name as $value) {
                        $insert['t_image'] = $value;
                    }
                }
                else
                {
                    $insert['t_image'] = '';
                }
                teams::create($insert);
                $this->flashmessage('Teams Inserted Successfully');
                return redirect('/Admin/teams');
            }  
            elseif (count($data) > 0 && $id != 0) 
            {
                $update = array(
                     'name' => $data['name'],
                    'position' => $data['position'],
                    'twitter' => $data['twitter'],
                    'instagram' => $data['instagram'],
                    'youtube'=>$data['youtube'],
                    'facebook'=>$data['facebook']
                );
                $name = $this->images($request, 't_image', 'images/teams/');
                
                if ($name != 0) 
                {
                    foreach ($name as $value) 
                    {
                        $update['t_image'] = $value;
                    }
                }
                teams::where('t_id', $id)->update($update);
                $this->flashmessage('Team Updated Succesfully');
                return redirect('/Admin/teams');
            }                 
            elseif ($id != 0) 
            {
                $data['fetchTeam'] = teams::where('t_id', $id)->first();
            }
            $data['teams'] = teams::orderBy('t_id','desc')->get();
            return view('Admin.AdminTeams',$data);
        }
        else
        {
            return redirect('/Admin');
        }
    }

    public function testimonial(Request $request,$id=0)
    {
        if(session()->has('adminlogin'))
        {
            $data=$request->input();
            if (count($data) > 0 && $id == 0) 
            {
                $insert = array(
                    'name' => $data['name'],
                    'company_name' => $data['company_name'],
                    'message' => $data['message'],
                );
                $name = $this->images($request, 'image', 'images/testimonial/');
                if ($name != 0)
                {
                    foreach ($name as $value) {
                        $insert['image'] = $value;
                    }
                }
                else
                {
                    $insert['image'] = '';
                }
                testimonial::create($insert);
                $this->flashmessage('Testimonial Inserted Successfully');
                return redirect('/Admin/testimonial');
            }  
            elseif (count($data) > 0 && $id != 0) 
            {
                $update = array(
                     'name' => $data['name'],
                     'company_name' => $data['company_name'],
                    'message' => $data['message'],
                );
                $name = $this->images($request, 'image', 'images/testimonial/');
                
                if ($name != 0) 
                {
                    foreach ($name as $value) 
                    {
                        $update['image'] = $value;
                    }
                }
                testimonial::where('t_m_id', $id)->update($update);
                $this->flashmessage('Testimonial Updated Succesfully');
                return redirect('/Admin/testimonial');
            }                 
            elseif ($id != 0) 
            {
                $data['fetchTestimonial'] = testimonial::where('t_m_id', $id)->first();
            }
            $data['testimonial'] = testimonial::orderBy('t_m_id','desc')->get();
            return view('Admin.AdminTestimonial',$data);
        }
        else
        {
            return redirect('/Admin');
        }
    }

    public function users(){
        $data['users'] = users::where('u_type', 0)->orderBy('u_id','DESC')
                ->get();
        return view('Admin.AdminUser',$data);
    }
}