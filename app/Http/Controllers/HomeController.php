<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Madrasha;
use Session;

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
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $yr=Setting::where('name','Hijri')->first();
        Session::put('year', $yr->setting);
        $madrasha=Madrasha::first();
        Session::put('m', $madrasha);
        return view('dashboard');
    }
}
