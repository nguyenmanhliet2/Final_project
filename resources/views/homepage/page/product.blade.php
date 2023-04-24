@extends('homepage.master')
@section('content')
<main id="MainContent" class="content-for-layout">
    <div class="collection mt-100">
        <div class="container">
            <div class="row">
                <!-- product area start -->
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="filter-sort-wrapper d-flex justify-content-between flex-wrap">
                        <div class="collection-title-wrap d-flex align-items-end">
                            <h2 class="collection-title heading_24 mb-0">{{$nameCa}}</h2>
                            <p class="collection-counter text_16 mb-0 ms-2">{{$countProducts}} sản phẩm </p>
                        </div>
                        {{-- <div class="filter-sorting">
                            <div class="collection-sorting position-relative d-none d-lg-block">
                                <div
                                    class="sorting-header text_16 d-flex align-items-center justify-content-end">
                                    <span class="sorting-title me-2">Sort by:</span>
                                    <span class="active-sorting">Featured</span>
                                    <span class="sorting-icon">
                                        <svg class="icon icon-down" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-chevron-down">
                                            <polyline points="6 9 12 15 18 9"></polyline>
                                        </svg>
                                    </span>
                                </div>
                                <ul class="sorting-lists list-unstyled m-0">
                                    <li><a href="#" class="text_14">Featured</a></li>
                                    <li><a href="#" class="text_14">Best Selling</a></li>
                                    <li><a href="#" class="text_14">Alphabetically, A-Z</a></li>
                                    <li><a href="#" class="text_14">Alphabetically, Z-A</a></li>
                                    <li><a href="#" class="text_14">Price, low to high</a></li>
                                    <li><a href="#" class="text_14">Price, high to low</a></li>
                                    <li><a href="#" class="text_14">Date, old to new</a></li>
                                    <li><a href="#" class="text_14">Date, new to old</a></li>
                                </ul>
                            </div>
                            <div class="filter-drawer-trigger mobile-filter d-flex align-items-center d-lg-none">
                                <span class="mobile-filter-icon me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="icon icon-filter">
                                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                    </svg>
                                </span>
                                <span class="mobile-filter-heading">Sorting</span>
                            </div>
                        </div> --}}
                    </div>
                    <div class="collection-product-container">
                        <div class="row">
                            @foreach ($productDetail as $key => $value )
                            <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-duration="700">
                                <div class="product-card">
                                    <div class="product-card-img">
                                        <a class="hover-switch" href="/detailProduct/{{ $value->slug_product }}-post{{ $value->id }}">
                                            <img class="secondary-img" src="{{ $value->image_product}}"
                                                alt="product-img">
                                            <img class="primary-img" src="{{ $value->image_product}}"
                                                alt="product-img">
                                        </a>

                                        <div class="product-badge">
                                            <span class="badge-label badge-percentage rounded">{{ number_format((($value->price_product - $value->sales_price_product) / $value->price_product) * 100, 2) }} %</span>
                                        </div>

                                        <div
                                            class="product-card-action product-card-action-2 justify-content-center">
                                            <a href="/detailProduct/{{ $value->slug_product }}-post{{ $value->id }}" class="action-card action-quickview">
                                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10 0C15.5117 0 20 4.48828 20 10C20 12.3945 19.1602 14.5898 17.75 16.3125L25.7188 24.2812L24.2812 25.7188L16.3125 17.75C14.5898 19.1602 12.3945 20 10 20C4.48828 20 0 15.5117 0 10C0 4.48828 4.48828 0 10 0ZM10 2C5.57031 2 2 5.57031 2 10C2 14.4297 5.57031 18 10 18C14.4297 18 18 14.4297 18 10C18 5.57031 14.4297 2 10 2ZM11 6V9H14V11H11V14H9V11H6V9H9V6H11Z"
                                                        fill="#00234D" />
                                                </svg>
                                            </a>


                                            <a href="/detailProduct/{{ $value->slug_product }}-post{{ $value->id }}" class="action-card action-addtocart addToCart" data-id="{{ $value->id }}">
                                                <svg class="icon icon-cart" width="24" height="26"
                                                    viewBox="0 0 24 26" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12 0.000183105C9.25391 0.000183105 7 2.25409 7 5.00018V6.00018H2.0625L2 6.93768L1 24.9377L0.9375 26.0002H23.0625L23 24.9377L22 6.93768L21.9375 6.00018H17V5.00018C17 2.25409 14.7461 0.000183105 12 0.000183105ZM12 2.00018C13.6562 2.00018 15 3.34393 15 5.00018V6.00018H9V5.00018C9 3.34393 10.3438 2.00018 12 2.00018ZM3.9375 8.00018H7V11.0002H9V8.00018H15V11.0002H17V8.00018H20.0625L20.9375 24.0002H3.0625L3.9375 8.00018Z"
                                                        fill="#00234D" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-card-details">
                                        <ul class="color-lists list-unstyled d-flex align-items-center">
                                        </ul>
                                        <h3 class="product-card-title">
                                            <a href="collection-left-sidebar.html">{{ $value->name_product }}</a>
                                        </h3>
                                        <div class="product-card-price">
                                            <span class="card-price-regular">{{ $value->sales_price_product }}</span>
                                            <span
                                                class="card-price-compare text-decoration-line-through">{{ $value->price_product }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="pagination justify-content-center mt-100">
                        <nav>
                            <ul class="pagination m-0 d-flex align-items-center">
                                <li class="item disabled">
                                    <a class="link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-left">
                                            <polyline points="15 18 9 12 15 6"></polyline>
                                        </svg>
                                    </a>
                                </li>
                                <li class="item"><a class="link" href="#">1</a></li>
                                <li class="item active"><a class="link" href="#">2</a></li>
                                <li class="item"><a class="link" href="#">3</a></li>
                                <li class="item"><a class="link" href="#">4</a></li>
                                <li class="item">
                                    <a class="link" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-right">
                                            <polyline points="9 18 15 12 9 6"></polyline>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- product area end -->

                <!-- sidebar start -->
                <div class="col-lg-3 col-md-12 col-12">
                    <div class="collection-filter filter-drawer">
                        <div class="filter-widget d-lg-none d-flex align-items-center justify-content-between">
                            <h5 class="heading_24">Sorting By</h4>
                            <button type="button" class="btn-close text-reset filter-drawer-trigger d-lg-none"></button>
                        </div>

                        <div class="filter-widget d-lg-none">
                            <div class="filter-header faq-heading heading_18 d-flex align-items-center justify-content-between border-bottom"
                                data-bs-toggle="collapse" data-bs-target="#filter-mobile-sort">
                                <span>
                                    <span class="sorting-title me-2">Sort by:</span>
                                    <span class="active-sorting">Featured</span>
                                </span>
                                <span class="faq-heading-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="icon icon-down">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </span>
                            </div>
                            <div id="filter-mobile-sort" class="accordion-collapse collapse show">
                                <ul class="sorting-lists-mobile list-unstyled m-0">
                                    <li><a href="#" class="text_14">Featured</a></li>
                                    <li><a href="#" class="text_14">Best Selling</a></li>
                                    <li><a href="#" class="text_14">Alphabetically, A-Z</a></li>
                                    <li><a href="#" class="text_14">Alphabetically, Z-A</a></li>
                                    <li><a href="#" class="text_14">Price, low to high</a></li>
                                    <li><a href="#" class="text_14">Price, high to low</a></li>
                                    <li><a href="#" class="text_14">Date, old to new</a></li>
                                    <li><a href="#" class="text_14">Date, new to old</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sidebar end -->
            </div>
        </div>
    </div>
</main>
@endsection
@section('js')
<script>

</script>
@endsection
