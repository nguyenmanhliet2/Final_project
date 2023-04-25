@extends('homepage.master')
@section('content')
<main id="MainContent" class="content-for-layout">
    <div class="product-page mt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-gallery product-gallery-vertical d-flex">
                        <div class="product-img-large">
                            <div class="img-large-slider common-slider" data-slick='{
                                "slidesToShow": 1,
                                "slidesToScroll": 1,
                                "dots": false,
                                "arrows": false,
                                "asNavFor": ".img-thumb-slider"
                            }'>
                                <div class="img-large-wrapper">
                                    <a href="{{ $productDetail->image_product}}" data-fancybox="gallery">
                                        <img src="{{ $productDetail->image_product}}" alt="img">
                                    </a>
                                </div>
                                <div class="img-large-wrapper">
                                    <a href="/assets/img/products/bags/38.jpg" data-fancybox="gallery">
                                        <img src="/assets/img/products/bags/38.jpg" alt="img">
                                    </a>
                                </div>
                                <div class="img-large-wrapper">
                                    <a href="/assets/img/products/bags/37.jpg" data-fancybox="gallery">
                                        <img src="/assets/img/products/bags/37.jpg" alt="img">
                                    </a>
                                </div>
                                <div class="img-large-wrapper">
                                    <a href="/assets/img/products/bags/36.jpg" data-fancybox="gallery">
                                        <img src="/assets/img/products/bags/36.jpg" alt="img">
                                    </a>
                                </div>
                                <div class="img-large-wrapper">
                                    <a href="/assets/img/products/bags/34.jpg" data-fancybox="gallery">
                                        <img src="/assets/img/products/bags/34.jpg" alt="img">
                                    </a>
                                </div>
                                <div class="img-large-wrapper">
                                    <a href="/assets/img/products/bags/30.jpg" data-fancybox="gallery">
                                        <img src="/assets/img/products/bags/30.jpg" alt="img">
                                    </a>
                                </div>
                                <div class="img-large-wrapper">
                                    <a href="/assets/img/products/bags/32.jpg" data-fancybox="gallery">
                                        <img src="/assets/img/products/bags/32.jpg" alt="img">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="product-img-thumb">
                            <div class="img-thumb-slider common-slider" data-vertical-slider="true" data-slick='{
                                "slidesToShow": 5,
                                "slidesToScroll": 1,
                                "dots": false,
                                "arrows": true,
                                "infinite": false,
                                "speed": 300,
                                "cssEase": "ease",
                                "focusOnSelect": true,
                                "swipeToSlide": true,
                                "asNavFor": ".img-large-slider"
                            }'>
                                <div>
                                    <div class="img-thumb-wrapper">
                                        <img src="{{ $productDetail->image_product }}" alt="img">
                                    </div>
                                </div>
                                <div>
                                    <div class="img-thumb-wrapper">
                                        <img src="/assets/img/products/bags/38.jpg" alt="img">
                                    </div>
                                </div>
                                <div>
                                    <div class="img-thumb-wrapper">
                                        <img src="/assets/img/products/bags/37.jpg" alt="img">
                                    </div>
                                </div>
                                <div>
                                    <div class="img-thumb-wrapper">
                                        <img src="/assets/img/products/bags/36.jpg" alt="img">
                                    </div>
                                </div>
                                <div>
                                    <div class="img-thumb-wrapper">
                                        <img src="/assets/img/products/bags/34.jpg" alt="img">
                                    </div>
                                </div>
                                <div>
                                    <div class="img-thumb-wrapper">
                                        <img src="/assets/img/products/bags/30.jpg" alt="img">
                                    </div>
                                </div>
                                <div>
                                    <div class="img-thumb-wrapper">
                                        <img src="/assets/img/products/bags/32.jpg" alt="img">
                                    </div>
                                </div>
                            </div>
                            <div class="activate-arrows show-arrows-always arrows-white d-none d-lg-flex justify-content-between mt-3"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-details ps-lg-4">
                        <div class="mb-3"><span class="product-availability">In Stock</span></div>
                        <h2 class="product-title mb-3">{{ $productDetail->name_product }}</h2>
                        <div class="product-rating d-flex align-items-center mb-3">

                        </div>
                        <div class="product-price-wrapper mb-4">
                            <span class="product-price regular-price">{{ $productDetail->sales_price_product }}đ</span>
                            <del class="product-price compare-price ms-2">{{ $productDetail->price_product }}đ</del>
                        </div>
                        <div class="misc d-flex align-items-end justify-content-between mt-4">
                        </div>

                        <form class="product-form">
                            @if (Auth::guard('client')->check())
                            <div class="product-form-buttons d-flex align-items-center justify-content-between mt-4">
                                <button type="button" class="position-relative btn-atc btn-add-to-cart loader " v-on:click="addToCart({{ $productDetail->id }})" data-id="{{ $productDetail->id }}">ADD TO CART</button>
                            </div>
                            @else
                            <div class="product-form-buttons d-flex align-items-center justify-content-between mt-4">
                                <button type="button" class="position-relative btn-atc btn-add-to-cart loader " data-bs-toggle="modal" data-bs-target="#cartModal">ADD TO CART</button>
                            </div>
                            @endif
                            <div class="buy-it-now-btn mt-2">
                                <button type="button" class="position-relative btn-atc btn-add-to-cart loader">Check Your Cart</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content newsletter-modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body px-4">
                    <div action="#" class="newletter-modal-form common-form mx-auto">
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
                            <input class="mt-2 px-3" v-model="listLogin.email"  type="email" placeholder="Email address">
                        </div>
                        <div class="newsletter-input-box d-flex align-items-center">
                            <input class="mt-2 px-3" v-model="listLogin.password" type="password" placeholder="Password">
                        </div>
                        <button type="button" id="login" class="btn-primary d-block mt-2 btn-signin" v-on:click="login()">Login</button>
                        <p class="newsletter-modal-misc text_14 mt-4 text-center pb-4">If you do not have an account, <a href="/indexClientRegister" class="register-btn">Register Here!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product tab start -->
    <div class="product-tab-section mt-10" data-aos="fade-up" data-aos-duration="700">
        <div class="container">
            <div class="tab-list product-tab-list">
                <nav class="nav product-tab-nav">
                    <a class="product-tab-link tab-link active" href="#pdescription" data-bs-toggle="tab">Description</a>
                    {{-- <a class="product-tab-link tab-link" href="#preview" data-bs-toggle="tab">Reviews</a> --}}
                </nav>
            </div>
            <div class="tab-content product-tab-content">
                <div id="pdescription" class="tab-pane fade show active">
                    <div class="row">
                        <div class="col-lg-7 col-md-12 col-12">
                            <div class="desc-content">
                                <h4 class="heading_18 mb-3">What is lorem ipsum?</h4>
                                <p class="text_16 mb-4">{{ $productDetail->description_product }}</p>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12 col-12">
                            <div class="desc-img">
                                <img src="{{ $productDetail->image_product}}" alt="img">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="desc-content mt-4">
                                <p class="text_16"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="preview" class="tab-pane fade">
                    <div class="review-area accordion-parent">
                        {{-- <h4 class="heading_18 mb-3">Customer Reviews</h4>
                        <div class="review-header d-flex justify-content-between align-items-center">
                            <p class="text_16">No reviews yet.</p>
                            <button class="text_14 bg-transparent text-decoration-underline write-btn" type="button">Write a review</button>
                        </div>
                        <div class="review-form-area accordion-child">
                            <form action="#">
                                <fieldset>
                                    <label class="label">Full Name</label>
                                    <input type="text" placeholder="Enter your name" />
                                </fieldset>
                                <fieldset>
                                    <label class="label">Email</label>
                                    <input type="email" placeholder="john.smith@example.com" />
                                </fieldset>
                                <fieldset>
                                    <label class="label">Rating</label>
                                    <div class="star-rating">
                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.168 5.77344L10.082 5.23633L8 0.566406L5.91797 5.23633L0.832031 5.77344L4.63086 9.19727L3.57031 14.1992L8 11.6445L12.4297 14.1992L11.3691 9.19727L15.168 5.77344Z" fill="#B2B2B2"/>
                                        </svg>
                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.168 5.77344L10.082 5.23633L8 0.566406L5.91797 5.23633L0.832031 5.77344L4.63086 9.19727L3.57031 14.1992L8 11.6445L12.4297 14.1992L11.3691 9.19727L15.168 5.77344Z" fill="#B2B2B2"/>
                                        </svg>
                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.168 5.77344L10.082 5.23633L8 0.566406L5.91797 5.23633L0.832031 5.77344L4.63086 9.19727L3.57031 14.1992L8 11.6445L12.4297 14.1992L11.3691 9.19727L15.168 5.77344Z" fill="#B2B2B2"/>
                                        </svg>
                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.168 5.77344L10.082 5.23633L8 0.566406L5.91797 5.23633L0.832031 5.77344L4.63086 9.19727L3.57031 14.1992L8 11.6445L12.4297 14.1992L11.3691 9.19727L15.168 5.77344Z" fill="#B2B2B2"/>
                                        </svg>
                                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.168 5.77344L10.082 5.23633L8 0.566406L5.91797 5.23633L0.832031 5.77344L4.63086 9.19727L3.57031 14.1992L8 11.6445L12.4297 14.1992L11.3691 9.19727L15.168 5.77344Z" fill="#B2B2B2"/>
                                        </svg>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <label class="label">Review Title</label>
                                    <input type="text" placeholder="Give your review a title" />
                                </fieldset>
                                <fieldset>
                                    <label class="label">Body of Review (2000)</label>
                                    <textarea cols="30" rows="10" placeholder="Write your comments here"></textarea>
                                </fieldset>

                                <button type="submit" class="position-relative review-submit-btn">SUBMIT</button>
                            </form>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product tab end -->

    <!-- you may also like start -->
</main>
@endsection
@section('js')
    <script>

    </script>
@endsection
