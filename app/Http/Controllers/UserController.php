<?php

namespace App\Http\Controllers;

use App\Models\ActivePackage;
use App\Models\InvestTicket;
use App\Models\Network;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::latest()->paginate(5);

        $users = User::where('utype', 'USR')->get();

        return view('users.index', compact('users'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function indexAdmin()
    {
        // $users = User::latest()->paginate(5);

        $users = DB::table('users')
        ->orderBy('id', 'desc')
        ->select('users.*')
        ->where('utype','like', 'ADM')            
        ->get();

        return view('admins.index', compact('users'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function indexAdminPusat()
    {
        // $users = User::latest()->paginate(5);

        $users = DB::table('users')
        ->orderBy('id', 'desc')
        ->select('users.*')
        ->where('utype','like', 'ADP')            
        ->get();

        return view('admins.indexPusat', compact('users'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function search(user $user)
    {
        // $users = User::latest()->paginate(5);

        $users = DB::table('users')
        ->orderBy('id', 'desc')
        ->join('networks', 'users.id', '=', 'networks.user_id')
        ->select('users.*', 'networks.upline_name', 'networks.upline_id')
        ->where('uname', 'like', '$user')
        ->Where('name', 'like', '$user')
        ->get();

        return view('users.index', compact('users'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all()->sortBy('uname');

        return view('users.create', compact('users'));
    }

    public function createAdmin()
    {         
        return view('admins.create');
    }

    public function createAdminPusat()
    {         
        return view('admins.createPusat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->get('password'));
        //input validation
        $request->validate([
            'name' => 'required',
            'uname' => 'required|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        //insert to table user
        $userCreate = User::create(array_merge($request->all(), ['remember_token' => Str::random(10), 'password_unhash' => $request->get('password'), 'password' => Hash::make($request->get('password'))]));

        return redirect()->route('users.index')
        ->with('success', 'User Created Successfully.');
    }
    public function storeAdmin(Request $request)
    {
        //input validation
        $request->validate([
            'name' => 'required',
            'uname' => 'required|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        //insert to table user
        user::create(array_merge($request->all(), ['remember_token' => Str::random(10), 'polres' => $request->get('polres'), 'password_unhash' => $request->get('password'), 'password' => Hash::make($request->get('password'))]));

        if ($request->get('utype')=="ADP") {
            return redirect()->route('indexAdminPusat')
            ->with('success', 'Admin Pusat Created Successfully.');
        }else{
            return redirect()->route('indexAdmin')
            ->with('success', 'Admin Created Successfully.');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $users = DB::table('users')
        ->join('networks', 'users.id', '=', 'networks.user_id')
        ->select('users.*', 'networks.upline_name', 'networks.upline_id')
        ->where('users.id', $user->id)
        ->get();

        if (sizeof($users) < 1) {
            $users = DB::table('users')
            ->select('users.*')
            ->where('users.id', $user->id)
            ->get();

            return view('users.show', compact('users'));
        }
        return view('users.show', compact('users'));
    }

    public function showUpline(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if ($user->utype=='ADM') {
            return view('admins.edit', compact('user'));
        }else if ($user->utype=='ADP') {
            return view('admins.editPusat', compact('user'));
        }else if ($user->utype=='USR') {
            return view('users.edit', compact('user'));
        }
    }    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {                

        if($user->utype=='ADP'){
            $request->validate([
                'name' => 'required',
                'uname' => 'required',
            ]);

            if(!filled($request->get('password'))) {
                $user->update(array_merge($request->all(), ['password' => Hash::make($user->password_unhash), 'password_unhash' => $user->password_unhash]));
            }else{
                $user->update(array_merge($request->all(), ['password' => Hash::make($request->get('password')), 'password_unhash' => $request->get('password') ]));

            }

            return redirect()->route('indexAdminPusat')
            ->with('success', 'Admin Pusat Updated Successfully');

        }elseif($user->utype=='ADM'){
            $request->validate([
                'name' => 'required',
                'uname' => 'required',
                'polres' => 'required',
            ]);

            if(!filled($request->get('password'))) {
                $user->update(array_merge($request->all(), ['password' => Hash::make($user->password_unhash), 'password_unhash' => $user->password_unhash]));
            }else{
                $user->update(array_merge($request->all(), ['password' => Hash::make($request->get('password')), 'password_unhash' => $request->get('password') ]));

            }

            return redirect()->route('indexAdmin')
            ->with('success', 'Admin Updated Successfully');

        }elseif ($user->utype=='USR') {

            $request->validate([
                'name' => 'required',
                'uname' => 'required',
            ]);

            if(!filled($request->get('password'))) {
                $user->update(array_merge($request->all(), ['password' => Hash::make($user->password_unhash), 'password_unhash' => $user->password_unhash]));
            }else{
                $user->update(array_merge($request->all(), ['password' => Hash::make($request->get('password')), 'password_unhash' => $request->get('password')]));

            }
            return redirect()->route('users.index')
            ->with('success', 'User Updated Successfully');
        }

        
    }    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        if (Auth::user()->utype == 'ADM') {
            return redirect()->route('users.index')->with('success', 'User Deleted Successfully');
        }else {
            return redirect()->route('indexAdmin')->with('success', 'Admin Deleted Successfully');
        }
    }
}
