<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class testing extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'block:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'block user after 1x24';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     *
     *
     * crontab -e
     * * * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
     *
     */
    public function handle()
    {
        $datas = DB::table('pairings')->where('date_expired', '<', now())->where('status', 0)->get();

        foreach ($datas as $data) {
            $investOrders = DB::table('invest_orders')->where('id', $data->invest_order_id)->first();
            $withdraws = DB::table('withdraws')->where('id', $data->withdraw_id)->first();

            //disable user
            DB::table('users')->where('id', $investOrders->user_id)
            ->update([
                'active' => 0,
            ]);

            //set pairing status to expired
            DB::table('pairings')->where('id', $data->id)
            ->update([
                'status' => 4,
            ]);

            //set withdraw status to 0
            DB::table('withdraws')->where('id', $data->withdraw_id)
            ->update([
                'status' => 0,
                'amount_left' => $withdraws->amount_left + $data->amount,
            ]);

            //set invest_order status to expired
            DB::table('invest_orders')->where('id', $data->invest_order_id)
            ->update([
                'status' => 3,
            ]);
        }
    }
}
