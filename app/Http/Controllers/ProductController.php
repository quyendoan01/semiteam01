<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function product()
    {
        $product = Product::latest()->paginate(6);

<<<<<<< HEAD
        return view('product.product', compact('product'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
=======
        return view('product.product',compact('product'))
        ->with('i', (request()->input('page',1)-1)*5);

    }

    public function create(){
>>>>>>> p2
        $category = Category::all();
        return view('product.add', ['category' => $category]);
    }
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required'
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            if ($request->hasFile('productimage')) {
                $file = $request->file('productimage');
                $path = public_path('image/product');
                $fileName = $file->getClientOriginalName();
                $file->move($path, $fileName);
            } else {
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

            $newImage = new Image();
            $newImage->img_infor = $fileName;
            $newImage->pro_id = $newProduct->id;

            $newImage->save();

            return redirect()->route('product')
                ->with('success', 'product created successfully');
        }
    }
    public function show($id)
    {
        $product = Product::find($id);
        return view('product.show', ['product' => $product]);
    }
    public function edit($id)
    {

        $category = Category::all();
        $product = Product::with('category')->find($id);
        return view('product.add', ['product' => $product, 'category' => $category]);
    }
    public function update(Request $request, $id)
    {
        if ($request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required'
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $fileName = "";
            if ($request->hasFile('productimage')) {
                $file = $request->file('productimage');
                $path = public_path('image/product');
                $fileName = $file->getClientOriginalName();
                $file->move($path, $fileName);
            }
            $product = Product::find($id);


            if ($product != null) {
                $category = DB::table('category')->select('id')->where('cat_name', '=', $request->category)->first();

                $product->cat_id = $category->id;
                $product->pro_name = $request->name;
                $product->unit_price = $request->price;
                $product->pro_quantity = $request->quantity;
                $product->pro_origin = $request->origin;
                $product->pro_discount = $request->sales;

                if ($fileName) {
                    $image = DB::table('image')->where('pro_id', $id)->update(['img_infor' => "$fileName"]);
                }
                $product->save();
                return redirect()->route('product.show', $id)
                    ->with('success', 'Product updated');
            } else {
                return redirect()->route('product.show', $id)
                    ->with('error', 'Error');
            }
        }
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        $image_path = "/image/product/.$product->image";
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $product->delete();
        return redirect()->route('product')
            ->with('success', 'Delete successful');
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
