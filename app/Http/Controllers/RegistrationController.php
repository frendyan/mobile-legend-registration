<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
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
        $datas = Registration::all();
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
        // dd($request);
        // $this->validate($request, [
        //     'nik' => 'required|string',
        //     'nama' => 'required|string',
        //     'tempat_lahir' => 'required|string',
        //     'provinsi' => 'required|string',
        //     'kecamatan' => 'required|string',
        //     'kota' => 'required|string',
        //     'alamat' => 'required|string',
        //     'pos' => 'required|string',
        //     'telp' => 'required|string',
        //     'foto' => 'required|image|mimes:jpeg,png,jpg|max:1048',

        // ]);
        $rid = 'RID-'.time();

        for ($i=1; $i < 6; $i++) { 
            $r = new Registration();
            $r->registration_id = $rid;
            $r->nik = $request->get('nik'.$i);
            $r->team_name = $request->get('team_name');
            $r->nama = $request->get('nama'.$i);
            $r->tempat_lahir = $request->get('tempat_lahir'.$i);
            $r->provinsi = $request->get('provinsi'.$i);
            $r->kecamatan = $request->get('kecamatan'.$i);
            $r->kota = $request->get('kota'.$i);
            $r->alamat = $request->get('alamat'.$i);
            $r->pos = $request->get('pos'.$i);
            $r->telp = $request->get('telp'.$i);    
            $r->jk = $request->get('jk'.$i);    

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('foto'.$i);
            $fileName = $request->file('foto'.$i)->getClientOriginalName();
            $tujuan_upload = 'data_file/';

            $file->move($tujuan_upload, $file->getClientOriginalName());

            $r->foto = $request->file('foto'.$i)->getClientOriginalName();
            $r->status = 0;

            // $id = Registration::create(array_merge($request->all(), ['foto'=>$request->file('foto'.$i)->getClientOriginalName()]))->id;
            $r->save();
        }

        // $id = Registration::create(array_merge($request->all(), ['foto'=>$request->file('foto')->getClientOriginalName()]))->id;

        $datas = Registration::where('team_name',$request->get('team_name'))->get();
        $team_name = $request->get('team_name');
        return redirect()->route('daftarDetail', ['team_name' => $team_name])->with('message', 'Pendaftaran Berhasil!!!');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function show($team_name)
    {
        dd($team_name);
        return view('registrations.show', compact('datas'));
    }

    public function showData(Request $request)
    {
        // dd($request);
        $datas = Registration::where('team_name', $request->get('team_name'))->get();
        return view('registrations.show', compact('datas'));
    }
    public function showCard($regid)
    {
        // dd($request);
        $datas = Registration::where('registration_id', $regid)->get();
        return view('card.card', compact('datas'));
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

    public function konfirmasi(){

        $datas= Registration::where('registration_id', 'apc')->get();
        return view('registrations.viewKonfirmasi', compact('datas'));

    }

    public function searchKonfirmasi(Request $request){

        // dd($request);

        $datas = DB::select("select registration_id, team_name, status, jadwal_tanding from registrations where registration_id = '".$request->rid."' group by jadwal_tanding, registration_id, team_name, status");

        $datasCount = Registration::where('registration_id', $request->rid)->count();

        if($datasCount < 1){
            return view('registrations.viewKonfirmasi', compact('datas'))->with('success', 'ID Registrasi Tidak Ditemukan');
        } else{
            return view('registrations.viewKonfirmasi', compact('datas'));
        }

// dd($data);


    }
}
