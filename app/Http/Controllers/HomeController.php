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

        $total_5_days = [];
        $import_5_days = [];
        $export_5_days = [];

        for ($i = 0; $i <= 4; $i++) {
            $now = Carbon::today();
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

        $total_pro_name = [];
        $total_pro_quantity = [];
        $pro_name = Product::select('pro_name','pro_quantity')->orderBy('pro_quantity','desc')->limit(5)->get();

        foreach ($pro_name as $pro){
            array_unshift($total_pro_name, $pro->pro_name);
            array_unshift($total_pro_quantity, $pro->pro_quantity);
        }
        $jpro_name = json_encode($total_pro_name);
        $jpro_quantity = json_encode($total_pro_quantity);

        $total_product_name = [];
        $total_product_quantity = [];

        $pro_id_cat = DB::table('pro-bill')->select('pro_id')->distinct()->get();
        foreach($pro_id_cat as $procat){
            $total_procat_1 = 0;
            $procat_quantity = DB::table('pro-bill')->where('pro_id', $procat->pro_id)->get();
            foreach($procat_quantity as $procat_quan){
                $total_procat_1 += $procat_quan->pro_amount;
            }
            $procat_name = DB::table('product')->where('id', $procat->pro_id)->get();
            foreach($procat_name as $procat_na){
                $total_product_name[] = $procat_na->pro_name;
            }

            $total_product_quantity[] = $total_procat_1;
        }

        $diction_product = array_combine($total_product_name, $total_product_quantity);
        arsort($diction_product);

        $jtotal_product_name = json_encode(array_slice(array_keys($diction_product), 0, 5));
        $jtotal_product_quantity = json_encode(array_slice(array_values($diction_product), 0, 5));

        $clients = DB::table('bill')
            ->select('cus_id', DB::raw('count(*) as count'))
            ->groupBy('cus_id')
            ->get();

        $name_clients = [];
        $total_clients = [];
        foreach ($clients as $client){
            $b_id = DB::table('bill')->where('cus_id',$client->cus_id)->get();
            $client_value = 0;
            $client_value += cal_total($b_id);
            $c_name = DB::table('customer')->where('id',$client->cus_id)->get();
            $name_clients[] = $c_name[0]->cus_name;
            $total_clients[] = $client_value;
        }
        $diction_client = array_combine($name_clients, $total_clients);
        arsort($diction_client);

        $jname_clients = array_slice(array_keys($diction_client), 0, 4);
        $jtotal_clients = array_slice(array_values($diction_client), 0, 4);

        $staff = DB::table('bill')
            ->select('user_id', DB::raw('count(*) as count'))
            ->groupBy('user_id')
            ->orderBy('count','desc')
            ->limit(4)
            ->get();



        return view('welcome', compact('client_today','client_yesterday',
        'jtotal_5_days','jimport_5_days','jexport_5_days','total_5_days',
        'import_5_days','export_5_days','jpro_name','jpro_quantity','jtotal_product_name',
        'jtotal_product_quantity','jname_clients','jtotal_clients','clients','staff'));
    }

}
