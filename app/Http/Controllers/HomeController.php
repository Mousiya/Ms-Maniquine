<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype=Auth::user()->utype;

        if($usertype=='ADM')
        {
            return view('admin.home');
        }
        else{
            return redirect('/customer-home-component');
        }

    }


    public function index()
    {
        if(Auth::id())
        {
            return redirect('redirect');
        }
        else
        {
            return redirect('/customer-home-component');
        }
        
    }

    function dashboard()
    {
        return redirect('/customer-home-component');
    }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
