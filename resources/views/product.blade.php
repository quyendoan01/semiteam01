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
            <a href="{{ url('add_product') }}"><button class="add_product btn btn-secondary">Add Product</button></a>
        </div>
        <div id="list-product" class="row sm-gutter"></div>
        <div id="list-product" class="row sm-gutter">
            <div class="col l-2-4 m-3 c-6 home-product-item">
                <a class="home-product-item-link" href="#">
                    <div class="home-product-item__img" style="background-image: url(./assets/img/home/1.PNG);"></div>
                    <div class="home-product-item__info">
                        <h3 class="home-product-item__name">Ổ đĩa flash USB2.0 2TB Hp kim loại chống thấm nước</h3>
                        <div class="home-product-item__price">
                            <p class="home-product-item__price-old">180.000đ</p>
                            <p class="home-product-item__price-new">200.000đ</p>
                            <i class="home-product-item__ship fas fa-shipping-fast"></i>
                        </div>
                        <div class="home-product-item__footer">
                            <div class="home-product-item__save">
                                <input type="checkbox" name="save-check" id="heart-save">
                                <label for="heart-save" class="far fa-heart"></label>
                            </div>
                            <div class="home-product-item__rating-star">
                                <i class="star-checked far fa-star"></i>
                                <i class="star-checked far fa-star"></i>
                                <i class="star-checked far fa-star"></i>
                                <i class="star-checked far fa-star"></i>
                                <i class="star-checked far fa-star"></i>
                            </div>
                            <div class="home-product-item__saled">Đã bán 3,8k</div>
                        </div>
                        <div class="home-product-item__origin">Hà Nội</div>
                        <div class="home-product-item__sale-off">
                            <div class="home-product-item__sale-off-value">40%</div>
                        </div>
                    </div>
                    <div class="home-product-item-footer">Tìm sản phẩm tương tự</div>
                </a>
            </div>
            <div class="col l-2-4 m-3 c-6 home-product-item">
                <a class="home-product-item-link" href="#">
                    <div class="home-product-item__img" style="background-image: url(./assets/img/home/2.PNG);"></div>
                    <div class="home-product-item__info">
                        <h4 class="home-product-item__name">Ổ đĩa flash USB2.0 2TB Hp kim loại chống thấm nước</h4>
                        <div class="home-product-item__price">
                            <p class="home-product-item__price-old">300.000đ</p>
                            <p class="home-product-item__price-new">250.000đ</p>
                            <i class="home-product-item__ship fas fa-shipping-fast"></i>
                        </div>
                        <div class="home-product-item__footer">
                            <div class="home-product-item__save">
                                <input type="checkbox" name="save-check" id="heart-save">
                                <label for="heart-save" class="far fa-heart"></label>
                            </div>
                            <div class="home-product-item__rating-star">
                                <i class="star-checked far fa-star"></i>
                                <i class="star-checked far fa-star"></i>
                                <i class="star-checked far fa-star"></i>
                                <i class="star-checked far fa-star"></i>
                                <i class="star-checked far fa-star"></i>
                            </div>
                            <div class="home-product-item__saled">Đã bán 3,2k</div>
                        </div>
                        <div class="home-product-item__origin">Hà Nội</div>
                        <div class="home-product-item__favourite">
                            Yêu thích
                        </div>
                        <div class="home-product-item__sale-off">
                            <div class="home-product-item__sale-off-value">40%</div>
                            <div class="home-product-item__sale-off-label">GIẢM</div>
                        </div>
                    </div>
                    <div class="home-product-item-footer">Tìm sản phẩm tương tự</div>
                </a>
            </div>
            <div class="col l-2-4 m-3 c-6 home-product-item">
                <a class="home-product-item-link" href="#">
                    <div class="home-product-item__img" style="background-image: url(./assets/img/home/2.PNG);"></div>
                    <div class="home-product-item__info">
                        <h4 class="home-product-item__name">Ổ đĩa flash USB2.0 2TB Hp kim loại chống thấm nước</h4>
                        <div class="home-product-item__price">
                            <p class="home-product-item__price-old">300.000đ</p>
                            <p class="home-product-item__price-new">250.000đ</p>
                            <i class="home-product-item__ship fas fa-shipping-fast"></i>
                        </div>
                        <div class="home-product-item__footer">
                            <div class="home-product-item__save">
                                <input type="checkbox" name="save-check" id="heart-save">
                                <label for="heart-save" class="far fa-heart"></label>
                            </div>
                            <div class="home-product-item__rating-star">
                                <i class="star-checked far fa-star"></i>
                                <i class="star-checked far fa-star"></i>
                                <i class="star-checked far fa-star"></i>
                                <i class="star-checked far fa-star"></i>
                                <i class="star-checked far fa-star"></i>
                            </div>
                            <div class="home-product-item__saled">Đã bán 3,2k</div>
                        </div>
                        <div class="home-product-item__origin">Hà Nội</div>
                        <div class="home-product-item__favourite">
                            Yêu thích
                        </div>
                        <div class="home-product-item__sale-off">
                            <div class="home-product-item__sale-off-value">40%</div>
                            <div class="home-product-item__sale-off-label">GIẢM</div>
                        </div>
                    </div>
                    <div class="home-product-item-footer">Tìm sản phẩm tương tự</div>
                </a>
            </div>
            <div class="col l-2-4 m-3 c-6 home-product-item">
                <a class="home-product-item-link" href="#">
                    <div class="home-product-item__img" style="background-image: url(./assets/img/home/2.PNG);"></div>
                    <div class="home-product-item__info">
                        <h4 class="home-product-item__name">Ổ đĩa flash USB2.0 2TB Hp kim loại chống thấm nước</h4>
                        <div class="home-product-item__price">
                            <p class="home-product-item__price-old">300.000đ</p>
                            <p class="home-product-item__price-new">250.000đ</p>
                            <i class="home-product-item__ship fas fa-shipping-fast"></i>
                        </div>
                        <div class="home-product-item__footer">
                            <div class="home-product-item__save">
                                <input type="checkbox" name="save-check" id="heart-save">
                                <label for="heart-save" class="far fa-heart"></label>
                            </div>
                            <div class="home-product-item__rating-star">
                                <i class="star-checked far fa-star"></i>
                                <i class="star-checked far fa-star"></i>
                                <i class="star-checked far fa-star"></i>
                                <i class="star-checked far fa-star"></i>
                                <i class="star-checked far fa-star"></i>
                            </div>
                            <div class="home-product-item__saled">Đã bán 3,2k</div>
                        </div>
                        <div class="home-product-item__origin">Hà Nội</div>
                        <div class="home-product-item__favourite">
                            Yêu thích
                        </div>
                        <div class="home-product-item__sale-off">
                            <div class="home-product-item__sale-off-value">40%</div>
                            <div class="home-product-item__sale-off-label">GIẢM</div>
                        </div>
                    </div>
                    <div class="home-product-item-footer">Tìm sản phẩm tương tự</div>
                </a>
            </div>
        </div>
    </div>
@endsection
{{-- >>>>>>> p2 --}}
