@extends('layouts.blank')

@section('content')
    <link rel="stylesheet" href="css/style.css">
    <!-- Navbar -->

    <div class="container-fluida" style="background-color: #f3f3f3; display:block;width:100%;height:100%">
        <div class="container-fluida" style="display: inline-flex; width: 100%;height:100%; padding:12px 12px 0px 12px">
            <div class="add_bill">
                <a href="{{ route('bill') }}"><button type="button" class="btn btn-secondary"
                        style="margin: 0px 4px">Back</button></a>
            </div>

        </div>
        <div class="container-fluid" style="padding:16px">
            <div class="bill_show">
                <div class="container-fluid" style="border: 2px solid darkblue;margin:8px 0px;box-shadow: 5px 10px gray;">
                    <p style="float:right">Date: {{ $bill->bill_payment }}</p>
                    <h1>Semi T1</h1>
                    <div class="container-fluid" style="border: 1px solid darkblue;margin:8px 0px">
                        <div class="bill_show_head">
                            <div style="float:right">
                                <p>Staff's Name: {{ $user_id->user_name }}</p>
                                <p>Customer's Name: {{ $cus_id->cus_name }}</p>
                            </div>

                            <p>Bill ID: <span style="color:brown">B{{ $bill->id }}<span></p>
                            @if ($bill->type == 0)
                                <p>Bill Type: <b style="color: mediumblue">Import</b></p>
                            @else
                                <p>Bill Type: <b style="color: forestgreen">Export</b></p>
                            @endif
                        </div>
                        <hr>
                        <div class="bill_show_middle">
                            <table class="table table-bordered">
                                <thead class="table-primary">
                                  <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Product Category</th>
                                    <th>Product Amount</th>
                                    <th>Product Price &#40; in-time &#41;</th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <input type="hidden" value="{{$total = 0}}">
                                  @foreach ($pro_bill as $pb)
                                  <tr>
                                  <td>PR{{$pb->pro_id}}</td>
                                  <input type="hidden" value="{{$pro = DB::table('product')->where('id',$pb->pro_id)->get()}}">
                                  @foreach ($pro as $pro)
                                    <td>{{$pro->pro_name }}</td>
                                    <input type="hidden" value="{{$cat = DB::table('category')->select('cat_name')->where('id',$pro->cat_id)->get()}}">
                                    <td>{{ $cat[0]->cat_name }}</td>
                                  @endforeach
                                  <td>{{$pb->pro_amount}}</td>
                                  <td style="color:green">{{$pb->pro_cur_price}}$</td>
                                  <td style="color:green">{{$pb->pro_amount * $pb->pro_cur_price}}$</td>
                                  <input type="hidden" value="{{$total += $pb->pro_amount * $pb->pro_cur_price}}">
                                  </tr>
                                  @endforeach
                                  <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><h5 style="float:right"><b>Total:</b><h5></td>
                                    <td><h5 style="color:green"><b>{{$total}}$</b></h5></td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
