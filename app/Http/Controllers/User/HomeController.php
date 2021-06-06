<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\UserScore;
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
        if (Auth::user()->utype == 'ADM' || Auth::user()->utype == 'SA') {
            return redirect()->route('logout')->with('errors', 'Silahkan login pada halaman admin');
        }

        $count = UserScore::where('user_id', Auth::id())->count();
        if ($count > 0) {
            return redirect()->route('result');
        }

        return view('adminLte.dashboard');
        
    }
}
