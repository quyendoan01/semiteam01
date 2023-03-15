@extends('layouts.blank')

@section('content')

    <div class="container-fluid">
        <div class="add_bill">
            <a href="{{url('bill')}}"><button type="button" class="btn btn-secondary">Back</button></a>
        </div>
    </div>
    <div class="bill_add">
        <div class="bill_add_left">
            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
            <label style="font-size:1rem">Bill ID: </label> <label>XX</label>
            <div style="float:right">
                <label style="font-size:1rem;">Date: </label> <input type="date" style="background-color: #f1f1f1;border:solid 1px #888; border-radius:4px">
            </div>
            <div class="customer_in_bill">
                <label>Customer: </label> <input type="text" style="background-color: #f1f1f1;border:solid 1px #888; border-radius:4px">
                <button style="padding: 0 6px" class="btn btn-outline-secondary">+</button>
            </div>
            <hr>
            <div class="product_in_bill">
                <label style="display:block">Name of product</label>
                <label style="font-weight:100">Number: </label> <input style="width:50px;background-color: #f1f1f1;border:solid 1px #888; border-radius:4px" type="number">
                <div style="float:right; margin-right:4px;">
                <label  style="font-weight:100">Unit price </label>
                <input style="width:50px;background-color: #f1f1f1;border:solid 1px #888; border-radius:4px" type="number" >
                <label style="font-weight:600">unitroot $</label>
                </div>
            </div>
            <hr>
            <div style=" display:block">
                <label style="font-size:1rem">Quantity of goods: XX</label>
                <label style="font-size:1rem">Total: XX $</label>
            </div>
            <div class="mb-3" style="display: block">
                <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
            <form>


        </div>
        <div class="bill_add_right">

            <div class="input-group" style="width: 300px; height: 32px; margin:4px 0px; display:inline-flex">
                <span style="height: 28px" class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input style="height: 28px" type="text" class="form-control" placeholder="Type here...">
            </div>
            <br>
            <div style="display:block;width:100%">
            @foreach ($product as $pro)

                <div class="single_product_in_bill">
                    <input type="hidden"
                            value="{{ $image = DB::table('image')->select('img_infor')->where('pro_id', '=', "$pro->id")->get() }}">
                        @foreach ($image as $image)
                            <img style="height: 50px;width:50px" src="{{ asset("image/product/$image->img_infor") }}">
                        @endforeach
                    <div style="display:block; padding:4px">
                    <label style="display:block; margin: 0;font-size:0.9rem">{{$pro->pro_name}}</label>
                    <label style="display:block; margin: 0;font-size:0.8rem">{{$pro->unit_price}}</label>
                    </div>
                </div>
            @endforeach

        </div>

        </div>
    </div>


    <script>

    </script>
@endsection
