<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(5);

        return view('category', compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('cat.create');
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
            $newCategory = new Category();
            $newCategory->cat_name = $request->name;
            $newCategory->save();
            return redirect()->route('product.create')
                ->with('success', 'Category create successfully');
        }
    }
    public function show($id)
    {
        $category = Category::find($id);
        return view('category.show', ['category' => $category]);
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit', ['category' => $category]);
    }
    public function update(Request $request, $id)
    {
        if ($request->isMethod('POST')){
            $validator = Validator::make($request->all(),[
                'name' => 'required'
            ]);
            if ($validator->fails()){
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $category = Category::find($id);
            if ($category != null){
                $category->name = $request->name;
                $category->save();
                return redirect()->route('category.index')
                ->with('success', 'updated successfully');
            }
            else{
                return redirect()->route('category.index')
                ->with('error','Error');
            }
        }
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index')
            ->with('success','Delete successfully');
    }
}
