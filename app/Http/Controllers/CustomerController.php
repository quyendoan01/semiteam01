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
use App\Models\Bill;
use App\Models\ProBill;
use App\Models\Category;
use App\Models\Image;
use Session;


class CustomerController extends Controller

{
    public function addlc()
{
    return view('customer.addlc');
}

public function lc()
{
    $listcustomer = DB::table('customer')->get();
    return view('customer.lc', compact('listcustomer'));

}

public function cus_edit($id)
{
    $cuss = Customer::find($id);
    return view('customer.addlc', ['cuss' => $cuss]);
}

public function add_cus_auth(Request $request)
    {
        if ($request->isMethod('POST')) {
            $cus = DB::table('customer')->where('cus_email', $request->cus_email)->first();

            if (!$cus) {
                $newCus = new Customer();
                $newCus->cus_email = $request->cus_email;
                $newCus->cus_name = $request->cus_name;
                $newCus->cus_phone = $request->cus_phone;
                $newCus->cus_address = $request->cus_address;
                $newCus->save();
                return redirect()->route('customer.lc')
                    ->with('success', 'Add successful!');
            } else {
                return redirect()->route('customer.lc')
                    ->with('danger', 'Fail!');
            }

        }
    }

    public function cus_edit_auth(Request $request)
    {
        if ($request->isMethod('POST')) {
            $cus = Customer::find($request->id);
            if ($cus != null) {
                $cus->cus_name = $request->cus_name;
                $cus->cus_email = $request->cus_email;
                $cus->cus_phone = $request->cus_phone;
                $cus->cus_address = $request->cus_address;
                $cus->save();
                return redirect()->route('lc')
                    ->with('success', 'Account update successful!');
            } else {
                return redirect()->route('lc')
                    ->with('danger', 'Account not updated');
            }
        }
    }
    public function cus_delete($id)
    {
        $cus = Customer::find($id);
        $cus_bill = Bill::where('cus_id', $id)->get();
        foreach ($cus_bill as $cusb){
            $cusb_id = ProBill::where('bill_id', $cusb->id)->delete();
        }
        Bill::where('cus_id', $id)->delete();
        $cus->delete();

        return redirect()->route('customer.lc')
            ->with('success', 'Delete account successful!');
    }

    public function search_cus(Request $request)
    {
        $query = $request->input('query');
        $cus = Customer::where('name', 'like', "%{$query}%")->get();
        return view('lc', ['cus' => $cus]);
    }

}

