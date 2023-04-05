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

    public function user_inf()
    {
        return view('user_information');
    }


    public function login_auth(Request $request)
    {
        if (Auth::attempt(['user_email' => $request->email, 'password' => $request->password])) {
            $user = DB::table('users')->where('user_email', $request->email)->first();
            $currentuser = Auth::user();
            $request->session()->put('currentuser', $currentuser);

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
    public function search(Request $request)
{
    $query = $request->search;

    $listuser = User::where('user_name', 'LIKE', "%{$query}%")
                 ->orWhere('user_email', 'LIKE', "%{$query}%")
                 ->get();

    return view('account.account', compact('listuser'));
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






    public function userinfo()
{
    return view('auth.userinfo');
}

public function user_information()
{
    return view('user_information');
}


public function userinfor()
    {
        return view('auth.userinfo');
    }


    public function userinfor_edit()
    {
        return view ('auth.userinfor-edit');
    }
    
    public function usercheckpass()
    {
        return view('auth.userinfo');
    }

    public function user_edit_info(Request $request)
    {
        if ($request->isMethod('POST')) {
            $currentuser = User::find($request->id);
            if ($currentuser != null) {
                $currentuser->user_full_name = $request->user_full_name;
                $currentuser->user_name = $request->user_name;
                $currentuser->user_email = $request->user_email;
                $currentuser->role = $request->role;
                $currentuser->password = $request->password;
                $currentuser->save();
                return redirect()->route('userinfor')
                    ->with('success', 'Account update successful!');
            } else {
                return redirect()->route('userinfor')
                    ->with('danger', 'Account not updated');
            }
        }
    }



    // public function search_cus(Request $request){
    //     $search = $request->keyWord;

    //     $cus = Customer::query()
    //     ->where('name','LIKE',"%{$search}%")->get();



    //     return view ('lc', compact('listcustomer'),['successMsg'=>'Search results for '.$search]);


    // }



}
