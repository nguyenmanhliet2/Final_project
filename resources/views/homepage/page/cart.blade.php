@extends('homepage.master')
@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb">
        <div class="container">
            <ul class="list-unstyled d-flex align-items-center m-0">
                <li><a href="/">Home</a></li>
                <li>
                    <svg class="icon icon-breadcrumb" width="64" height="64" viewBox="0 0 64 64" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.4">
                            <path
                                d="M25.9375 8.5625L23.0625 11.4375L43.625 32L23.0625 52.5625L25.9375 55.4375L47.9375 33.4375L49.3125 32L47.9375 30.5625L25.9375 8.5625Z"
                                fill="#000" />
                        </g>
                    </svg>
                </li>
                <li>Cart</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->

    <main id="cart" class="content-for-layout">
        <div class="cart-page mt-100">
            <div class="container">
                <div class="cart-page-wrapper">
                    <div class="row">
                        <div class="col-lg-7 col-md-12 col-12">
                            <table class="cart-table w-100">
                                <thead>
                                    <tr>
                                        <th class="cart-caption heading_18">Product</th>
                                        <th class="cart-caption heading_18"></th>
                                        <th class="cart-caption text-center heading_18 d-none d-md-table-cell">Quantity</th>
                                        <th class="cart-caption text-end heading_18">Price</th>
                                        <th class="cart-caption text-end heading_18">Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <template v-for="(value, key) in listCart">
                                        <tr class="cart-item">
                                            <td class="cart-item-media">
                                                <div class="mini-img-wrapper">
                                                    <img class="mini-img" v-bind:src="value.image_product" alt="img">
                                                </div>
                                            </td>
                                            <td class="cart-item-details">
                                                <h2 class="product-title"><a href="#">@{{ value.name_product }}</a></h2>
                                            </td>
                                            <td class="cart-item-quantity">
                                                <div class="quantity d-flex align-items-center justify-content-between">
                                                    <button class="qty-btn dec-qty" v-on:click="minusQuantity(value)"><img src="assets/img/icon/minus.svg"
                                                            alt="minus"></button>
                                                    <input class="qty-input" type="number" name="qty"
                                                        v-on:change="updateRow(value)" v-model="value.quantity_product"
                                                        v-bind:min="0">
                                                    <button class="qty-btn inc-qty" v-on:click="addQuantity(value)"><img src="assets/img/icon/plus.svg"
                                                            alt="plus"></button>
                                                </div>
                                                <a href="#" class="product-remove mt-2"
                                                    v-on:click="deleteRow(value)">Remove</a>
                                            </td>
                                            <td class="cart-item-price text-end">
                                                <div class="product-price">@{{ formatNumber(value.unit_price) }}</div>
                                            </td>
                                            <td class="cart-item-price text-end">
                                                <div class="product-subtotal">@{{ formatNumber(value.unit_price * value.quantity_product) }}</div>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-lg-5 col-md-12 col-12">
                            <div class="cart-total-area">
                                <h3 class="cart-total-title d-none d-lg-block mb-0 ">Cart Totals</h4>
                                    <div class="cart-total-box mt-4">
                                        <div class="subtotal-item subtotal-box">
                                            <h4 class="subtotal-title">Subtotals:</h4>
                                            <p class="subtotal-value">@{{ formatNumber(totalPriceOriginal()) }}</p>
                                        </div>
                                        <div class="subtotal-item discount-box">
                                            <h4 class="subtotal-title">Discount:</h4>
                                            <p class="subtotal-value">@{{ formatNumber(totalDiscount()) }}</p>
                                        </div>
                                        <hr />
                                        <div class="subtotal-item discount-box">
                                            <h4 class="subtotal-title">Total:</h4>
                                            <p class="subtotal-value">@{{ formatNumber(total()) }}</p>
                                        </div>
                                        <p class="shipping_text">Check out the products and checkout!!</p>
                                        <div class="d-flex  justify-content-center mt-4" id="paypal-button"
                                            >
                                            {{-- <button class="position-relative btn-primary text-uppercase" v-on:click="createBill()">
                                                Procced to checkout
                                            </button> --}}
                                            <button class="position-relative btn-primary text-uppercase" v-on:click="paymentPaypal()">
                                                Procced to checkout
                                            </button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('js')

    {{-- <script>
        new Vue({
            el: '#cart',
            data: {
                listCart: [],
            },
            created() {
                this.loadCart();
            },
            methods: {
                loadCart() {
                    axios
                        .get('/cart/data')
                        .then((res) => {
                            this.listCart = res.data.data;
                        });
                },
                formatNumber(number) {
                    return new Intl.NumberFormat('vi-VI', {
                        style: 'currency',
                        currency: 'VND'
                    }).format(number);
                },
                updateRow(row) {
                    axios
                        .post('/add-to-cart-update', row)
                        .then((res) => {
                            if (res.status) {
                                toastr.success("Đã cập nhật giỏ hàng!");
                                this.loadCart();
                            }
                        })
                        .catch((res) => {
                            var error_list = res.response.data.errors;
                            $.each(error_list, function(key, value) {
                                toastr.error(value[0]);
                            });
                        });
                },
                addQuantity(row) {
                    axios
                        .post('/add-quantity-cart', row)
                        .then((res) => {
                            toastr.success("Đã cập nhật giỏ hàng!");
                            this.loadCart();
                        })
                        .catch((res) => {
                            var error_list = res.response.data.errors;
                            $.each(error_list, function(key, value) {
                                toastr.error(value[0]);
                            });
                        });
                },
                minusQuantity(row) {
                    axios
                        .post('/minus-quantity-cart', row)
                        .then((res) => {
                            toastr.success("Đã cập nhật giỏ hàng!");
                            this.loadCart();
                        })
                        .catch((res) => {
                            var error_list = res.response.data.errors;
                            $.each(error_list, function(key, value) {
                                toastr.error(value[0]);
                            });
                        });
                },
                deleteRow(row) {
                    axios
                        .post('/remove-cart', row)
                        .then((res) => {
                            toastr.success("Đã cập nhật giỏ hàng!");
                            this.loadCart();
                        })
                        .catch((res) => {
                            var error_list = res.response.data.errors;
                            $.each(error_list, function(key, value) {
                                toastr.error(value[0]);
                            });
                        });
                },
                total() {
                    var total_money = 0;
                    this.listCart.forEach((value, key) => {
                        total_money += value.unit_price * value.quantity_product;
                    });
                    return total_money;
                },

                totalPriceOriginal() {
                    var total_money = 0;
                    this.listCart.forEach((value, key) => {
                        total_money += value.price_product * value.quantity_product;
                    });
                    return total_money;
                },

                totalDiscount() {
                    var total_money = this.totalPriceOriginal() - this.total();
                    return total_money;
                },

                paymentPaypal() {
                    total = this.total() /23000
                    axios
                        .get('process-transaction', { params: { price: total.toFixed(2)} })
                        .then((res) => {
                            if (res.data.status) {
                                window.location = res.data.link
                            }
                        });
                },
            },
        });
    </script> --}}
@endsection
