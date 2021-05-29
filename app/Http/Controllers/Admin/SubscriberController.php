<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use Brian2694\Toastr\Facades\Toastr;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::latest()->get();
        return view('subscriber',compact('subscribers'));
    }

    public function destroy($subscriber)
    {
        $subscriber = Subscriber::findOrFail($subscriber)->delete();
        Toastr::success('email Successfully Deleted', 'Success');
        return redirect()->back();
    }
}
