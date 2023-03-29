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
        $bill= Bill::all();

        return view('bill.bill', compact('bill'));
    }
    public function add_bill()
    {
        $product = Product::latest()->paginate(15);
        $customer= Customer::latest()->paginate(15);
        $bidcount = DB::table('bill')->count();
        if ($bidcount <= 0){
            $bid = 1;
        }
        else{
            $bid = DB::table('bill')->max('id');
            $bid += 1;
        }

        return view('bill.add',compact('product','customer','bid'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function store_bill(Request $request){
        if ($request->isMethod('POST')) {
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

            $productNameArr = explode($split,$productName);
            $proAmountArr = explode($split,$proAmount);
            $currentPriceArr = explode($split,$currentPrice);

            for ($i = 0; $i < count($proAmountArr); $i++){
                $newProBill = new ProBill();

                $newProBill->pro_id = $productNameArr[$i];
                $newProBill->bill_id = $newBill->id;
                $newProBill->pro_amount = $proAmountArr[$i];
                $newProBill->pro_cur_price = $currentPriceArr[$i];

                $newProBill->save();
            }


            return redirect()->route('bill')
                ->with('success', 'Bill create successfully');
        }
    }
}
