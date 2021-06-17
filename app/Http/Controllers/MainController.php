<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    function login(){
        
        return view('auth.login');
    }

    function register(){
        return view('auth.register');
    }

    function save(Request $request){
       // return $request->input();

       $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:5|max:12'
       ]);


         $admin = new Admin;
         $admin->name = $request->name;
         $admin->email = $request->email;
         $admin->password = Hash::make($request->password);
         $save = $admin->save();

         if($save){
            return back()->with('success','New User has been successfuly added to database');
         }else{
             return back()->with('fail','Something went wrong, try again later');
         }
    
    }

    function check(Request $request){
       
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
       ]);
        
       
      
        
        $userInfo = Admin::where('email','=', $request->email)->first();
        error_log($request->email);
        if(!$userInfo){
            return back()->with('fail','We do not recognize your email address');
        }else{
            //check password
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('admin/dashboard');

            }else{
                return back()->with('fail','Incorrect password');
            }
        }  


    }

    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect(('/auth/login'));
        }

    }

    function dashboard(){
        $data = ['LoggedUserInfo'=>Admin::where('id', '=', session('LoggedUser'))->first()];
        if($data['LoggedUserInfo']){
            //error_log(print_r($data, TRUE));
            return view('admin.dashboard', $data);
        }
        else{
            
            return "nodata";
        }
    }


}
