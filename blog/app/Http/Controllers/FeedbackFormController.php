<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;

use App\Order;
use App\Http\Requests;
use DB;
use Carbon\Carbon;
use Mail;
//use App\Jobs\SendManagerEmail;
use App\Mail\Reminder;


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

    public function managerCheckboxes(Requests\CreateCheckboxRequest $request)
    {
        if (Auth::user()->id == '1') {
            $closedArray = $request->status;
            if($closedArray != null) {
                foreach ($closedArray as $closed) {
                    Order::where('id', $closed)
                        ->update(['status' => 'closed']);
                }
            }
            return $this->roleManager();

        } else return redirect('home');
    }

    /**
     * If user and if he hasn`t posted order in last 24 hours then redirects to user page
     *
     */
    public function roleUser()
    {
        if (Auth::user()->id != '1') {
            $remember_token = md5(Auth::user()->id . 'hash');
            $orderTime = Order::where('remember_token', $remember_token)->orderBy('id', 'desc')->first();
            if ($orderTime == '' || (Carbon::now()->timestamp - Carbon::parse($orderTime->created_at)->timestamp < 86400))
            {
                return view('user', compact('remember_token'));
            }
        }
        return redirect('home');
    }

    /**
     * Insert data from form to table Orders and validation check
     *
     */
    public function success(Requests\CreateOrderRequest $request)
    {
        $file = $request->file('attached_file');
/*
        //Display File Name
        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';

        //Display File Extension
        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo '<br>';

        //Display File Real Path
        echo 'File Real Path: '.$file->getRealPath();
        echo '<br>';

        //Display File Size
        echo 'File Size: '.$file->getSize();
        echo '<br>';

        //Display File Mime Type
        echo 'File Mime Type: '.$file->getMimeType();
*/

        $lastUser = Order::create($request->all());

        //Move Uploaded File
        $addFile = 'not exists';
        if($file != '' ) {
            $destinationPath = public_path('uploads');
            $file->move($destinationPath, $file->getClientOriginalName());


            Order::where('id', $lastUser->id)
                ->update(['attached_file' => $file->getClientOriginalName()]);

            $addFile = $destinationPath. '/' . $file->getClientOriginalName();
            //$domain = request()->getHost();

            //$email_content = 'Client: ' . $lastUser->client . '<br>Email: ' . $lastUser->email . '<br>Title: ' . $lastUser->title .
              //  '<br>Body: ' . $lastUser->body . '<br>File: ' . $domain . '/uploads/' . $file->getClientOriginalName();
        }

        $email_content = 'Client: ' . $lastUser->client . '<br>Email: ' . $lastUser->email .
                '<br>Title: ' . $lastUser->title . '<br>Body: ' . $lastUser->body;

        Mail::to('sciencetech@mail.ru')->queue(new Reminder($email_content, $addFile));


        return view('success');
    }
}
