<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Library;
use Dotenv\Parser\ParserInterface;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use App\Models\Bill;
use App\Models\ProBill;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        function cal_total($day){
            $total = 0;
            foreach ($day as $bill_today){
                $product_today = DB::table('pro-bill')->where('bill_id', $bill_today->id)->get();
                foreach ($product_today as $pt){
                    $total += $pt->pro_amount * $pt->pro_cur_price;
                }
            }
            return $total;
        }

        $today = today();
        $yesterday = Carbon::yesterday();

        $bill_today = DB::table('bill')->where('bill_payment', $today)->get();
        $bill_yesterday = DB::table('bill')->where('bill_payment', $yesterday)->get();

        $total_today = cal_total($bill_today);
        $total_yesterday = cal_total($bill_yesterday);

        $client_today = DB::table('bill')
             ->select('cus_id')
             ->where('bill_payment', $today)
             ->distinct()
             ->get();

        $client_yesterday = DB::table('bill')
            ->select('cus_id')
             ->where('bill_payment', $yesterday)
             ->distinct()
             ->get();


        $import_today = DB::table('bill')->where('bill_payment', $today)->where('type', 0)->get();
        $import_yesterday = DB::table('bill')->where('bill_payment', $yesterday)->where('type', 0)->get();
        $import_total_today = cal_total($import_today);
        $import_total_yesterday = cal_total($import_yesterday);

        $export_today = DB::table('bill')->where('bill_payment', $today)->where('type', 1)->get();
        $export_yesterday = DB::table('bill')->where('bill_payment', $yesterday)->where('type', 1)->get();
        $export_total_today = cal_total($export_today);
        $export_total_yesterday = cal_total($export_yesterday);


        $now = Carbon::now();
        $total_5_days = [];
        $import_5_days = [];
        $export_5_days = [];

        for ($i = 0; $i <= 4; $i++) {
            $theday = $now->subDays($i)->format('Y-m-d');
            $lastFiveDays_total = DB::table('bill')->where('bill_payment', $theday)->get();
            $lastFiveDays_import = DB::table('bill')->where('bill_payment', $theday)->where('type', 0)->get();
            $lastFiveDays_export = DB::table('bill')->where('bill_payment', $theday)->where('type', 1)->get();
            array_unshift($total_5_days, cal_total($lastFiveDays_total));
            array_unshift($import_5_days, cal_total($lastFiveDays_import));
            array_unshift($export_5_days, cal_total($lastFiveDays_export));
        }
        $jtotal_5_days = json_encode($total_5_days);
        $jimport_5_days = json_encode($import_5_days);
        $jexport_5_days = json_encode($export_5_days);


        return view('welcome', compact('client_today','client_yesterday','jtotal_5_days','jimport_5_days','jexport_5_days','total_5_days','import_5_days','export_5_days'));
    }

}
