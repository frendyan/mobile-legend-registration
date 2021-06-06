<?php

namespace App\Http\Controllers;
use App\Models\FirstTest;
use App\Models\SecondTest;
use App\Models\ThirdTest;
use App\Exports\FirstTestExport;
use App\Exports\SecondTestExport;
use App\Exports\ThirdTestExport;
use App\Exports\TestResultExport;
use App\Exports\SenpiParticipantExport;
use App\Exports\TugasKhususParticipantExport;
use App\Exports\MappingPsikologiParticipantExport;
use App\Exports\RiwayatHidupExport;
use App\Exports\InventoryExport;
use App\Exports\KraeplinExport;
use App\Exports\ResultMappingRiwayatExport;
use App\Exports\ResultMappingKecerdasanExport;
use App\Exports\ResultMappingKecermatanExport;
use App\Exports\ResultMappingKepribadianExport;
use App\Exports\ResultSenpiRiwayatExport;
use App\Exports\ResultSenpiKecerdasanExport;
use App\Exports\ResultSenpiKecermatanExport;
use App\Exports\ResultSenpiKepribadianExport;
use App\Exports\ResultTugasRiwayatExport;
use App\Exports\ResultTugasKecerdasanExport;
use App\Exports\ResultTugasKecermatanExport;
use App\Exports\ResultTugasKepribadianExport;
use App\Exports\KecermatanTestExport;

use App\Imports\FirstTestImport;
use App\Imports\SecondTestImport;
use App\Imports\ThirdTestImport;
use App\Imports\SenpiParticipantImport;
use App\Imports\TugasKhususParticipantImport;
use App\Imports\MappingPsikologiParticipantImport;
use App\Imports\RiwayatHidupImport;
use App\Imports\InventoryImport;
use App\Imports\KraeplinImport;
use App\Imports\KecermatanTestImport;

