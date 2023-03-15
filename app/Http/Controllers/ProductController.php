<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function product()
    {
        $product = Product::latest()->paginate(6);

        return view('product.product',compact('product'))
        ->with('i', (request()->input('page',1)-1)*5);

    }

    public function create(){
        $category = Category::all();
        return view('product.add',['category' => $category]);
    }
    public function store(Request $request){
        if ($request->isMethod('POST')){
            $validator = Validator::make($request->all(),[
                'name' => 'required'
            ]);
            if($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }
            if ($request->hasFile('imageproduct')){
                $file = $request->file('imageproduct');
                $path = public_path('image/product');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move($path, $fileName);
            }
            else {
                $fileName = 'noname.jpg';
            }
            $category = DB::table('category')->select('id')->where('cat_name', '=', $request->category)->first();
            $newProduct = new Product();
            $newProduct->cat_id = $category->id;
            $newProduct->pro_name = $request->name;
            $newProduct->unit_price = $request->price;
            $newProduct->pro_quantity = $request->quantity;
            $newProduct->pro_origin = $request->origin;
            $newProduct->pro_discount = $request->sales;
            $newProduct->save();
            return redirect()->route('product')
            ->with('success', 'product created successfully');
        }
    }
    public function show($id){
        $product = Product::find($id);
        return view('product.show', ['product' => $product]);
    }
    public function edit($id){
        $category = Category::all();
        $product = Product::with('category') ->find($id);
        return view('product.add', ['product' => $product, 'category' => $category]);
    }
    public function update(Request $request, $id){
        if ($request->isMethod('POST')){
            $validator = Validator::make($request->all(), [
                'name' => 'required'
            ]);
            if ($validator->fails()){
                return redirect()->back()
                ->withErrors($validator)
                ->withInput();
            }
            $fileName="";
            if($request->hasFile('imageProduct')){
                $file = $request->file('imageProduct');
                $path = public_path('image/product');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move($path,$fileName);
            }
            $product = Product::find($id);
            if ($product != null){
                $product->name = $request->name;

                if($fileName){
                    $product->image = $fileName;
                }
                $product->save();
                return redirect()->route('product')
                ->with('success','Product updated');
            }
            else{
                return redirect()->route('product')
                ->with('error','Error');
            }
        }
    }
    public function destroy($id){
        $product = Product::find($id);
        $image_path = "/image/product/.$product->image";
        if(File::exists($image_path)){
            File::delete($image_path);
        }
        $product->delete();
        return redirect()->route('product')
        ->with('success','Delete successful');
    }
    public function search(Request $request)
    {
        $query = $request->search;

        $product = Product::where('pro_name', 'LIKE', "%$query%")
                            ->get();

        return view('product.product', compact('product'));
    }
    public function sortByPrice($order = 'asc')
    {
        $product = Product::orderBy('unit_price', $order)->get();
        return view('product.product', compact('product'));
    }




}
