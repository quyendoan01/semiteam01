@extends('layouts.appad')

@section('content')

    <div class="container-fluid">
        <div class="bill_list">
            <div class="bill_func">
                <div class="input-group" style="width: 300px; height: 40px; margin:16px 0px; display:inline-flex">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" placeholder="Type here...">
                </div>
                <a href="{{ url('bill/add') }}"><button class="add_bill_btn btn btn-secondary">Add new bill</button></a>
            </div>

            <table class="bill_table table">
                <thead>
                    <tr>
                        <th scope="col">Bill ID</th>
                        <th scope="col">Type</th>
                        <th scope="col">Date payment</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Staff Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>In</td>
                        <td>21/02/2003</td>
                        <td>abc</td>
                        <td>xyz</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>In</td>
                        <td>21/02/2003</td>
                        <td>abc</td>
                        <td>xyz</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Out</td>
                        <td>21/02/2003</td>
                        <td>abc</td>
                        <td>xyz</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
