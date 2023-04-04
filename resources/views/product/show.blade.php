@extends('layouts.blank')

@section('content')
    <link rel="stylesheet" href="css/style.css">
    <!-- Navbar -->

    <div class="container-fluida" style="background-color: #f3f3f3; display:block;width:100%;height:100%">
        <div class="container-fluida" style="display: inline-flex; width: 100%;height:100%; padding:12px 12px 0px 12px">
            <div class="add_bill">
                <a href="{{ route('product') }}"><button type="button" class="btn btn-secondary"
                        style="margin: 0px 4px">Back</button></a>
            </div>
            <div style="width: 90%"></div>
            @if (Auth::user()->role == 'manageracc' || Auth::user()->role == 'stocker')
            <a href="{{route('product.edit',$product->id)}}"><button class="btn btn-primary" style="float:right; margin: 0px 4px">Edit</button></a>
            <a href="{{route('product.destroy',$product->id)}}"><button class="btn btn-danger" style="float: right; margin: 0px 4px">Delete</button></a>
        @endif
        </div>
        <div class="pro_show">
            <input type="hidden" value="{{ $image = DB::table('image')->select('img_infor')->where('pro_id', '=', "$product->id")->get() }}">

            @foreach ($image as $image)
            <div class="pro_image" style="">
                <div style="margin:auto;display:block;max-width:450px;max-height:450px">
                    <img src="{{ asset("image/product/$image->img_infor") }}"
                        style="width:100%;height:100%;margin:auto;display:block">
                </div>
            </div>
            @endforeach
            <div class="pro_description">
                <h5 style="color: #000">Product ID: PR{{ $product->id }}</h5>
                <h4 style="color: #000">Product name: {{ $product->pro_name }}</h4>


                <div class="price1" style="display:flex">
                    <p>Price: &nbsp;</p>
                    @if ($product->pro_discount > 0)
                        <input type="hidden"
                            name="{{ $price = $product->unit_price - $product->unit_price * $product->pro_discount / 100}}">
                        <p
                            style="margin: 0;
                    font-size: 0.9rem;
                    color: #999;
                    text-decoration: line-through;">
                            {{ number_format("$product->unit_price", 2) }} $</p>
                        <h2
                            style="margin: 0;
                    font-size: 1.2rem;
                    font-weight: 600;
                    color: red;
                    margin-right: auto;
                    margin-left: 8px;">
                            {{ number_format("$price", 2) }} $</h2>
                    @else
                        <p
                            style="margin: 0;
                        font-size: 1.2rem;
                        font-weight: 600;
                        color: red;
                        margin-right: auto;
                        margin-left: 8px;">
                            {{ number_format("$product->unit_price", 2) }} $</p>
                    @endif
                    <p style="color: green; margin: 0px 8px">Sales: {{ $product->pro_discount }}%</p>
                </div>
                <input type="hidden"
                    name="{{ $cate = DB::table('category')->where('id', '=', "$product->cat_id")->get() }}">
                @foreach ($cate as $cat)
                    <p>Product Category: {{ $cat->cat_name }}</p>
                @endforeach
                <p>Product Quantity: {{ $product->pro_quantity }}</p>
                <p>Product Origin: {{ $product->pro_origin }}</p>
                <p style="color:blue">Sold: {{$pro_sold}}</p>
            </div>
        </div>
    </div>
@endsection
