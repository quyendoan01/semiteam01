@extends('layouts.blank')

@section('content')
    <!-- Navbar -->
    <div class="container-fluid">
        <div class="add_bill">
            <a href="{{ route('product') }}"><button type="button" class="back_btn btn btn-secondary">Back</button></a>
        </div>
    </div>
    <div class="container-fluid" style="display:flex; width:100%; margin:auto; align-self: center">
        <div class="add_account">
            <div class="container-fluid">
                <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"> Name </label>
                        <input name="name" type="text" class="form-control" id="name" aria-describedby="name"
                            placeholder="Name of product">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Unit Price &#40;dollar - $&#41;</label>
                        <input name="price" type="number" class="form-control" id="exampleFormControlInput1"
                            placeholder="Price of product">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Quantity </label>
                        <input name="quantity" type="number" class="form-control" id="exampleFormControlInput1"
                            placeholder="Quantity of product">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1">Category of Product</label><br>
                        <select id="productcate" name="category">
                            <option value="Default">Choose the category</option>
                            @foreach ($category as $category)
                                <option value="{{$category->cat_name}}">{{$category->cat_name}}</option>
                            @endforeach
                        </select>
                        <a class="add_new_role" onclick="show_cat()" href="#" style="text-decoration:none"><strong> +
                                Add new
                                Category</strong></a>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Image of Product</label><br>
                        <input name="image" type="file" id="productimage">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">The Origin</label>
                        <input name="origin" type="text" class="form-control" id="exampleFormControlInput1"
                            placeholder="Origin of product">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">For sales &#40;percent - %&#41;</label>
                        <input name="sales" type="text" class="form-control" id="exampleFormControlInput1" placeholder="For sales">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add
                            Product</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="div_category" id="div_category" style="display:none">
            <form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input name="name" type="text" class="form-control" id="cat_name" placeholder="Name of new Category">
                </div>
                <div class="mb-3">
                    <button type="button" class="btn btn-secondary">Edit</button>
                    <button style="float:right" type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>

    </div>
@endsection
