<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::where('id', auth()->user()->id)->first();
        // dd($users);
        $res = Education::where('user_id', auth()->user()->id)->get();
        return view('home', compact('res','users'));
    }
    public function update(Request $request)
    {

        $res = User::where('id', auth()->user()->id)->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'year_of_birth' => $request->year_of_birth,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'uname' => $request->uname,
        ]);
        if ($res) {
            return redirect()->back()->with('success', 'Profile Updated Successfully');
        } else {
            return redirect()->back()->with('error', 'Profile Update Failed');
        }
    }
    public function otp(Request $request)
    {


    }
}