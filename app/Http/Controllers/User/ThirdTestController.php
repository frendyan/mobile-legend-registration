<?php

namespace App\Http\Controllers;

use App\Models\ThirdTest;
use App\Models\UserScore;
use App\Models\Setting;
use Illuminate\Http\Request;
use Auth;

class ThirdTestController extends Controller
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

        // $first = ThirdTest::where('id', 1)->orderBy('column', 'ASC')->get();
        // $count = ThirdTest::count();
        $isExist = UserScore::where('user_id', Auth::id())->where('test_category', 3)->count();
        if ($isExist>0) {
            return redirect()->route('result');
        }

        $thirdtests = ThirdTest::inRandomOrder()->get();
        $maxColumn = ThirdTest::max('column');
        $maxCol = ThirdTest::orderBy('column', 'DESC')->first();
        $maxSoal = ThirdTest::where('column', 1)->count();
        $time = Setting::all();

        // dd($thirdtests);

        return view('thirdtests.index', compact('thirdtests', 'time', 'maxColumn', 'maxSoal', 'maxCol'));
    }

    public function petunjuk()
    {

        return view('thirdtests.guide');
    }

    public function submit(Request $request)
    {
        // dd($request);
        $answerArr = explode(",", $request->get('answerArr'));
        $thirdtests = ThirdTest::orderBy('id', 'ASC')->get();
        $count = ThirdTest::count();

        $correct = 0;
        
        $score = [];
        $idSoal = $request->get('idSoal');
        for ($i=0; $i<sizeof($answerArr) ; $i++) { 
            $index = $idSoal[$i];

            if ($thirdtests[$index-1]->key == $answerArr[$i]) {
                $correct+=1;
            }
        }
        $incorrect = $count - $correct;
        // dd($incorrect);
        UserScore::create([
            'user_id' => Auth::user()->uname,
            'test_category' => '3',
            'correct' => $correct,
            'incorrect' => $incorrect,
        ]);

        return redirect()->route('result');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('thirdtests.create');
    }

    public function result()
    {
        $firstscore = UserScore::where('user_id', Auth::id())->where('test_category', 1)->get();
        $secondscore = UserScore::where('user_id', Auth::id())->where('test_category', 2)->get();
        $thirdscore = UserScore::where('user_id', Auth::id())->where('test_category', 3)->get();
        return view('thirdtests.result', compact('firstscore', 'secondscore', 'thirdscore'));
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
        'question' => 'required',
        'column' => 'required',
        'opt_a' => 'required',
        'opt_b' => 'required',
        'opt_c' => 'required',
        'opt_d' => 'required',
        'opt_e' => 'required',
        'key' => 'required',
            // 'image' => 'image|mimes:jpeg,png,jpg|max:1048',

    ]);

        // menyimpan data file yang diupload ke variabel $file
       ThirdTest::create(array_merge($request->all(), ['question'=>implode(" ",$request->question)]));
       return redirect()->route('indexThirdTest')
       ->with('success', 'Soal Berhasil Disimpan');
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ThirdTest  $thirdTest
     * @return \Illuminate\Http\Response
     */
    public function show(ThirdTest $thirdTest)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ThirdTest  $thirdTest
     * @return \Illuminate\Http\Response
     */
    public function edit(ThirdTest $thirdtest)
    {
        $question = explode(" ", $thirdtest->question);
        return view('thirdtests.edit', compact('thirdtest', 'question'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ThirdTest  $thirdTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ThirdTest $thirdtest)
    {
        $request->validate([
           'question' => 'required',
           'column' => 'required',
           'opt_a' => 'required',
           'opt_b' => 'required',
           'opt_c' => 'required',
           'opt_d' => 'required',
           'opt_e' => 'required',
           'key' => 'required',
       ]);

        $thirdtest->update(array_merge($request->all(),['question'=>implode(" ",$request->question)]));

        return redirect()->route('thirdtests.index')
        ->with('success','Data Soal Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ThirdTest  $thirdTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(ThirdTest $thirdtest)
    {
        $thirdtest->delete();

        return redirect()->route('thirdtests.index')
        ->with('success','Soal Berhasil Dihapus');
    }
}
