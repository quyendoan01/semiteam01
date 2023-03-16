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

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    

   
    public function register()
    {
        return view('auth.register');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


    public function add_product()
    {
        return view('product.add');
    }

    public function account()
    {
        $listuser = DB::table('users')->get();
        return view('account.account', compact('listuser'));

    }

    public function add_account()
    {
        return view('account.add');
    }
    public function user_edit($id)
    {
        $videos = User::find($id);
        return view('account.add', ['videos' => $videos]);
    }

    //<<<<<<< HEAD
    public function user_inf()
    {
        return view('user_information');
    }
    public function bill()
    {
        return view('bill.bill');
    }
    public function add_bill()
    {
        $product = Product::latest()->paginate(5);

        return view('bill.add',compact('product'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function login_auth(Request $request)
    {
        if (Auth::attempt(['user_email' => $request->email, 'password' => $request->password])) {
            $user = DB::table('users')->where('user_email', $request->email)->first();
            return redirect()->route('home')->with('urole', "$user->role");
        } else {
            return redirect()->route('login')->with('message', 'Invalid username or password!');
        }
    }

    public function add_acc_auth(Request $request)
    {
        if ($request->isMethod('POST')) {
            $user = DB::table('users')->where('user_email', $request->user_email)->first();

            if (!$user) {
                $newUser = new User();
                $newUser->user_email = $request->user_email;
                $newUser->user_full_name = $request->user_full_name;
                $newUser->user_name = $request->user_name;
                $newUser->password = $request->password;
                $newUser->role = $request->role;
                $newUser->save();
                return redirect()->route('account')
                    ->with('success', 'Add account successful!');
            } else {
                return redirect()->route('account')
                    ->with('danger', 'Account exist!');
            }

        }
    }
    
    
    public function user_edit_auth(Request $request)
    {
        if ($request->isMethod('POST')) {
            $user = User::find($request->id);
            if ($user != null) {
                $user->user_full_name = $request->user_full_name;
                $user->user_name = $request->user_name;
                $user->user_email = $request->user_email;
                $user->role = $request->role;
                $user->password = $request->password;
                $user->save();
                return redirect()->route('account')
                    ->with('success', 'Account update successful!');
            } else {
                return redirect()->route('account')
                    ->with('danger', 'Account not updated');
            }
        }
    }
    public function user_delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('account')
            ->with('success', 'Delete account successful!');
    }
    public function search(Request $request)
{
    $query = $request->input('query');
    $users = User::where('name', 'like', "%{$query}%")->get();
    return view('search', ['users' => $users]);
}



//=======
public function addlc()
{
    return view('auth.addlc');
}

public function lc()
{
    $listcustomer = DB::table('customer')->get();
    return view('auth.lc', compact('listcustomer'));

}

public function cus_edit($id)
{
    $cuss = Customer::find($id);
    return view('auth.addlc', ['cuss' => $cuss]);
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
                return redirect()->route('lc')
                    ->with('success', 'Add successful!');
            } else {
                return redirect()->route('lc')
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
        $cus->delete();
        return redirect()->route('lc')
            ->with('success', 'Delete account successful!');
    }
 
    public function search_cus(Request $request)
    {
        $query = $request->input('query');
        $cus = Customer::where('name', 'like', "%{$query}%")->get();
        return view('lc', ['cus' => $cus]);
    }
    // public function search_cus(Request $request){
    //     $search = $request->keyWord;

    //     $cus = Customer::query()
    //     ->where('name','LIKE',"%{$search}%")->get();



    //     return view ('lc', compact('listcustomer'),['successMsg'=>'Search results for '.$search]);


    // }
    
//>>>>>>> p2
}
