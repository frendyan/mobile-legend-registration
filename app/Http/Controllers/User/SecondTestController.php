<?php

namespace App\Http\Controllers;

use App\Models\FirstTest;
use App\Models\UserScore;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class SecondTestController extends Controller
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
        $isExist = UserScore::where('user_id', Auth::id())->where('test_category', 1)->count();
        if ($isExist>0) {
            return redirect()->route('guideThirdTest');
        }
        $firsttests = FirstTest::inRandomOrder()->get();
        $time = Setting::all();

        return view('firsttests.index', compact('firsttests', 'time'));
    }

    public function petunjuk()
    {

        return view('firsttests.guide');
    }

    public function submit(Request $request)
    {
        // dd($request);s
        $firsttests = FirstTest::all();
        $answer = $request->get('answer');
        $correct = 0;
        $incorrect = 0;
        $score = [];
        for ($i=0; $i <sizeof($answer) ; $i++) { 
            if ($firsttests[$i]->key == $answer[$i+1]) {
                $correct+=1;
            }else{
                $incorrect+=1;
            }
        }
        UserScore::create([
            'user_id' => Auth::user()->uname,
            'test_category' => '1',
            'correct' => $correct,
            'incorrect' => $incorrect,
        ]);

        return redirect()->route('guideThirdTest');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('firsttests.create');
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
            'question' => 'required|string',
            'opt_a' => 'required|string',
            'opt_b' => 'required|string',
            'opt_c' => 'required|string',
            'opt_d' => 'required|string',
            'opt_e' => 'required|string',
            'key' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg|max:1048',
            
        ]);

        // menyimpan data file yang diupload ke variabel $file
        if($request->hasFile('image')){ 

            $file = $request->file('image');
            $fileName = $request->file('image')->getClientOriginalName();

            $tujuan_upload = 'data_file/kepribadian/';

            $file->move($tujuan_upload,$file->getClientOriginalName());

            FirstTest::create(array_merge($request->all(), ['image'=>$request->file('image')->getClientOriginalName()]));

        }else FirstTest::create($request->all());

        return redirect()->route('indexFirstTest')
        ->with('success', 'Soal Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(FirstTest $firsttests)
    {
        // return view('firsttests.show', compact('firsttests'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test = FirstTest::find($id);
        return view('firsttests.edit', compact('test'));        

    }    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        $request->validate([
         'question' => 'required|string',
         'opt_a' => 'required|string',
         'opt_b' => 'required|string',
         'opt_c' => 'required|string',
         'opt_d' => 'required|string',
         'opt_e' => 'required|string',
         'key' => 'required|string',
            // 'image' => 'image|mimes:jpeg,png,jpg|max:1048',
     ]);
        
        if($request->hasFile('image')){ 
            $file = $request->file('image');
            $fileName = $request->file('image')->getClientOriginalName();

            $tujuan_upload = 'data_file';

            $file->move($tujuan_upload,$file->getClientOriginalName());

            DB::table('first_tests')
            ->where('id', $id)
            ->update([
                'question' => $request->get('question'),
                'opt_a' => $request->get('opt_a'),
                'opt_b' => $request->get('opt_b'),
                'opt_c' => $request->get('opt_c'),
                'opt_d' => $request->get('opt_d'),
                'opt_e' => $request->get('opt_e'),
                'key' => $request->get('key'),
                'image' => $request->file('image')->getClientOriginalName(),
            ]);
        }

        DB::table('first_tests')
        ->where('id', $id)
        ->update([
            'question' => $request->get('question'),
            'opt_a' => $request->get('opt_a'),
            'opt_b' => $request->get('opt_b'),
            'opt_c' => $request->get('opt_c'),
            'opt_d' => $request->get('opt_d'),
            'opt_e' => $request->get('opt_e'),
            'key' => $request->get('key'),
        ]);

        return redirect()->route('indexFirstTest')
        ->with('success', 'Data Soal Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test = FirstTest::find($id);
        $test->delete();

        return redirect()->route('indexFirstTest')
        ->with('success', 'Soal Berhasil Dihapus');
    }

    public function hapusGambar($id)
    {
        DB::table('first_tests')
        ->where('id', $id)
        ->update([
            'image' => null,
        ]);

        return redirect()->route('indexFirstTest')
        ->with('success', 'Gambar Berhasil Dihapus');
    }
}
