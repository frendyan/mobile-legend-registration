<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

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
        return view('registrations.show');
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
}
