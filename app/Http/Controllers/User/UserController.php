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
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        //insert to table user
        user::create(array_merge($request->all(), ['remember_token' => Str::random(10), 'utype' => 'ADM', 'level' => 'admin', 'password' => Hash::make($request->get('password'))]));        

        return redirect()->route('indexAdmin')
                        ->with('success', 'Admin Created Successfully.');
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
        $reff = Network::firstOrFail()->where('user_id', $user->id)->get();

        if ($user->utype=='ADM') {
        return view('admins.edit', compact('user'));
        }else if ($user->utype=='USR') {
        return view('users.edit', compact('user', 'reff'));
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
        if($user->utype=='ADM'){
            $request->validate([
                'name' => 'required',
                'uname' => 'required',
                'email' => 'required|email',
                'phone' => 'required|numeric',
                'level' => 'required',
            ]);

            return redirect()->route('indexAdmin')
                        ->with('success', 'Admin Updated Successfully');
        }elseif ($user->utype=='USR') {
            $request->validate([
                'name' => 'required',
                'uname' => 'required',
                'email' => 'required|email',
                'phone' => 'required|numeric',
                'level' => 'required',
            ]);

            if(empty($request->get('password') or $request->get('password')=="")) {
                $user->update($request->all());
            }else{
                $user->update(array_merge($request->all(), ['password' => Hash::make($request->get('password'))]));

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

        return redirect()->route('users.index')
                        ->with('success', 'User Deleted Successfully');
    }

    public function destroyAdmin(User $user)
    {
        $user->delete();

        return redirect()->route('indexAdmin')
                        ->with('success', 'Admin Deleted Successfully');
    }

    public function bonusManager()
    {
        $users = DB::table('users')->select('users.*')->where('level', 'like', '%manager%')->get();
        return view('users.bonusManager', compact('users'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }
    public function bonusMember()
    {
        $users = DB::table('users')->select('users.*')->where('level', 'like', '%member%')->get();

        return view('users.bonusMember', compact('users'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }
}
