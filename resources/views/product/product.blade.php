@extends('layouts.appad')

@section('content')
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/normalize.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/grid.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/normalize.min.css') }}">

    <div class="container-fluid">
        <div class="container-fluid" style="display: flex;align-items: center;justify-content: space-between;">
            <form action="{{ route('product.search') }}" method="GET" style="display:inline">
                @csrf
                <div class="input-group" style="width: 300px; height: 40px; margin:16px 0px; display:inline-flex">
                    <button class="input-group-text text-body" type="submit"><i class="fas fa-search"
                            aria-hidden="true"></i></button>
                    <input name="search" type="text" class="form-control" placeholder="Type here...">

                </div>
            </form>
            @if (Auth::user()->role == 'manageracc' || Auth::user()->role == 'stocker')
            <div class="float:right;display:inline">
                <a style="margin:auto" href="{{ route('product.create') }}"><button
                        class="add_product btn btn-secondary">Add
                        Product</button></a>
            </div>
            @endif

        </div>
    </div>

    <div class="container-fluid">
        <div class="container-fluid">
            <div class="home-filter">

                <div class="home-filter-control">
                    <p class="home-filter-title">Sort by: </p>
                    <div class="btn home-filter-sort">
                        <p class="home-filter-sort-btn"
                            style="width: 300px; height: 1px; margin:11px 5px; display:inline-flex; align-items: center">
                            Price</p>
                        <i class="fas fa-sort-amount-down-alt"></i>
                        <ul class="home-filter-sort-list">
                            <li>

                                <a href="{{ route('product.sortByPrice', 'desc') }}" class="home-filter-sort-item-link">
                                    Decreasing
                                    <i class="fas fa-sort-amount-down-alt"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('product.sortByPrice', 'asc') }}" class="home-filter-sort-item-link">
                                    Ascending
                                    <i class="fas fa-sort-amount-up-alt"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="btn home-filter-sort">
                        <p class="home-filter-sort-btn"
                            style="width: 300px; height: 1px; margin:11px 5px; display:inline-flex; align-items: center">
                            Category</p>
                        <i class="fas fa-sort-amount-down-alt"></i>
                        <ul class="home-filter-sort-list">
                            <li>
                                @foreach ($category as $cat)
                                    <a href="{{ route('product.filter', "$cat->cat_name") }}"
                                        class="home-filter-sort-item-link">
                                        {{ $cat->cat_name }}
                                        <i class="fas fa-sort-amount-down-alt"></i>
                                    </a>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="home-filter-page" style="max-width:580px;max-height:40px">
                    <div class="home-filter-page-number">
                        <nav>
                            <ul class="pagination justify-content-center">
                                @if (isset($product))
                                @if ($product->onFirstPage())
                                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $product->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                            @endif

                            <!-- Pagination Elements -->
                            @if($product->lastPage() > 1)
                                @for($i = 1; $i <= $product->lastPage(); $i++)
                                    @if($i == 1 || $i == $product->currentPage() - 2 || $i == $product->currentPage() - 1 || $i == $product->currentPage() || $i == $product->currentPage() + 1 || $i == $product->currentPage() + 2 || $i == $product->lastPage())
                                        @if($i == $product->currentPage())
                                            <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
                                        @else
                                            <li class="page-item"><a class="page-link" href="{{ $product->url($i) }}">{{ $i }}</a></li>
                                        @endif
                                    @elseif($i == 2 && $product->currentPage() > 4)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @elseif($i == $product->lastPage() - 1 && $product->currentPage() < $product->lastPage() - 3)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                @endfor
                            @endif

                            <!-- Next Page Link -->
                            @if ($product->hasMorePages())
                                <li class="page-item"><a class="page-link" href="{{ $product->nextPageUrl() }}" rel="next">&raquo;</a></li>
                            @else
                                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                            @endif
                                @endif
                                <!-- Previous Page Link -->

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div id="list-product" class="row sm-gutter" style="width:100%">
            @if (isset($product))
            @foreach ($product as $pro)
            <div class="col l-2-4 m-3 c-6 home-product-item">
                <a class="home-product-item-link" href="{{ route('product.show', $pro->id) }}">
                    <input type="hidden"
                        value="{{ $image = DB::table('image')->select('img_infor')->where('pro_id', '=', "$pro->id")->get() }}">
                    @foreach ($image as $image)
                        <div class="home-product-item__imga"
                            style="background-image: url(); width: 100%;height:220px;display:flex">
                            <div style="max-width:100%;height:220px;margin:auto;display:flex">
                                <img src="{{ asset("image/product/$image->img_infor") }}"
                                    style="width:100%;height:100%;margin:auto;display:block">
                            </div>
                        </div>
                    @endforeach
                    <div class="home-product-item__info">
                        <h3 class="home-product-item__name">{{ $pro->pro_name }}</h3>
                        <div class="home-product-item__price">
                            @if ($pro->pro_discount > 0)
                                <input type="hidden"
                                    name="{{ $price = $pro->unit_price - ($pro->unit_price * $pro->pro_discount) / 100 }}">
                                <p class="home-product-item__price-old">
                                    {{ number_format("$pro->unit_price", 2) }} $</p>
                                <p class="home-product-item__price-new">{{ number_format("$price", 2) }} $</p>
                            @else
                                <p class="home-product-item__price-new">
                                    {{ number_format("$pro->unit_price", 2) }} $</p>
                            @endif
                            <i class="home-product-item__ship fas fa-shipping-fast"></i>
                        </div>
                        <div class="home-product-item__origin"><b>{{ $pro->pro_origin }}</b></div>
                        <div class="home-product-item__sale-off">
                            <div class="home-product-item__sale-off-value">{{ $pro->pro_discount }}%</div>
                        </div>
                    </div>
                    <div class="home-product-item-footer">Go to Detail</div>
                </a>
            </div>
        @endforeach
            @endif

        </div>
    </div>


    <script></script>
@endsection
