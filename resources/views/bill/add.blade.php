@extends('layouts.blank')

@section('content')
    <div class="container-fluid">
        <form method="POST" enctype="multipart/form-data" action="">
            @csrf
            <div class="bill_header_left">
                <p><b>Bill ID: XX</b></p>
                <p>Type: </p>
                <p>Customer: </p>
            </div>
            <div class="bill_header_right">
                <p>Date: </p>
            </div>
            <div class="bill_product">
                <table>
                    <tr class="bill_product_table">
                        <th class="bill_product_column">Product</th>
                        <th class="bill_product_column">Quantity</th>
                        <th class="bill_product_column">Unit price</th>
                        <th class="bill_product_column"><button>+</button></th>
                    </tr>
                </table>
            </div>
            <div class="bill_bottom"></div>
        </form>
    </div>
@endsection
