<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use Brian2694\Toastr\Facades\Toastr;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email|unique:subscribers',
        ]);

        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();
        Toastr::success('email Successfully Saved to our list', 'Success');
        return redirect()->back();
        
    }
}
