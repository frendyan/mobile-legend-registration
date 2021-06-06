<?php

namespace App\Http\Controllers;

use App\Models\FirstTest;
use App\Models\SecondTest;
use App\Models\UserScore;
use App\Models\UserAnswer;
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
        $firsttests = FirstTest::all();

        return view('firsttests.index', compact('firsttests'));
        // ->with('i', (request()->input('page', 1) - 1) * 10);
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

            $tujuan_upload = 'data_file/kepribadian';

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


    ////////////////////user/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////user/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////user/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////user/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////user/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

     public function indexUser()
    {
        $isExist = UserScore::where('user_id', Auth::id())->where('test_category', 2)->count();
        if ($isExist>0) {
            return redirect()->route('userpages.guideSecondTest');
        }
        $secondtests = SecondTest::inRandomOrder()->get();
        $time = Setting::all();

        return view('userpages.secondtests.index', compact('secondtests', 'time'));
    }
    public function petunjuk()
    {

        return view('userpages.secondtests.guide');
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
        $answerStr = "";

        for ($i=0; $i < $count ; $i++) { 
            $answer = $request->get('answer'.($i+1));

            if (sizeof($answer)==1) {
                $incorrect+=1;
                if ($i == $count-1) {
                    $answerStr = $answerStr.strval($i+1).' : Tidak Diisi';

                }else{
                    $answerStr = $answerStr.strval($i+1).' : Tidak Diisi | ';
                }
            }else {
                array_pop($answer);
                $implode = implode(" ", $answer);
                if ($implode == $secondtests[$i]->key) {
                    $correct+=1;
                }else $incorrect+=1;

                if ($i == $count-1) {
                    $answerStr = $answerStr.strval($i+1).' : '.$implode;    
                }else{
                    $answerStr = $answerStr.strval($i+1).' : '.$implode.' | ';
                }

            }

        }

        UserAnswer::create([
            'user_id' => strval(Auth::user()->uname),
            'test_category' => '2',
            'test_type' => Auth::user()->test_type,
            'user_answers' => $answerStr,
        ]);

        UserScore::create([
            'user_id' => strval(Auth::user()->uname),
            'test_type' => Auth::user()->test_type,
            'test_category' => '2',
            'correct' => $correct,
            'incorrect' => $incorrect,
        ]);

        return redirect()->route('guideSecondTest');
    }
}
