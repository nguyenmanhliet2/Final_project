@extends('homepage.master')
@section('content')
    @include('homepage.shares.slide')
    <!-- collection start -->
    <div class="featured-collection mt-100 overflow-hidden">
        <div class="collection-tab-inner">
            <div class="container">
                <div class="section-header text-center">
                    <h2 class="section-heading primary-color">Featured Products</h2>
                </div>
                <div class="row">
                    @foreach ($search_product as $key_product => $value_product)
                        <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-duration="700">
                            <div class="product-card">
                                <div class="product-card-img">
                                    <a class="hover-switch"
                                        href="/detailProduct/{{ $value_product->slug_product }}-post{{ $value_product->id }}">
                                        <img class="secondary-img" src="{{ $value_product->image_product }}"
                                            alt="product-img">
                                        <img class="primary-img" src="{{ $value_product->image_product }}"
                                            alt="product-img">
                                    </a>
                                    <div class="product-badge">
                                        <span
                                            class="badge-label badge-percentage rounded">up to {{ number_format((($value_product->price_product - $value_product->sales_price_product) / $value_product->price_product) * 100, 2) }}
                                            %</span>
                                    </div>
                                    <div class="product-card-action product-card-action-2 justify-content-center">
                                        <a href="/detailProduct/{{ $value_product->slug_product }}-post{{ $value_product->id }}"
                                            class="action-card action-quickview">
                                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M10 0C15.5117 0 20 4.48828 20 10C20 12.3945 19.1602 14.5898 17.75 16.3125L25.7188 24.2812L24.2812 25.7188L16.3125 17.75C14.5898 19.1602 12.3945 20 10 20C4.48828 20 0 15.5117 0 10C0 4.48828 4.48828 0 10 0ZM10 2C5.57031 2 2 5.57031 2 10C2 14.4297 5.57031 18 10 18C14.4297 18 18 14.4297 18 10C18 5.57031 14.4297 2 10 2ZM11 6V9H14V11H11V14H9V11H6V9H9V6H11Z"
                                                    fill="#00234D" />
                                            </svg>
                                        </a>
                                        <a href="#" class="action-card action-wishlist">
                                            <svg class="icon icon-wishlist" width="26" height="22"
                                                viewBox="0 0 26 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.96429 0.000183105C3.12305 0.000183105 0 3.10686 0 6.84843C0 8.15388 0.602121 9.28455 1.16071 10.1014C1.71931 10.9181 2.29241 11.4425 2.29241 11.4425L12.3326 21.3439L13 22.0002L13.6674 21.3439L23.7076 11.4425C23.7076 11.4425 26 9.45576 26 6.84843C26 3.10686 22.877 0.000183105 19.0357 0.000183105C15.8474 0.000183105 13.7944 1.88702 13 2.68241C12.2056 1.88702 10.1526 0.000183105 6.96429 0.000183105ZM6.96429 1.82638C9.73912 1.82638 12.3036 4.48008 12.3036 4.48008L13 5.25051L13.6964 4.48008C13.6964 4.48008 16.2609 1.82638 19.0357 1.82638C21.8613 1.82638 24.1429 4.10557 24.1429 6.84843C24.1429 8.25732 22.4018 10.1584 22.4018 10.1584L13 19.4036L3.59821 10.1584C3.59821 10.1584 3.14844 9.73397 2.69866 9.07411C2.24888 8.41426 1.85714 7.55466 1.85714 6.84843C1.85714 4.10557 4.13867 1.82638 6.96429 1.82638Z"
                                                    fill="#00234D" />
                                            </svg>
                                        </a>
                                        @if (Auth::guard('client')->check())
                                        <a href="javascript:void(0)" class="action-card action-addtocart addToCart" data-id="{{ $value_product->id }}">
                                            <svg class="icon icon-cart"  width="24" height="26" viewBox="0 0 24 26"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12 0.000183105C9.25391 0.000183105 7 2.25409 7 5.00018V6.00018H2.0625L2 6.93768L1 24.9377L0.9375 26.0002H23.0625L23 24.9377L22 6.93768L21.9375 6.00018H17V5.00018C17 2.25409 14.7461 0.000183105 12 0.000183105ZM12 2.00018C13.6562 2.00018 15 3.34393 15 5.00018V6.00018H9V5.00018C9 3.34393 10.3438 2.00018 12 2.00018ZM3.9375 8.00018H7V11.0002H9V8.00018H15V11.0002H17V8.00018H20.0625L20.9375 24.0002H3.0625L3.9375 8.00018Z"
                                                    fill="#00234D" />
                                            </svg>
                                        </a>
                                        @else
                                        <a href="javascript:void(0)" class="action-card action-addtocart " data-bs-toggle="modal" data-bs-target="#cartModal">
                                            <svg class="icon icon-cart" width="24" height="26" viewBox="0 0 24 26"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12 0.000183105C9.25391 0.000183105 7 2.25409 7 5.00018V6.00018H2.0625L2 6.93768L1 24.9377L0.9375 26.0002H23.0625L23 24.9377L22 6.93768L21.9375 6.00018H17V5.00018C17 2.25409 14.7461 0.000183105 12 0.000183105ZM12 2.00018C13.6562 2.00018 15 3.34393 15 5.00018V6.00018H9V5.00018C9 3.34393 10.3438 2.00018 12 2.00018ZM3.9375 8.00018H7V11.0002H9V8.00018H15V11.0002H17V8.00018H20.0625L20.9375 24.0002H3.0625L3.9375 8.00018Z"
                                                    fill="#00234D" />
                                            </svg>
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="product-card-details">
                                    <h3 class="product-card-title">
                                        <a
                                            href="/detailProduct/{{ $value_product->slug_product }}-post{{ $value_product->id }}">{{ $value_product->name_product }}</a>
                                    </h3>
                                    <div class="product-card-price">
                                        <span class="card-price-regular">{{ $value_product->sales_price_product }} đ</span>
                                        <span
                                            class="card-price-compare text-decoration-line-through">{{ $value_product->price_product }}
                                            đ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="view-all text-center" data-aos="fade-up" data-aos-duration="700">
                    <a class="btn-primary" href="#">VIEW ALL</a>
                </div>
            </div>
        </div>
    </div>
    <!-- collection end -->


    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content newsletter-modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4">
                    <form action="#" class="newletter-modal-form common-form mx-auto">
                        <div class="section-header mb-3">
                            <h4
                                class="newsletter-modal-heading heading_34 d-flex align-items-center justify-content-center">
                                <svg class="newsletter-modal-icon" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                    </path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                                Account Login
                            </h4>
                            <hr>
                            <p class="newsletter-modal-misc text_14 mt-4 text-center"> You need to login first before starting buy product</p>
                        </div>
                        <div class="newsletter-input-box d-flex align-items-center">
                            <input class="mt-2 px-3" type="email" placeholder="Email address">
                        </div>
                        <div class="newsletter-input-box d-flex align-items-center">
                            <input class="mt-2 px-3" type="password" placeholder="Password">
                        </div>
                        <button type="button" id="login" class="btn-primary d-block mt-2 btn-signin">Login</button>
                        <p class="newsletter-modal-misc text_14 mt-4 text-center pb-4">If you do not have an account, register here!</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
