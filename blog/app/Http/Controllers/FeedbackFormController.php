<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;

use App\Order;
use App\Http\Requests;
use DB;

use Illuminate\Http\Request;

class FeedbackFormController extends Controller
{
    /**
     * Check if manager and return manager page
     *
     */
    public function roleManager()
    {
        if (Auth::user()->id == '1') {
            $orders = Order::all();
            return view('manager', compact('orders'));
        } else return redirect('home');
    }


    /**
     * Check if user and return user page
     *
     */
    public function roleUser()
    {
        if (Auth::user()->id != '1') {
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
}
