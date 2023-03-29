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
                    @foreach ($bill as $bill)

                        <tr>
                        <td>
                            <a href="{{route('home')}}">B{{$bill->id}}
                    </a>
                </td>
                        <td>@if ($bill->type == 0)
                            In
                            @else
                            Out
                        @endif</td>
                        <td>{{$bill->bill_payment}}</td>
                        <input type="hidden" value="{{$cus_name = DB::table('customer')->where('id', $bill->cus_id)->get()}}">
                        <td>
                            @foreach ($cus_name as $cus)
                                {{$cus->cus_name}}
                            @endforeach
                        </td>
                        <input type="hidden" value="{{$user_name = DB::table('users')->where('id', $bill->user_id)->get()}}">
                        <td>
                            @foreach ($user_name as $user)
                                {{$user->user_name}}
                            @endforeach
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
