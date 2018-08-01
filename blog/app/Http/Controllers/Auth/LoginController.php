<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;

use App\Order;
use App\Http\Requests;
use DB;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    //protected $redirectTo = '/home';

  /*  protected function redirectTo()
    {
        if (Auth::check())
        {
          $user = Auth::user();
            return '/manager';

        } else dd('You are not logged!');


    }*/


    /**
     * Check if manager and return managers page
     *
     */
    public function roleManager()
     {
         if (Auth::check() && Auth::user()->id == '1') {
             $orders = Order::all();
             return view('manager', compact('orders'));

         } else return redirect('home');
     }


    /**
     * Check if user and return users page
     *
     */
    public function roleUser()
    {
        if (Auth::check() && Auth::user()->id != '1')
        {
            $role = 'user';
            return view('user');

        }   else return redirect('home');
    }

    /**
     * Insert data from form to table Orders and validation check
     *
     */
    public function success(Requests\CreateOrderRequest $request)
    {
        Order::create($request->all());
        return view('success');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
