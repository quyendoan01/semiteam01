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


class BillController extends Controller
{
    public function bill()
    {
        $bill = DB::table('bill')
           ->select(DB::raw('MONTH(bill_payment) as month'), DB::raw('COUNT(*) as count'))
           ->groupBy(DB::raw('MONTH(bill_payment)'))
           ->orderByRaw('month DESC')
           ->paginate(1);
        return view('bill.bill', compact('bill'));
    }
    public function add_bill()
    {
        $product = Product::latest()->paginate(16);
        $customer = Customer::all();
        $bidcount = DB::table('bill')->count();
        if ($bidcount <= 0) {
            $bid = 1;
        } else {
            $bid = DB::table('bill')->max('id');
            $bid += 1;
        }

        return view('bill.add', compact('product', 'customer', 'bid'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function store_bill(Request $request)
    {
        if ($request->isMethod('POST')) {

            if ($request->type == 0) {
                $newBill = new Bill();
                $newBill->type = $request->type;
                $newBill->bill_payment = $request->date;
                $newBill->cus_id = $request->cus_id;
                $newBill->user_id = $request->user_id;

                $newBill->save();

                $productName = $request->pro_name;
                $proAmount = $request->pro_amount;
                $currentPrice = $request->current_price;
                $split = ",";

                $productNameArr = explode($split, $productName);
                $proAmountArr = explode($split, $proAmount);
                $currentPriceArr = explode($split, $currentPrice);

                for ($i = 0; $i < count($proAmountArr); $i++) {
                    $newProBill = new ProBill();

                    $newProBill->pro_id = $productNameArr[$i];
                    $newProBill->bill_id = $newBill->id;
                    $newProBill->pro_amount = $proAmountArr[$i];
                    $newProBill->pro_cur_price = $currentPriceArr[$i];

                    $newProBill->save();

                    DB::table('product')->where('id', $productNameArr[$i])->increment('pro_quantity', $proAmountArr[$i]);
                }
                return redirect()->route('show_bill', $newBill->id)
                    ->with('success', 'Bill create successfully');
            } else {
                $productName = $request->pro_name;
                $proAmount = $request->pro_amount;
                $currentPrice = $request->current_price;
                $split = ",";

                $productNameArr = explode($split, $productName);
                $proAmountArr = explode($split, $proAmount);
                $currentPriceArr = explode($split, $currentPrice);

                $checked = True;

                for ($i = 0; $i < count($proAmountArr); $i++) {
                    $check_quan = DB::table('product')->where('id', $productNameArr[$i])->first();
                    if ($check_quan->pro_quantity < $proAmountArr[$i]) {
                        $checked = False;
                        session()->flash('alert', 'Not enough product amount in store!');
                        return redirect()->route('add_bill', )
                            ->with('failed', 'Not enough product amount in store!');
                    }
                }
                if($checked){
                    $newBill = new Bill();
                    $newBill->type = $request->type;
                    $newBill->bill_payment = $request->date;
                    $newBill->cus_id = $request->cus_id;
                    $newBill->user_id = $request->user_id;

                    $newBill->save();

                    for ($i = 0; $i < count($proAmountArr); $i++) {
                        $newProBill = new ProBill();

                        $newProBill->pro_id = $productNameArr[$i];
                        $newProBill->bill_id = $newBill->id;
                        $newProBill->pro_amount = $proAmountArr[$i];
                        $newProBill->pro_cur_price = $currentPriceArr[$i];

                        $newProBill->save();

                        DB::table('product')->where('id', $productNameArr[$i])->decrement('pro_quantity', $proAmountArr[$i]);
                    }
                    return redirect()->route('show_bill', $newBill->id)
                        ->with('success', 'Bill create successfully');

                }

            }

        }
    }
    public function show_bill($id)
    {
        $bill = Bill::find($id);
        $cus_id = DB::table('customer')->where('id', $bill->cus_id)->first();
        $user_id = DB::table('users')->where('id', $bill->user_id)->first();
        $pro_bill = DB::table('pro-bill')->where('bill_id', $id)->get();

        return view('bill.show', compact('bill', 'cus_id', 'user_id', 'pro_bill'));
    }

    public function sort_bill($id){
        $bill = DB::table('bill')
           ->select(DB::raw('MONTH(bill_payment) as month'), DB::raw('COUNT(*) as count'))
           ->groupBy(DB::raw('MONTH(bill_payment)'))
           ->orderByRaw('month DESC')
           ->paginate(1);

        return view('bill.bill', compact('bill','id'));
    }
    public function search_bill(Request $request){
        $bill = DB::table('bill')
           ->select(DB::raw('MONTH(bill_payment) as month'), DB::raw('COUNT(*) as count'))
           ->groupBy(DB::raw('MONTH(bill_payment)'))
           ->orderByRaw('month DESC')
           ->paginate(1);
        $bill_info = str_split($request->search_bill_text);
        if($bill_info[0] == "B"){
            unset($bill_info[0]);
        }
        $bill_info = implode($bill_info);
        $bill_date = $request->search_bill_date;

        return view('bill.bill', compact('bill','bill_info','bill_date'));
    }
}
