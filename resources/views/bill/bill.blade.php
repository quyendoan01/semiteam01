@extends('layouts.appad')

@section('content')

    <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/normalize.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/grid.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/normalize.min.css') }}">

    <div class="container-fluid">
        <div class="bill_list">
            <div class="bill_func">
                <div style="display:flex; align-items: center;">
                    <form action="{{route('search_bill')}}" method="GET">
                        @csrf
                    <div class="input-group" style="width: 300px; height: 40px; margin:16px 0px; display:inline-flex">
                            <button type="submit" class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></button>
                            <input type="text" name="search_bill_text" class="form-control" placeholder="Type here...">
                    </div>
                    <input type="date" name="search_bill_date" style="height:100%;padding:8px;border-radius:8px;border:1px solid gray;margin:auto">
                </form>
                    <div class="btn home-filter-sort" style="border:none">
                        <p class="home-filter-sort-btn"
                            style="width: 300px; height: 1px; margin:11px 5px; display:inline-flex; align-items: center">
                            Type</p>
                        <i class="fas fa-sort-amount-down-alt"></i>
                        <ul class="home-filter-sort-list">
                            <li>

                                <a href="{{ route('sort_bill', 0) }}" class="home-filter-sort-item-link">
                                    Import
                                    <i class="fas fa-sort-amount-down-alt"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('sort_bill', 1) }}" class="home-filter-sort-item-link">
                                    Export
                                    <i class="fas fa-sort-amount-up-alt"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <a href="{{ url('bill/add') }}"><button class="add_bill_btn btn btn-secondary" style="margin:0">Add new
                        bill</button></a>
            </div>
            <div style="max-height: 450px; overflow-y: scroll;padding-right:4px">
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
                        @foreach ($bill as $bil)
                        @if (isset($id))
                        <input type="hidden" value="{{$bill_id = DB::table('bill')->where(DB::raw('MONTH(bill_payment)'), $bil->month)->where('type', $id)->get()}}">
                        @elseif (isset($bill_info))
                        <input type="hidden" value="{{$bill_id = DB::table('bill')->where('id', 'LIKE', "%$bill_info%")->where('bill_payment', 'LIKE', "%$bill_date%")->get()}}">
                        @else
                        <input type="hidden" value="{{$bill_id = DB::table('bill')->where(DB::raw('MONTH(bill_payment)'), $bil->month)->get()}}">
                        @endif
                            @foreach ($bill_id as $bi)
                            <tr>
                                <td>
                                    <a style="text-decoration:none;color:brown"
                                        href="{{ route('show_bill', $bi->id) }}">B{{ $bi->id }}
                                    </a>
                                </td>
                                <td>
                                    @if ($bi->type == 0)
                                        <b style="color:mediumblue">Import</b>
                                    @else
                                        <b style="color:forestgreen">Export</b>
                                    @endif
                                </td>
                                <td>{{ $bi->bill_payment }}</td>
                                <input type="hidden"
                                    value="{{ $cus_name = DB::table('customer')->where('id', $bi->cus_id)->get() }}">
                                <td>
                                    @foreach ($cus_name as $cus)
                                        {{ $cus->cus_name }}
                                    @endforeach
                                </td>
                                <input type="hidden"
                                    value="{{ $user_name = DB::table('users')->where('id', $bi->user_id)->get() }}">
                                <td>
                                    @foreach ($user_name as $user)
                                        {{ $user->user_name }}
                                    @endforeach
                                </td>
                            </tr>
                            @endforeach

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <nav>
        <ul class="pagination justify-content-center">
            <!-- Previous Page Link -->
            @if ($bill->onFirstPage())
                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $bill->previousPageUrl() }}" rel="prev">&laquo;</a>
                </li>
            @endif

            <!-- Pagination Elements -->
            @if ($bill->lastPage() > 1)
                @for ($i = 1; $i <= $bill->lastPage(); $i++)
                    @if (
                        $i == 1 ||
                            $i == $bill->currentPage() - 2 ||
                            $i == $bill->currentPage() - 1 ||
                            $i == $bill->currentPage() ||
                            $i == $bill->currentPage() + 1 ||
                            $i == $bill->currentPage() + 2 ||
                            $i == $bill->lastPage())
                        @if ($i == $bill->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $bill->url($i) }}">{{ $i }}</a>
                            </li>
                        @endif
                    @elseif($i == 2 && $bill->currentPage() > 4)
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                    @elseif($i == $bill->lastPage() - 1 && $bill->currentPage() < $bill->lastPage() - 3)
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                    @endif
                @endfor
            @endif

            <!-- Next Page Link -->
            @if ($bill->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $bill->nextPageUrl() }}" rel="next">&raquo;</a>
                </li>
            @else
                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
            @endif
        </ul>
    </nav>
@endsection
