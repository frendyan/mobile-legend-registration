<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RegistrationAdminController extends Controller
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
        return view('registrations.index');
    }

    public function indexAll()
    {
        $datas = DB::select("select registration_id, team_name, status, jadwal_tanding from registrations group by jadwal_tanding, registration_id, team_name, status");
        return view('registrations.indexAll', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required|string',
            'nama' => 'required|string',
            'tempat_lahir' => 'required|string',
            'provinsi' => 'required|string',
            'kecamatan' => 'required|string',
            'kota' => 'required|string',
            'alamat' => 'required|string',
            'pos' => 'required|string',
            'telp' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:1048',

        ]);

        // menyimpan data file yang diupload ke variabel $file

        $file = $request->file('foto');
        $fileName = $request->file('foto')->getClientOriginalName();
        $tujuan_upload = 'data_file/';

        $file->move($tujuan_upload, $file->getClientOriginalName());


        $id = Registration::create(array_merge($request->all(), ['foto'=>$request->file('foto')->getClientOriginalName()]))->id;

        $data = Registration::find($id);

        return view('registrations.show', compact('data'))
        ->with('success', 'Pendaftaran Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function show(Registration $registration)
    {

        $datas = Registration::where('registration_id', $registration->registration_id)->get();
        return view('registrations.showAdmin', compact('datas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function edit(Registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registration $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registration $registration)
    {
        //
    }

    public function acc(Request $request)
    {
        Registration::where('registration_id', $request->get('regid'))->update(['status' => 1, 'jadwal_tanding' => $request->get('jadwal_tanding')]);
        return redirect()->route('daftarAll')->with('success', 'Berhasil ditandai sebagai Diterima');
    }

    public function reject(Request $request)
    {
        Registration::where('registration_id', $request->get('regid'))->update(['status' => 2, 'jadwal_tanding' => $request->get('jadwal_tanding')]);
        return redirect()->route('daftarAll')->with('success', 'Berhasil ditandai sebagai Ditolak');
    }
}
