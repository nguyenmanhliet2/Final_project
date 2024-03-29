 <!-- announcement bar start -->
 <div class="announcement-bar bg-1 py-1 py-lg-2">
     <div class="container">
         <div class="row align-items-center justify-content-between">
             <div class="col-lg-3 d-lg-block d-none">
                 <div class="announcement-call-wrapper">
                     <div class="announcement-call">
                         <a class="announcement-text text-white" href="tel:+1-078-2376">Call: +1 078 2376</a>
                     </div>
                 </div>
             </div>
             <div class="col-lg-6 col-12">
                 <div class="announcement-text-wrapper d-flex align-items-center justify-content-center">
                     <p class="announcement-text text-white">Welcome to our website</p>
                 </div>
             </div>
             <div class="col-lg-3 d-lg-block d-none">
                 <div class="announcement-meta-wrapper d-flex align-items-center justify-content-end">
                     <div class="announcement-meta d-flex align-items-center">
                         @if (Auth::guard('client')->check() == false)
                             <a class="announcement-login announcement-text text-white" href="/loginClient">
                                 <svg class="icon icon-user" width="10" height="11" viewBox="0 0 10 11"
                                     fill="none" xmlns="http://www.w3.org/2000/svg">
                                     <path
                                         d="M5 0C3.07227 0 1.5 1.57227 1.5 3.5C1.5 4.70508 2.11523 5.77539 3.04688 6.40625C1.26367 7.17188 0 8.94141 0 11H1C1 8.78516 2.78516 7 5 7C7.21484 7 9 8.78516 9 11H10C10 8.94141 8.73633 7.17188 6.95312 6.40625C7.88477 5.77539 8.5 4.70508 8.5 3.5C8.5 1.57227 6.92773 0 5 0ZM5 1C6.38672 1 7.5 2.11328 7.5 3.5C7.5 4.88672 6.38672 6 5 6C3.61328 6 2.5 4.88672 2.5 3.5C2.5 2.11328 3.61328 1 5 1Z"
                                         fill="#fff" />
                                 </svg>
                                 <span>Login</span>
                             </a>
                         @endif
                         <span class="separator-login d-flex px-3">
                             <svg width="2" height="9" viewBox="0 0 2 9" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <path opacity="0.4" d="M1 0.5V8.5" stroke="#FEFEFE" stroke-linecap="round" />
                             </svg>
                         </span>
                         @if (Auth::guard('client')->check())
                             <div class="currency-wrapper">
                                 <button type="button" class="currency-btn btn-reset text-white"
                                     data-bs-toggle="dropdown" aria-expanded="false">
                                     <img class="flag" src="/assets/img/flag/usd.jpg" alt="img">
                                     <span>{{ Auth::guard('client')->user()->first_name }}
                                         {{ Auth::guard('client')->user()->last_name }}</span>
                                     <span>
                                         <svg class="icon icon-dropdown" xmlns="http://www.w3.org/2000/svg"
                                             width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             stroke="#fff" stroke-width="1" stroke-linecap="round"
                                             stroke-linejoin="round">
                                             <polyline points="6 9 12 15 18 9"></polyline>
                                         </svg>
                                     </span>
                                 </button>
                                 <ul class="currency-list dropdown-menu dropdown-menu-end px-2">
                                     <li class="currency-list-item ">
                                         <a class="currency-list-option" href="/my-information" data-value="USD">
                                             <img class="flag" src="/assets/img/flag/usd.jpg" alt="img">
                                             <span>Infomation</span>
                                         </a>
                                     </li>
                                     <li class="currency-list-item ">
                                        <a class="currency-list-option" href="/update-password" data-value="USD">
                                            <img class="flag" src="/assets/img/flag/usd.jpg" alt="img">
                                            <span>Update password</span>
                                        </a>
                                    </li>
                                    <li class="currency-list-item ">
                                        <a class="currency-list-option" href="/history-transaction" data-value="USD">
                                            <img class="flag" src="/assets/img/flag/usd.jpg" alt="img">
                                            <span>History Transaction</span>
                                        </a>
                                    </li>
                                     <li class="currency-list-item ">
                                         <a class="currency-list-option" href="/logoutClient" data-value="USD">
                                             <img class="flag" src="/assets/img/flag/usd.jpg" alt="img">
                                             <span>Logout</span>
                                         </a>
                                     </li>
                                 </ul>
                             </div>
                         @endif
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- announcement bar end -->

 <!-- header start -->
 <header class="sticky-header border-btm-black header-1">
     <div class="header-bottom">
         <div class="container">
             <div class="row align-items-center">
                 <div class="col-lg-3 col-md-4 col-4">
                     <div class="header-logo">
                         <a href="/indexHomePage" class="logo-main">
                             <img src="/assets/img/newlogo.png" loading="lazy" alt="bisum">
                         </a>
                     </div>
                 </div>
                 <div class="col-lg-6 d-lg-block d-none">
                     <nav class="site-navigation">
                         <ul class="main-menu list-unstyled justify-content-center">
                             <li class="menu-list-item nav-item">
                                 <a class="nav-link" href="/indexHomePage">Home Page</a>
                             </li>
                             <li class="menu-list-item nav-item has-megamenu">
                                 <div class="mega-menu-header">
                                     <a class="nav-link" href="javascript:void(0)">
                                         Shop
                                     </a>
                                     <span class="open-submenu">
                                         <svg class="icon icon-dropdown" xmlns="http://www.w3.org/2000/svg"
                                             width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round">
                                             <polyline points="6 9 12 15 18 9"></polyline>
                                         </svg>
                                     </span>
                                 </div>
                                 <div class="submenu-transform submenu-transform-desktop">
                                     <div class="container">
                                         <ul class="submenu megamenu-container list-unstyled">
                                             <li class="menu-list-item nav-item-sub">
                                                 <div class="mega-menu-header">
                                                     <a class="nav-link-sub nav-text-sub megamenu-heading"
                                                         href="javascript:void(0)">
                                                         CATEGORY
                                                     </a>
                                                 </div>
                                                 <div class="submenu-transform megamenu-transform">
                                                     <ul class="megamenu list-unstyled">
                                                         @foreach ($menuMain as $value_main)
                                                             <li class="menu-list-item nav-item-sub">
                                                                 <a class="nav-link-sub nav-text-sub"
                                                                     href="/category/{{ $value_main->id }}">{{ $value_main->name_category }}</a>
                                                             </li>
                                                         @endforeach
                                                     </ul>
                                                 </div>
                                             </li>
                                             <li class="menu-list-item nav-item-sub">
                                                 {{-- <div
                                                     class="mega-menu-header d-flex align-items-center justify-content-between">
                                                     <a class="nav-link-sub nav-text-sub megamenu-heading"
                                                         href="collection-right-sidebar.html">
                                                         PRODUCT
                                                     </a>
                                                 </div> --}}
                                                 <div class="submenu-transform megamenu-transform">
                                                     {{-- <ul class="megamenu list-unstyled">
                                                         <li class="menu-list-item nav-item-sub">
                                                             <a class="nav-link-sub nav-text-sub"
                                                                 href="product.html">Product Available</a>
                                                         </li>
                                                         <li class="menu-list-item nav-item-sub">
                                                             <a class="nav-link-sub nav-text-sub"
                                                                 href="product.html">Best Seller</a>
                                                         </li>
                                                         <li class="menu-list-item nav-item-sub">
                                                             <a class="nav-link-sub nav-text-sub"
                                                                 href="product.html">Sale</a>
                                                         </li>
                                                     </ul> --}}
                                                 </div>
                                             </li>
                                             <li class="menu-list-item nav-item-sub">
                                                 {{-- <div
                                                     class="mega-menu-header d-flex align-items-center justify-content-between">
                                                     <a class="nav-link-sub nav-text-sub megamenu-heading"
                                                         href="index.html">
                                                         Topping
                                                     </a>
                                                 </div> --}}
                                                 <div class="submenu-transform megamenu-transform">
                                                     {{-- <ul class="megamenu list-unstyled">
                                                         <li class="menu-list-item nav-item-sub">
                                                             <a class="nav-link-sub nav-text-sub"
                                                                 href="product-2.html">Black Pearl</a>
                                                         </li>
                                                         <li class="menu-list-item nav-item-sub">
                                                             <a class="nav-link-sub nav-text-sub"
                                                                 href="product.html">Jelly</a>
                                                         </li>
                                                     </ul> --}}
                                                 </div>
                                             </li>
                                             <li class="menu-list-item nav-item-sub">
                                                 <div
                                                     class="mega-menu-header d-flex align-items-center justify-content-between">
                                                     <a class="mega-menu-img nav-link-sub nav-text-sub"
                                                         href="collection-left-sidebar.html">
                                                         <img class="menu-img" src="/assets/img/menu/1.jpg"
                                                             alt="img">
                                                         <h2 class="img-menu-heading text_16 mt-2">Featured
                                                             Collection</h2>
                                                         <div class="img-menu-action text_12 bg-transparent p-0">
                                                             <span>DISCOVER NOW</span>
                                                             <span>
                                                                 <svg xmlns="http://www.w3.org/2000/svg"
                                                                     width="30" height="18" fill="#000"
                                                                     class="icon-right-long" viewBox="0 0 16 16">
                                                                     <path fill-rule="evenodd"
                                                                         d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                                                 </svg>
                                                             </span>
                                                         </div>
                                                     </a>
                                                 </div>
                                             </li>
                                         </ul>
                                     </div>
                                 </div>
                             </li>
                             <li class="menu-list-item nav-item has-dropdown">
                                 <div class="mega-menu-header">
                                     <a class="nav-link" href="javascript:void(0)">Blog</a>
                                     <span class="open-submenu">
                                         <svg class="icon icon-dropdown" xmlns="http://www.w3.org/2000/svg"
                                             width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round">
                                             <polyline points="6 9 12 15 18 9"></polyline>
                                         </svg>
                                     </span>
                                 </div>
                                 <div class="submenu-transform submenu-transform-desktop">
                                     <ul class="submenu list-unstyled">
                                         <li class="menu-list-item nav-item-sub">
                                             <a class="nav-link-sub nav-text-sub" href="/blogPage">Blog</a>
                                         </li>
                                     </ul>
                                 </div>
                             </li>
                             <li class="menu-list-item nav-item has-dropdown">
                                 <div class="mega-menu-header">
                                     <a class="nav-link" href="javascript:void(0)">
                                         Pages
                                     </a>
                                     <span class="open-submenu">
                                         <svg class="icon icon-dropdown" xmlns="http://www.w3.org/2000/svg"
                                             width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round">
                                             <polyline points="6 9 12 15 18 9"></polyline>
                                         </svg>
                                     </span>
                                 </div>
                                 <div class="submenu-transform submenu-transform-desktop">
                                     <ul class="submenu list-unstyled">
                                         <li class="menu-list-item nav-item-sub">
                                             <a class="nav-link-sub nav-text-sub" href="/indexCart">Cart</a>
                                         </li>
                                     </ul>
                                 </div>
                             </li>
                             <li class="menu-list-item nav-item">
                                 <a class="nav-link" href="/getContactPage">Contact</a>
                             </li>
                         </ul>
                     </nav>
                 </div>
                 <div class="col-lg-3 col-md-8 col-8">
                     <div class="header-action d-flex align-items-center justify-content-end">
                         <a class="header-action-item header-search" href="javascript:void(0)">
                             <svg class="icon icon-search" width="20" height="20" viewBox="0 0 20 20"
                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path
                                     d="M7.75 0.250183C11.8838 0.250183 15.25 3.61639 15.25 7.75018C15.25 9.54608 14.6201 11.1926 13.5625 12.4846L19.5391 18.4611L18.4609 19.5392L12.4844 13.5627C11.1924 14.6203 9.5459 15.2502 7.75 15.2502C3.61621 15.2502 0.25 11.884 0.25 7.75018C0.25 3.61639 3.61621 0.250183 7.75 0.250183ZM7.75 1.75018C4.42773 1.75018 1.75 4.42792 1.75 7.75018C1.75 11.0724 4.42773 13.7502 7.75 13.7502C11.0723 13.7502 13.75 11.0724 13.75 7.75018C13.75 4.42792 11.0723 1.75018 7.75 1.75018Z"
                                     fill="black" />
                             </svg>
                         </a>
                         <a class="header-action-item header-cart ms-4 cart-container" href="#drawer-cart"
                             data-bs-toggle="offcanvas" >
                             <svg class="icon icon-cart" width="24" height="26" viewBox="0 0 24 26"
                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path
                                     d="M12 0.000183105C9.25391 0.000183105 7 2.25409 7 5.00018V6.00018H2.0625L2 6.93768L1 24.9377L0.9375 26.0002H23.0625L23 24.9377L22 6.93768L21.9375 6.00018H17V5.00018C17 2.25409 14.7461 0.000183105 12 0.000183105ZM12 2.00018C13.6562 2.00018 15 3.34393 15 5.00018V6.00018H9V5.00018C9 3.34393 10.3438 2.00018 12 2.00018ZM3.9375 8.00018H7V11.0002H9V8.00018H15V11.0002H17V8.00018H20.0625L20.9375 24.0002H3.0625L3.9375 8.00018Z"
                                     fill="black" />
                             </svg>
                             <span class="cart-count">@{{countCart}}</span>
                         </a>
                         <a class="header-action-item header-hamburger ms-4 d-lg-none" href="#drawer-menu"
                             data-bs-toggle="offcanvas">
                             <svg class="icon icon-hamburger" xmlns="http://www.w3.org/2000/svg" width="24"
                                 height="24" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round">
                                 <line x1="3" y1="12" x2="21" y2="12"></line>
                                 <line x1="3" y1="6" x2="21" y2="6"></line>
                                 <line x1="3" y1="18" x2="21" y2="18"></line>
                             </svg>
                         </a>
                     </div>
                 </div>
             </div>
         </div>
         <div class="search-wrapper">
             <div class="container">
                 <form action="/search" class="search-form d-flex align-items-center" method="POST">
                     @csrf
                     <button type="submit" class="search-submit bg-transparent pl-0 text-start"  >
                         <svg class="icon icon-search" width="20" height="20" viewBox="0 0 20 20"
                             fill="none" xmlns="http://www.w3.org/2000/svg">
                             <path
                                 d="M7.75 0.250183C11.8838 0.250183 15.25 3.61639 15.25 7.75018C15.25 9.54608 14.6201 11.1926 13.5625 12.4846L19.5391 18.4611L18.4609 19.5392L12.4844 13.5627C11.1924 14.6203 9.5459 15.2502 7.75 15.2502C3.61621 15.2502 0.25 11.884 0.25 7.75018C0.25 3.61639 3.61621 0.250183 7.75 0.250183ZM7.75 1.75018C4.42773 1.75018 1.75 4.42792 1.75 7.75018C1.75 11.0724 4.42773 13.7502 7.75 13.7502C11.0723 13.7502 13.75 11.0724 13.75 7.75018C13.75 4.42792 11.0723 1.75018 7.75 1.75018Z"
                                 fill="black" />
                         </svg>
                     </button>
                     <div class="search-input mr-4">
                         <input type="text" name="nameProduct" placeholder="Search your products..." autocomplete="off">
                     </div>
                     <div class="search-close">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round" class="icon icon-close">
                             <line x1="18" y1="6" x2="6" y2="18"></line>
                             <line x1="6" y1="6" x2="18" y2="18"></line>
                         </svg>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </header>
 <div class="offcanvas offcanvas-end " tabindex="-1" id="drawer-cart" aria-modal="true" role="dialog" style="visibility: visible;" aria-hidden="true">
    <div class="offcanvas-header border-btm-black">
        <h5 class="cart-drawer-heading text_16">Your Cart </h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0" id="cart_ord">
        <div class="cart-content-area d-flex justify-content-between flex-column">
            <div class="minicart-loop custom-scrollbar">
                {{-- @foreach ($listBill as $key_bill => $value_bill) --}}
                <template v-for="(value, key) in listCart">
                <div class="minicart-item d-flex">
                    <div class="mini-img-wrapper">
                        <img class="mini-img" v-bind:src="value.image_product" alt="img">
                    </div>
                    <div class="product-info">
                        <h2 class="product-title"><a href="#">@{{ value.name_product }}</a></h2>
                        <div class="misc d-flex align-items-end justify-content-between">
                            <div class="quantity d-flex align-items-center justify-content-between">

                                <button class="qty-btn dec-qty" v-on:click="minusQuantity(value)"><img src="/assets/img/icon/minus.svg" alt="minus"></button>
                                <input class="qty-input" type="number" name="qty" v-bind:value="value.quantity_product" min="0">
                                <button class="qty-btn inc-qty" v-on:click="addQuantity(value)"><img src="/assets/img/icon/plus.svg" alt="plus"></button>
                            </div>
                            <div class="product-remove-area d-flex flex-column align-items-end">
                                <div class="product-price">@{{  formatNumber(value.unit_price * value.quantity_product)}}</div>
                                <a href="javascript:void(0)" class="product-remove" v-on:click="deleteRow(value)">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
                </template>

                {{-- @endforeach --}}
                <!-- minicart item -->

            </div>
            <div class="minicart-footer">
                <div class="minicart-calc-area">
                    <div class="minicart-calc d-flex align-items-center justify-content-between">
                        <span class="cart-subtotal mb-0">Subtotal</span>
                        <span class="cart-subprice">@{{ formatNumber(total()) }}</span>
                    </div>
                    <p class="cart-taxes text-center my-4">Taxes and shipping will be calculated at checkout.
                    </p>
                </div>
                <div class="minicart-btn-area d-flex justify-content-center align-content-center">
                    <a href="/indexCart" class="minicart-btn btn-secondary">View Cart</a>
                </div>
            </div>
        </div>
        <div class="cart-empty-area text-center py-5 d-none">
            <div class="cart-empty-icon pb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M16 16s-1.5-2-4-2-4 2-4 2"></path>
                    <line x1="9" y1="9" x2="9.01" y2="9"></line>
                    <line x1="15" y1="9" x2="15.01" y2="9"></line>
                </svg>
            </div>
            <p class="cart-empty">You have no items in your cart</p>
        </div>
    </div>
</div>

