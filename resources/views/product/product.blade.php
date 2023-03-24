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


    <div class="container-fluid" style="display: flex;align-items: center;justify-content: space-between;">
        <form action="{{ route('product.search') }}" method="GET" style="display:inline">
            @csrf
            <div class="input-group" style="width: 300px; height: 40px; margin:16px 0px; display:inline-flex">
                <button class="input-group-text text-body" type="submit"><i class="fas fa-search"
                        aria-hidden="true"></i></button>
                <input name="search" type="text" class="form-control" placeholder="Type here...">

            </div>
        </form>
        <div class="float:right;display:inline">
            <a style="margin:auto" href="{{ route('product.create') }}"><button class="add_product btn btn-secondary">Add
                    Product</button></a>
        </div>
    </div>


    <div class="container-fluid">
        <div class="home-filter">

            <div class="home-filter-control">
                <p class="home-filter-title">Sort by: </p>
                <button class="btn btn--primary home-filter-btn">Trending</button>
                <button class="btn home-filter-btn">Latest</button>
                <button class="btn home-filter-btn">Selling</button>
                <div class="btn home-filter-sort">
                    <p class="home-filter-sort-btn"
                        style="width: 300px; height: 1px; margin:11px 5px; display:inline-flex; align-items: center">Price</p>
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
                        style="width: 300px; height: 1px; margin:11px 5px; display:inline-flex; align-items: center">Category</p>
                    <i class="fas fa-sort-amount-down-alt"></i>
                    <ul class="home-filter-sort-list">
                        <li>
                            @foreach ($category as $cat)

                            <a href="{{ route('product.filter', "$cat->cat_name") }}" class="home-filter-sort-item-link">
                                {{$cat->cat_name}}
                                <i class="fas fa-sort-amount-down-alt"></i>
                            </a>
                            @endforeach
                        </li>
                    </ul>
                </div>
            </div>
            <div class="home-filter-page">
                <div class="home-filter-page-number">
                    <p class="home-filter-page-now">1</p>
                    /14
                </div>
                <div class="home-filter-page-control">
                    <a href="#" class="home-filter-page-btn home-filter-page-btn--disable">
                        <i class="fas fa-angle-left"></i>
                    </a>
                    <a href="#" class="home-filter-page-btn">
                        <i class="fas fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="container">
=======
    <form action="{{ route('product.filter') }}" method="post">
        @csrf
        <select name="filter">
            @foreach ($category as $cn)
                <option value="{{ $cn->cat_name }}"> {{ $cn->cat_name }}</option>
            @endforeach
        </select>
        <button class="input-group-text text-body" type="submit">Filter</button>
    </form>

    <div id="list-product" class="row sm-gutter"></div>
    <div id="list-product" class="row sm-gutter">
        @foreach ($product as $pro)
            <div class="col l-2-4 m-3 c-6 home-product-item">
                <a class="home-product-item-link" href="{{ route('product.show', $pro->id) }}">
                    <input type="hidden"
                        value="{{ $image = DB::table('image')->select('img_infor')->where('pro_id', '=', "$pro->id")->get() }}">
                    @foreach ($image as $image)
                        <div class="home-product-item__imga"
                            style="background-image: url(); width: 100%;min-height:220px;max:height:500px;display:flex">
                            <div style="max-width:100%;min-height:220px;max:height:500px;margin:auto;display:flex">
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
                                <p class="home-product-item__price-old">{{ number_format("$pro->unit_price", 2) }} $
                                </p>
                                <p class="home-product-item__price-new">{{ number_format("$price", 2) }} $</p>
                            @else
                                <p class="home-product-item__price-new">{{ number_format("$pro->unit_price", 2) }} $
                                </p>
                            @endif
                            <i class="home-product-item__ship fas fa-shipping-fast"></i>
                        </div>
                        <div class="home-product-item__footer">
                            <div class="home-product-item__save">
                                <input type="checkbox" name="save-check" id="heart-save">
                                <label for="heart-save" class="far fa-heart"></label>
                            </div>
                            <div class="home-product-item__rating-star">
                            </div>
                            <div class="home-product-item__saled">Sold: 3,8k</div>
                        </div>
                        <div class="home-product-item__origin">{{ $pro->pro_origin }}</div>
                        <div class="home-product-item__sale-off">
                            <div class="home-product-item__sale-off-value">{{ $pro->pro_discount }}%</div>
                        </div>
                    </div>
                    <div class="home-product-item-footer">Go to Detail</div>
                </a>
            </div>
        @endforeach




        {{-- <div class="container">
>>>>>>> 01d3fcb4f54b30415bacc83920f73c57ac5b3cfe
        <div class="grid wide">
            <div class="row sm-gutter">
                <div class="col l-2 m-0 c-0">
                    <!-- category -->
                    <nav class="category">
                        <h3 class="category-heading">
                            <i class="category-heading-icon fas fa-list-ul"></i>
                            Bộ lọc tìm kiếm
                        </h3>
                        <div class="category-group">
                            <div class="category-group-title">Theo Danh Mục</div>
                            <ul class="category-group-list">
                                <li class="category-group-item">
                                    <input type="checkbox" class="btn btn-primary">
                                    Phone
                                </li>
                                <li class="category-group-item">
                                    <input type="checkbox" class="category-group-item-check">
                                    TV
                                </li>
                            </ul>
                        </div>
                        <div class="category-group">
                            <div class="category-group-title">Nơi Bán</div>
                            <ul class="category-group-list">
                                <li class="category-group-item">
                                    <input type="checkbox" class="category-group-item-check">
                                    Hà Nội
                                </li>
                                <li class="category-group-item">
                                    <input type="checkbox" class="category-group-item-check">
                                    Hồ Chí Minh
                                </li>
                            </ul>
                        </div> --}}
    <div class="container-fluid">
        <div id="list-product" class="row sm-gutter" style="width:100%">
            @foreach ($product as $pro)
                <div class="col l-2-4 m-3 c-6 home-product-item">
                    <a class="home-product-item-link" href="{{ route('product.show', $pro->id) }}">
                        <input type="hidden"
                            value="{{ $image = DB::table('image')->select('img_infor')->where('pro_id', '=', "$pro->id")->get() }}">
                        @foreach ($image as $image)
                            <div class="home-product-item__imga"
                                style="background-image: url(); width: 100%;min-height:220px;max:height:500px;display:flex">
                                <div style="max-width:100%;min-height:220px;max:height:500px;margin:auto;display:flex">
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
                            <div class="home-product-item__footer">
                                <div class="home-product-item__save">
                                    <input type="checkbox" name="save-check" id="heart-save">
                                    <label for="heart-save" class="far fa-heart"></label>
                                </div>
                                <div class="home-product-item__rating-star">
                                </div>
                                <div class="home-product-item__saled">Sold: 3,8k</div>
                            </div>
                            <div class="home-product-item__origin">{{ $pro->pro_origin }}</div>
                            <div class="home-product-item__sale-off">
                                <div class="home-product-item__sale-off-value">{{ $pro->pro_discount }}%</div>
                            </div>
                        </div>
                        <div class="home-product-item-footer">Go to Detail</div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>


    <script></script>
@endsection
