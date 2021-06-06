<?php

namespace App\Http\Controllers;

use App\Models\SecondTest;
use App\Models\UserScore;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;


class FirstTestController extends Controller
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
        $isExist = UserScore::where('user_id', Auth::id())->where('test_category', 2)->count();
        if ($isExist>0) {
            return redirect()->route('guideSecondTest');
        }
        $secondtests = SecondTest::inRandomOrder()->get();
        $time = Setting::all();

        return view('secondtests.index', compact('secondtests', 'time'));
    }
    public function petunjuk()
    {

        return view('secondtests.guide');
    }

    public function submit(Request $request)
    {
        // dd($request);
        // dd($request->get('answer'.$i));
        $secondtests = SecondTest::all();
        $count = SecondTest::count();
        // dd($count);
        $correct = 0;
        $incorrect = 0;

        for ($i=0; $i < $count ; $i++) { 
            $answer = $request->get('answer'.($i+1));

            if (sizeof($answer)==1) {
                $incorrect+=1;
            }else {
                array_pop($answer);
                $implode = implode(" ", $answer);
                if ($implode == $secondtests[$i]->key) {
                    $correct+=1;
                }else $incorrect+=1;

            }

        }
        UserScore::create([
            'user_id' => strval(Auth::user()->uname),
            'test_category' => '2',
            'correct' => $correct,
            'incorrect' => $incorrect,
        ]);

        return redirect()->route('guideSecondTest');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('secondtests.create');

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
            'key' => 'required|array',
            'image' => 'image|mimes:jpeg,png,jpg|max:1048',
            
        ]);

        // menyimpan data file yang diupload ke variabel $file
        if($request->hasFile('image')){ 

            $file = $request->file('image');
            $fileName = $request->file('image')->getClientOriginalName();

            $tujuan_upload = 'data_file/kecerdasan/';

            $file->move($tujuan_upload,$file->getClientOriginalName());

            SecondTest::create(array_merge($request->all(), ['image'=>$request->file('image')->getClientOriginalName(), 'key'=>implode(" ",$request->key)]));

        }else SecondTest::create(array_merge($request->all(), ['key'=>implode(" ",$request->key)]));

        return redirect()->route('indexSecondTest')
        ->with('success', 'Soal Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SecondTest  $secondtest
     * @return \Illuminate\Http\Response
     */
    public function show(SecondTest $secondtest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SecondTest  $secondtest
     * @return \Illuminate\Http\Response
     */
    public function edit(SecondTest $secondtest)
    {
        $keyArr = explode(" ", $secondtest->key);
        return view('secondtests.edit', compact('secondtest', 'keyArr'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SecondTest  $secondtest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
           'question' => 'required|string',
           'opt_a' => 'required|string',
           'opt_b' => 'required|string',
           'opt_c' => 'required|string',
           'opt_d' => 'required|string',
           'opt_e' => 'required|string',
           'key' => 'required|array',
            // 'image' => 'image|mimes:jpeg,png,jpg|max:1048',
       ]);
        
        if($request->hasFile('image')){ 
            $file = $request->file('image');
            $fileName = $request->file('image')->getClientOriginalName();

            $tujuan_upload = 'data_file';

            $file->move($tujuan_upload,$file->getClientOriginalName());

            DB::table('second_tests')
            ->where('id', $id)
            ->update([
                'question' => $request->get('question'),
                'opt_a' => $request->get('opt_a'),
                'opt_b' => $request->get('opt_b'),
                'opt_c' => $request->get('opt_c'),
                'opt_d' => $request->get('opt_d'),
                'opt_e' => $request->get('opt_e'),
                'key'=> implode(" ",$request->key),
                'image' => $request->file('image')->getClientOriginalName(),
            ]);
        }

        DB::table('second_tests')
        ->where('id', $id)
        ->update([
            'question' => $request->get('question'),
            'opt_a' => $request->get('opt_a'),
            'opt_b' => $request->get('opt_b'),
            'opt_c' => $request->get('opt_c'),
            'opt_d' => $request->get('opt_d'),
            'opt_e' => $request->get('opt_e'),
            'key'=>implode(" ",$request->key),
        ]);

        return redirect()->route('indexSecondTest')
        ->with('success', 'Data Soal Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SecondTest  $secondtest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test = SecondTest::find($id);
        $test->delete();

        return redirect()->route('indexSecondTest')
        ->with('success', 'Soal Berhasil Dihapus');
    }

    public function hapusGambar($id)
    {
        DB::table('second_tests')
        ->where('id', $id)
        ->update([
            'image' => null,
        ]);

        return redirect()->route('indexSecondTest')
        ->with('success', 'Gambar Berhasil Dihapus');
    }
}
