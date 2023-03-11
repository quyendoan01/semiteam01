@extends('layouts.appad')

@section('content')
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/responsive.css">

    <div class="container-fluid">
        <div class="container-fluid">
            <div class="input-group" style="width: 300px; height: 32px; margin:4px 0px; display:inline-flex">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="Type here...">
            </div>
            <a href="{{ route('product.create') }}"><button class="add_product btn btn-secondary">Add Product</button></a>
        </div>
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
                                    <p class="home-product-item__price-old">{{ number_format("$pro->unit_price", 2) }} $</p>
                                    <p class="home-product-item__price-new">{{ number_format("$price", 2) }} $</p>
                                @else
                                    <p class="home-product-item__price-new">{{ number_format("$pro->unit_price", 2) }} $</p>
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
@endsection
{{-- >>>>>>> p2 --}}