use App\Models\SenpiParticipant;
use App\Models\TugasKhususParticipant;
use App\Models\MappingPsikologiParticipant;
use App\Models\RiwayatHidup;
use App\Models\Inventory;
use App\Models\User;
use App\Models\KecermatanTest;
use App\Models\Kraeplin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ImportExportController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function importExportView()
    {
      return view('excel.index');
  }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function exportExcel($type) 
    {
    	return \Excel::download(new FirstTestExport, 'Kepribadian.'.$type);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExcel(Request $request) 
    {
    	$request->validate([
    		'import_file' => 'required|mimes:csv,xls,xlsx',
    	]);
    	$validator = Validator::make(
    		[
    			'import_file'      => $request->import_file,
    			'extension' => strtolower($request->import_file->getClientOriginalExtension()),
    		],
    		[
    			'import_file'          => 'required',
    			'extension'      => 'required|in:csv,xlsx,xls',
    		]
    	);
    	FirstTest::truncate();
    	\Excel::import(new FirstTestImport,$request->import_file);

    	// \Session::put('success', 'Your file is imported successfully in database.');

    	return redirect()->route('indexFirstTest')
        ->with('success', 'Import data berhasil');
    	// return back();
    }

     ///////////////////////////////////////riwayat hidup///////////////////////////////////////////

    public function riwayatHidupExcelView()
    {
        return view('excel.indexRiwayat');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function riwayatHidupExport($type) 
    {
        return \Excel::download(new RiwayatHidupExport, 'Riwayat Hidup.'.$type);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function riwayatHidupImport(Request $request) 
    {
        $request->validate([
            'import_file' => 'required|mimes:csv,xls,xlsx',
        ]);
        $validator = Validator::make(
            [
                'import_file'      => $request->import_file,
                'extension' => strtolower($request->import_file->getClientOriginalExtension()),
            ],
            [
                'import_file'          => 'required',
                'extension'      => 'required|in:csv,xlsx,xls',
            ]
        );
        RiwayatHidup::truncate();
        \Excel::import(new RiwayatHidupImport,$request->import_file);

        // \Session::put('success', 'Your file is imported successfully in database.');

        return redirect()->route('indexRiwayatHidup')
        ->with('success', 'Import data berhasil');
        // return back();
    }

    ///////////////////////////////////////riwayat hidup///////////////////////////////////////////

    public function inventoryExcelView()
    {
        return view('excel.indexInventory');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function inventoryExport($type) 
    {
        return \Excel::download(new InventoryExport, 'Inventory.'.$type);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function inventoryImport(Request $request) 
    {
        $request->validate([
            'import_file' => 'required|mimes:csv,xls,xlsx',
        ]);
        $validator = Validator::make(
            [
                'import_file'      => $request->import_file,
                'extension' => strtolower($request->import_file->getClientOriginalExtension()),
            ],
            [
                'import_file'          => 'required',
                'extension'      => 'required|in:csv,xlsx,xls',
            ]
        );
        Inventory::truncate();
        \Excel::import(new InventoryImport,$request->import_file);

        // \Session::put('success', 'Your file is imported successfully in database.');

        return redirect()->route('indexInventory')
        ->with('success', 'Import data berhasil');
        // return back();
    }

     ///////////////////////////////////////kraeplin///////////////////////////////////////////

    public function kraeplinExcelView()
    {
        return view('excel.indexKraeplin');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function kraeplinExport($type) 
    {
        return \Excel::download(new KraeplinExport, 'Kraeplin.'.$type);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function kraeplinImport(Request $request) 
    {
        $request->validate([
            'import_file' => 'required|mimes:csv,xls,xlsx',
        ]);
        $validator = Validator::make(
            [
                'import_file'      => $request->import_file,
                'extension' => strtolower($request->import_file->getClientOriginalExtension()),
            ],
            [
                'import_file'          => 'required',
                'extension'      => 'required|in:csv,xlsx,xls',
            ]
        );
        Kraeplin::truncate();
        \Excel::import(new KraeplinImport,$request->import_file);

        // \Session::put('success', 'Your file is imported successfully in database.');

        return redirect()->route('indexKraeplin')
        ->with('success', 'Import data berhasil');
        // return back();
    }

    /////////////////////////////kecermatan//////////////////////////////////////

    public function kecermatanTestExcelView()
    {
        return view('excel.indexKecermatan');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function kecermatanTestExport($type) 
    {
        return \Excel::download(new KecermatanTestExport, 'Kecermatan.'.$type);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function kecermatanTestImport(Request $request) 
    {
        $request->validate([
            'import_file' => 'required|mimes:csv,xls,xlsx',
        ]);
        $validator = Validator::make(
            [
                'import_file'      => $request->import_file,
                'extension' => strtolower($request->import_file->getClientOriginalExtension()),
            ],
            [
                'import_file'          => 'required',
                'extension'      => 'required|in:csv,xlsx,xls',
            ]
        );
        KecermatanTest::truncate();
        \Excel::import(new KecermatanTestImport,$request->import_file);

        // \Session::put('success', 'Your file is imported successfully in database.');

        return redirect()->route('indexKecermatan')
        ->with('success', 'Import data berhasil');
        // return back();
    }

    ///////////////////////////////////////second test///////////////////////////////////////////

    public function secondTestExcelView()
    {
        return view('excel.index-dua');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function secondTestExport($type) 
    {
        return \Excel::download(new SecondTestExport, 'Kecerdasan.'.$type);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function secondTestImport(Request $request) 
    {
        $request->validate([
            'import_file' => 'required|mimes:csv,xls,xlsx',
        ]);
        $validator = Validator::make(
            [
                'import_file'      => $request->import_file,
                'extension' => strtolower($request->import_file->getClientOriginalExtension()),
            ],
            [
                'import_file'          => 'required',
                'extension'      => 'required|in:csv,xlsx,xls',
            ]
        );
        SecondTest::truncate();
        \Excel::import(new SecondTestImport,$request->import_file);

        // \Session::put('success', 'Your file is imported successfully in database.');

        return redirect()->route('indexSecondTest')
        ->with('success', 'Import data berhasil');
        // return back();
    }

    ///////////////////////////////////////third test///////////////////////////////////////////

    public function thirdTestExcelView()
    {
        return view('excel.index-tiga');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function thirdTestExport($type) 
    {
        return \Excel::download(new ThirdTestExport, 'Kecermatan.'.$type);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function thirdTestImport(Request $request) 
    {
        $request->validate([
            'import_file' => 'required|mimes:csv,xls,xlsx',
        ]);
        $validator = Validator::make(
            [
                'import_file'      => $request->import_file,
                'extension' => strtolower($request->import_file->getClientOriginalExtension()),
            ],
            [
                'import_file'          => 'required',
                'extension'      => 'required|in:csv,xlsx,xls',
            ]
        );
        ThirdTest::truncate();
        \Excel::import(new ThirdTestImport,$request->import_file);

        return redirect()->route('indexThirdTest')
        ->with('success', 'Import data berhasil');
        // return back();
    }

    ///////////////////////////////////////fourth test///////////////////////////////////////////

    public function fourthTestExcelView()
    {
        return view('excel.index-empat');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fourthTestExport($type) 
    {
        return \Excel::download(new FourthTestExport, 'Passhand.'.$type);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fourthTestImport(Request $request) 
    {
        $request->validate([
            'import_file' => 'required|mimes:csv,xls,xlsx',
        ]);
        $validator = Validator::make(
            [
                'import_file' => $request->import_file,
                'extension' => strtolower($request->import_file->getClientOriginalExtension()),
            ],
            [
                'import_file'    => 'required',
                'extension'      => 'required|in:csv,xlsx,xls',
            ]
        );
        FourthTest::truncate();
        \Excel::import(new FourthTestImport,$request->import_file);

        return redirect()->route('indexFourthtest')
        ->with('success', 'Import data berhasil');
        // return back();
    }

    /////////////////////////////////test result //////////////////////////////////////////////////
    public function TestScoreExport($type) 
    {
        return \Excel::download(new TestResultExport, 'Test Results.'.$type);
    }

    ///////////////////////////////////////peserta senpi///////////////////////////////////////////

    public function senpiParticipantExcelView()
    {
        return view('excel.indexPesertaSenpi');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function senpiParticipantExport($type) 
    {
        return \Excel::download(new SenpiParticipantExport, 'Peserta-Senpi.'.$type);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function senpiParticipantImport(Request $request) 
    {
        $request->validate([
            'import_file' => 'required|mimes:csv,xls,xlsx',
        ]);
        $validator = Validator::make(
            [
                'import_file' => $request->import_file,
                'extension' => strtolower($request->import_file->getClientOriginalExtension()),
            ],
            [
                'import_file'    => 'required',
                'extension'      => 'required|in:csv,xlsx,xls',
            ]
        );
        // SenpiParticipant::truncate();
        \Excel::import(new SenpiParticipantImport,$request->import_file);

        $senpiPts = SenpiParticipant::where('status', 5)->get();

        foreach ($senpiPts as $senpipt) {
            $username = strtoupper(substr(md5(rand()),0,5)).''.$senpipt->nrp;
            $pass = substr(md5(rand()),0,10);
            $hash = Hash::make($pass);

            User::create(['uname' => strval($username), 'name' => $senpipt->nama, 'remember_token' => Str::random(10), 'polres' => $senpipt->polres, 'test_type' => 'senpi', 'password_unhash' => $pass, 'password' => $hash]);
        }

        return redirect()->route('senpiparticipants.index')
        ->with('success', 'Import data berhasil');
        // return back();
    }

    ///////////////////////////////////////peserta tugas khusus///////////////////////////////////////////

    public function tugasKhususParticipantExcelView()
    {
        return view('excel.indexPesertaTugasKhusus');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function tugasKhususParticipantExport($type) 
    {
        return \Excel::download(new TugasKhususParticipantExport, 'Peserta-Tugas-Khusus.'.$type);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function tugasKhususParticipantImport(Request $request) 
    {
        $request->validate([
            'import_file' => 'required|mimes:csv,xls,xlsx',
        ]);
        $validator = Validator::make(
            [
                'import_file' => $request->import_file,
                'extension' => strtolower($request->import_file->getClientOriginalExtension()),
            ],
            [
                'import_file'    => 'required',
                'extension'      => 'required|in:csv,xlsx,xls',
            ]
        );
        // SenpiParticipant::truncate();
        \Excel::import(new TugasKhususParticipantImport,$request->import_file);

        $tugasPts = TugasKhususParticipantImport::where('status', 5)->get();

        foreach ($tugasPts as $tugaspt) {
            $username = strtoupper(substr(md5(rand()),0,5)).''.$tugaspt->nrp;
            $pass = substr(md5(rand()),0,10);
            $hash = Hash::make($pass);

            User::create(['uname' => strval($username), 'name' => $tugaspt->nama, 'remember_token' => Str::random(10), 'polres' => $tugaspt->polres, 'test_type' => 'tugas', 'password_unhash' => $pass, 'password' => $hash]);
        }

        return redirect()->route('tugaskhususparticipants.index')
        ->with('success', 'Import data berhasil');
        // return back();
    }

    ///////////////////////////////////////peserta mapping///////////////////////////////////////////

    public function mappingPsikologiParticipantExcelView()
    {
        return view('excel.indexPesertaMapping');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function mappingPsikologiParticipantExport($type) 
    {
        return \Excel::download(new SenpiParticipantExport, 'Peserta-Mapping.'.$type);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function mappingPsikologiParticipantImport(Request $request) 
    {
        $request->validate([
            'import_file' => 'required|mimes:csv,xls,xlsx',
        ]);
        $validator = Validator::make(
            [
                'import_file' => $request->import_file,
                'extension' => strtolower($request->import_file->getClientOriginalExtension()),
            ],
            [
                'import_file'    => 'required',
                'extension'      => 'required|in:csv,xlsx,xls',
            ]
        );
        // SenpiParticipant::truncate();
        \Excel::import(new MappingPsikologiParticipantImport,$request->import_file);

        $mappingPts = MappingPsikologiParticipantImport::where('status', 5)->get();

        foreach ($mappingPts as $mappingpt) {
            $username = strtoupper(substr(md5(rand()),0,5)).''.$mappingpt->nrp;
            $pass = substr(md5(rand()),0,10);
            $hash = Hash::make($pass);

            User::create(['uname' => strval($username), 'name' => $mappingpt->nama, 'remember_token' => Str::random(10), 'polres' => $mappingpt->polres, 'test_type' => 'mapping', 'password_unhash' => $pass, 'password' => $hash]);
        }

        return redirect()->route('mappingpsikologiparticipants.index')
        ->with('success', 'Import data berhasil');
        // return back();
    }


    //////////////////////////////////////////////export jawaban peserta ////////////////////////////////////////////////////

    //Mapping

    public function exportResultMappingRiwayat($type) 
    {
        return \Excel::download(new ResultMappingRiwayatExport, 'Jawaban-Peserta-Mapping-Riwayat.'.$type);
    }

    public function exportResultMappingInventory($type) 
    {
        return \Excel::download(new ResultMappingInventoryExport, 'Jawaban-Peserta-Mapping-Inventory.'.$type);
    }

    public function exportResultMappingKecerdasan($type) 
    {
        return \Excel::download(new ResultMappingKecerdasanExport, 'Jawaban-Peserta-Mapping-Kecerdasan.'.$type);
    }

    public function exportResultMappingKecermatan($type) 
    {
        return \Excel::download(new ResultMappingKecermatanExport, 'Jawaban-Peserta-Mapping-Kecermatan.'.$type);
    }

    public function exportResultMappingKepribadian($type) 
    {
        return \Excel::download(new ResultMappingKepribadianExport, 'Jawaban-Peserta-Mapping-Kepribadian.'.$type);
    }

    //Senpi

    public function exportResultSenpiRiwayat($type) 
    {
        return \Excel::download(new ResultSenpiRiwayatExport, 'Jawaban-Peserta-Senpi-Riwayat.'.$type);
    }
    public function exportResultSenpiInventory($type) 
    {
        return \Excel::download(new ResultSenpiInventoryExport, 'Jawaban-Peserta-Senpi-Inventory.'.$type);
    }

    public function exportResultSenpiKecerdasan($type) 
    {
        return \Excel::download(new ResultSenpiKecerdasanExport, 'Jawaban-Peserta-Senpi-Kecerdasan.'.$type);
    }

    public function exportResultSenpiKecermatan($type) 
    {
        return \Excel::download(new ResultSenpiKecermatanExport, 'Jawaban-Peserta-Senpi-Kecermatan.'.$type);
    }

    public function exportResultSenpiKepribadian($type) 
    {
        return \Excel::download(new ResultSenpiKepribadianExport, 'Jawaban-Peserta-Senpi-Kepribadian.'.$type);
    }

    //Tugas

    public function exportResultTugasRiwayat($type) 
    {
        return \Excel::download(new ResultTugasRiwayatExport, 'Jawaban-Peserta-Tugas-Riwayat.'.$type);
    }

    public function exportResultTugasInventory($type) 
    {
        return \Excel::download(new ResultTugasInventoryExport, 'Jawaban-Peserta-Tugas-Inventory.'.$type);
    }

    public function exportResultTugasKecerdasan($type) 
    {
        return \Excel::download(new ResultTugasKecerdasanExport, 'Jawaban-Peserta-Tugas-Kecerdasan.'.$type);
    }

    public function exportResultTugasKecermatan($type) 
    {
        return \Excel::download(new ResultTugasKecermatanExport, 'Jawaban-Peserta-Tugas-Kecermatan.'.$type);
    }

    public function exportResultTugasKepribadian($type) 
    {
        return \Excel::download(new ResultTugasKepribadianExport, 'Jawaban-Peserta-Tugas-Kepribadian.'.$type);
    }





}

