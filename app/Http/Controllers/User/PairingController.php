<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\InvestOrder;
use App\Models\InvestPackage;
use App\Models\Network;
use App\Models\Notification;
use App\Models\Pairing;
use App\Models\User;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PairingController extends Controller
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
        $pairings = DB::table('pairings as p')
            ->join('invest_orders as io', 'p.invest_order_id', '=', 'io.id')
            ->join('withdraws as w', 'p.withdraw_id', '=', 'w.id')
            ->join('invest_packages as ip', 'io.invest_package_id', '=', 'ip.id')
            ->join('users as u', 'io.user_id', '=', 'u.id')
            ->join('users as a', 'w.user_id', '=', 'a.id')
            ->select('p.*', 'ip.id as package_id', 'ip.name as package_name', 'u.name as from_name', 'u.id as from_id', 'a.name as to_name', 'a.id as to_id')
            ->orderBy('status', 'desc')
            ->get();

        return view('pairings.index', compact('pairings'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = DB::table('invest_orders as io')
            ->orderBy('io.id', 'asc')
            ->join('users as u', 'io.user_id', '=', 'u.id')
            ->join('bank_accounts as ba', 'ba.user_id', '=', 'io.user_id')
            ->join('invest_packages as ip', 'ip.id', '=', 'io.invest_package_id')
            ->select('io.*', 'u.name as user_name', 'ba.bank_name', 'ip.name as package_name')
            ->where('io.status', 0)
            ->get();

        $withdraws = DB::table('withdraws as w')
            ->orderBy('w.id', 'asc')
            ->join('users as u', 'w.user_id', '=', 'u.id')
            ->join('bank_accounts as ba', 'ba.user_id', '=', 'w.user_id')
            ->select('w.*', 'u.name as user_name', 'ba.bank_name')
            ->where('w.status', 0)
            ->get();

        return view('pairings.create', compact('orders', 'withdraws'))
                ->with('i', (request()->input('page', 1) - 1) * 5)
                ->with('j', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'withdraw_id' => 'required',
            'pairAmount' => 'required|numeric',
        ]);

        $withdraw = explode('|', $request->get('withdraw_id')); //id|amount
        $order = explode('|', $request->get('order_id')); //id|amount
        $pairAmount = $request->get('pairAmount');
        $tomorrow = Carbon::now()->addDay();

        if ($withdraw[2] == $order[2]) {
            return redirect()->route('pairings.create')
                ->with('fail', 'Cannot Pair to Same User');
        }

        if ($pairAmount > $order[1]) {
            return redirect()->route('pairings.create')
                ->with('fail', 'Transfer amount exceeds Invest Amount left');
        }

        if ($pairAmount > $withdraw[1]) {
            return redirect()->route('pairings.create')
                ->with('fail', 'Maximum transfer amount for this user is '.number_format($withdraw[1], 0, ',', '.'));
        }

        $orderAmountLeft = $order[1] - $pairAmount;
        $wdAmountLeft = $withdraw[1] - $pairAmount;

        if ($orderAmountLeft == 0) {
            // set order status to paired
            DB::table('invest_orders')
            ->where('id', $order[0])
            ->update([
                'amount_left' => $orderAmountLeft,
                'status' => 1
            ]);
        } else {
            DB::table('invest_orders')
            ->where('id', $order[0])
            ->update([
                'amount_left' => $orderAmountLeft
            ]);
        }

        if ($wdAmountLeft == 0) {
            // set wd status to paired
            DB::table('withdraws')
            ->where('id', $withdraw[0])
            ->update([
                'amount_left' => $wdAmountLeft,
                'status' => 1
            ]);
        } else {
            DB::table('withdraws')
            ->where('id', $withdraw[0])
            ->update([
                'amount_left' => $wdAmountLeft
            ]);
        }

        Pairing::create([
            'invest_order_id' => $order[0],
            'withdraw_id' => $withdraw[0],
            'from_user_id' => $request->get('withdraw_id'),
            'to_user_id' => $request->get('withdraw_id'),
            'amount' => $pairAmount,
            'date_expired' => $tomorrow,
        ]);

        $userGetBank = BankAccount::firstOrFail()->where('user_id', $withdraw[2])->get();
        $subset = $userGetBank->map->only(['bank_name', 'no_rek']);

        $formattedAmount = number_format($pairAmount, 0, ',', '.');
        $message = 'Mohon Transfer ke ' . $subset[0]['bank_name'] . ' - ' . $subset[0]['no_rek'] . ' sebesar ' . $formattedAmount . ' untuk menyelesaikan transaksi [' . $order[3] . ']. Lihat menu Transfer List untuk mengunggah bukti transfer.';
        Notification::create([
            'user_id' => $order[2],
            'title' => 'Info Transfer',
            'body' => $message,
            'status' => 0,
            'type' => 1,
        ]);

        return redirect()->route('pairings.create')
                        ->with('success', 'Pairing created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pairing  $pairing
     * @return \Illuminate\Http\Response
     */
    public function show(Pairing $pairing)
    {
        return view('pairings.show', compact('pairing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pairing  $pairing
     * @return \Illuminate\Http\Response
     */
    public function edit(Pairing $pairing)
    {
        return view('pairings.edit', compact('pairing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pairing  $pairing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pairing $pairing)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $pairing->update($request->all());

        return redirect()->route('pairings.index')
                        ->with('success', 'Pairing updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pairing  $pairing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pairing $pairing)
    {
        $pairing->delete();

        return redirect()->route('pairings.index')
                        ->with('success', 'Pairing deleted successfully');
    }

    public function markProcessed(Request $request)
    {
        $packageGetMin = InvestPackage::firstOrFail()->where('id', $request->get('package_id'))->get();
        $subset = $packageGetMin->map->only(['min_amount', 'max_amount']);

        $transferredAmount = $subset[0]['max_amount'] - $request->get('amount_left');

        if ($transferredAmount < $subset[0]['min_amount']) {
            $transferRequiredLeft = $subset[0]['min_amount'] - $transferredAmount;
            return redirect()->route('pairings.create')
                        ->with('fail', 'Mark as processed FAILED. This user needs to transfer another ' . number_format($transferRequiredLeft, 0, ',', '.') . ' to be able to be marked as processed !');
        } else {
            DB::table('invest_orders')
            ->where('id', $request->get('order_id'))
            ->update([
                'status' => 1
            ]);
        }
        return redirect()->route('pairings.create')
                        ->with('Success', $request->get('user_name') . ' invest order status has been mark as processed');
    }

    public function markDone(Request $request)
    {
        $orderId = $request->get('order_id');
        $fromUserId = $request->get('from_user_id');
        $packageId = $request->get('package_id');
        $pairingId = $request->get('pairing_id');

        // set status to 2
        DB::table('pairings')
            ->where('id', $pairingId)
            ->update([
                'status' => 2
            ]);

        $countRemainingRecord = Pairing::where('invest_order_id', '=', $orderId)
               ->where(function ($query) {
                   $query->where('status', '=', 0)
                   ->orWhere('status', '=', 1);
               })->count();

        $orderStatus = InvestOrder::where('id', '=', $orderId)
        ->where(function ($query) {
            $query->where('status', '=', 0);
        })->count();

        $countRemainingRecord = 0;
        // dd($countRemainingRecord);

        if ($countRemainingRecord == 0 && $orderStatus == 0) {
            //set user active package
            DB::table('active_packages')
            ->where('user_id', $fromUserId)
            ->update([
                'invest_package_id' => $packageId,
                'status' => 1,
                'date_active' => now(),
                'date_expired' => now()->addWeek(),
            ]);

            //get transfer amount
            $amount = DB::table('pairings')->where('invest_order_id', $orderId)->sum('amount');

            //get profit percentage
            $packageGetProfit = InvestPackage::firstOrFail()->where('id', $orderId)->get();
            $subsetProfit = $packageGetProfit->map->only(['profit']);

            //get User Bank Data
            $packageGetBank = BankAccount::firstOrFail()->where('user_id', $fromUserId)->get();
            $subsetBank = $packageGetBank->map->only(['bank_name', 'no_rek']);

            //get User Layer
            $packageGetNetwork = Network::firstOrFail()->where('user_id', $fromUserId)->get();
            $subsetNetwork = $packageGetNetwork->map->only(['layer']);

            //create withdraw for current user
            Withdraw::create([
                'user_id' => $fromUserId,
                'wd_code' => 'WDR-' . intVal(microtime(true) * 1000),
                'date_created' => now(),
                'amount' => $amount + ($amount * $subsetProfit[0]['profit'] / 100),
                'amount_left' => $amount + ($amount * $subsetProfit[0]['profit'] / 100),
                'withdraw_type' => 1,
                'withdraw_to' => $subsetBank[0]['bank_name'] . ' - ' . $subsetBank[0]['no_rek'],
                // 'status' => 0,
            ]);

            // dd($subsetNetwork[0]['layer']);
            //check current user layer
            if ($subsetNetwork[0]['layer'] > 1) {
                $userid = $fromUserId;

                //add bonus for current user upline(s)
                for ($i = $subsetNetwork[0]['layer'] - 1; $i > 0; $i--) {
                    $packageGetUpline = Network::firstOrFail()->where('user_id', $userid)->get();
                    $subsetUpline = $packageGetUpline->map->only(['upline_id']);

                    $upline_id = $subsetUpline[0]['upline_id'];
                    // dd($upline_id);

                    $upline_data = User::firstOrFail()->where('id', $upline_id)->get();
                    $subsetUplineData = $upline_data->map->only(['level', 'bonus_total', 'bonus_manajer_total']);

                    $bonusForUpline = 0.1 * ($amount * $subsetProfit[0]['profit'] / 100);

                    if ($subsetUplineData[0]['level'] == 'member') {
                        $bonusTotal = $subsetUplineData[0]['bonus_total'] + $bonusForUpline;
                        DB::table('users')
                        ->where('id', $upline_id)
                        ->update([
                            'bonus_total' => $bonusTotal,
                        ]);
                    } elseif ($subsetUplineData[0]['level'] == 'manajer1') {
                        $bonusManajer1 = 0.05 * ($amount * $subsetProfit[0]['profit'] / 100);
                        $bonusManajerTotal = $subsetUplineData[0]['bonus_manajer_total'] + $bonusManajer1;
                        $bonusTotal = $subsetUplineData[0]['bonus_total'] + $bonusForUpline;
                        DB::table('users')
                        ->where('id', $upline_id)
                        ->update([
                            'bonus_total' => $bonusTotal,
                            'bonus_manajer_total' => $bonusManajerTotal,
                        ]);
                        break;
                    } elseif ($subsetUplineData[0]['level'] == 'manajer2') {
                        $bonusManajer2 = 0.03 * ($amount * $subsetProfit[0]['profit'] / 100);
                        $bonusManajerTotal = $subsetUplineData[0]['bonus_manajer_total'] + $bonusManajer2;
                        $bonusTotal = $subsetUplineData[0]['bonus_total'] + $bonusForUpline;
                        DB::table('users')
                        ->where('id', $upline_id)
                        ->update([
                            'bonus_total' => $bonusTotal,
                            'bonus_manajer_total' => $bonusManajerTotal,
                        ]);
                        break;
                    } elseif ($subsetUplineData[0]['level'] == 'manajer3') {
                        $bonusManajer3 = 0.01 * ($amount * $subsetProfit[0]['profit'] / 100);
                        $bonusManajerTotal = $subsetUplineData[0]['bonus_manajer_total'] + $bonusManajer3;
                        $bonusTotal = $subsetUplineData[0]['bonus_total'] + $bonusForUpline;
                        DB::table('users')
                        ->where('id', $upline_id)
                        ->update([
                            'bonus_total' => $bonusTotal,
                            'bonus_manajer_total' => $bonusManajerTotal,
                        ]);
                        break;
                    }
                }
            }
        }

        return redirect()->route('pairings.index')
                        ->with('Success', 'Confirmation success');
    }
}
