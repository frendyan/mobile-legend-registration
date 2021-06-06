<?php

namespace App\Http\Controllers;
use App\Models\FirstTest;
use App\Models\SecondTest;
use App\Models\ThirdTest;
use App\Exports\FirstTestExport;
use App\Exports\SecondTestExport;
use App\Exports\ThirdTestExport;
use App\Imports\FirstTestImport;
use App\Imports\SecondTestImport;
use App\Imports\ThirdTestImport;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;

class ImportExportController extends Controller
{
	public function importExportView()
	{
		return view('excel.index');
	}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function exportExcel($type) 
    {
    	return \Excel::download(new FirstTestExport, 'Kategori-Satu.'.$type);
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
        return \Excel::download(new SecondTestExport, 'Kategori-Dua.'.$type);
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
        return \Excel::download(new ThirdTestExport, 'Kategori-Tiga.'.$type);
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
}
