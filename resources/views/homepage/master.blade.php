<!doctype html>
<html lang="en" class="no-js">

<head>
    @include('homepage.shares.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js"></script>
</head>

<body>
    <div class="body-wrapper">
        <div id="app_main">
            @include('homepage.shares.menu')

            <main id="MainContent" class="content-for-layout">
                @yield('content')
            </main>
            <!-- footer start -->
        </div>
        @include('homepage.shares.footer')
        <!-- footer end -->

        <!-- scrollup start -->
        <button id="scrollup">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="18 15 12 9 6 15"></polyline>
            </svg>
        </button>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>

        <script>
            new Vue({
                el: '#app_main',
                data: {
                    isCmt:false,
                    id:0,
                    //cart data
                    listCart: [],
                    //login data
                    listLogin: {},
                    dataLogin: {
                        email: '',
                        password: '',
                    },
                    accountUpdate : {},
                    //Blog ID
                    listPost: [],
                    list_account: {},
                    //contact data
                    contact: {
                        message: '',
                    },

                    //Blog data
                    postId: {{ isset($id) ? $id : 0 }}, //toán tử tam phân or cú pháp 3 bên(ternary operator)
                    dataPost: {},
                    dataCmt: [],
                    lastest: [],
                    count: '',
                    dataComment: {
                        noi_dung_cmt: '',
                        id_post: {{ isset($id) ? $id : 0 }},
                    },

                    getCmtdata: {
                        noi_dung_cmt: '',
                    }
                },
                created() {
                    //cart
                    this.loadCart();

                    //Blog
                    this.loadBlog();

                    //Blog Detail
                    this.getPost();
                    this.getLastpost()
                    this.count
                    this.getDataMyInfor();
                },
                methods: {
                    //cart method
                    addToCart(product_id) {
                        var payload = {
                            'product_id': product_id,
                            'quantity_product': 1,
                        };
                        axios
                            .post('/add-to-cart', payload)
                            .then((res) => {
                                if (res.data.status) {
                                    this.loadCart();
                                    toastr.success("Đã thêm vào giỏ hàng!");
                                } else {
                                    toastr.error("Bạn cần đăng nhập trước!");
                                }
                            })
                            .catch((res) => {
                                var error_list = res.response.data.errors;
                                $.each(error_list, function(key, value) {
                                    toastr.error(value[0]);
                                });
                            });
                    },
                    loadCart() {
                        axios
                            .get('/cart/data')
                            .then((res) => {
                                this.listCart = res.data.data;
                                // console.log(this.listCart);
                            });
                    },
                    formatNumber(number) {
                        return new Intl.NumberFormat('vi-VI', {
                            style: 'currency',
                            currency: 'VND'
                        }).format(number);
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


                    //Login method
                    login() {
                        axios.post("/actionClientLogin", this.listLogin)
                            .then((res) => {
                                if (res.data.status == 2) {
                                    toastr.success(res.data.alert);
                                    setTimeout(function() {
                                        window.location.href = '/indexHomePage';
                                    }, 1000);
                                } else if (res.data.status == 1) {
                                    toastr.warning(res.data.alert);
                                } else {
                                    toastr.error(res.data.alert);
                                }
                            })
                            .catch((error) => {
                                let status = error.response && error.response.status ? error.response.status : 500;
                                if (status == 422) {
                                    var error_list = error.response.data.errors;
                                    $.each(error_list, function(key, value) {
                                        toastr.error(value[0]);
                                    });
                                }
                            });
                    },

                    //payment method
                    paymentPaypal() {
                        total = this.total() / 23000
                        axios
                            .get('process-transaction', {
                                params: {
                                    price: total.toFixed(2)
                                }
                            })
                            .then((res) => {
                                if (res.data.status) {
                                    window.location = res.data.link
                                }
                            });
                    },

                    //blog method
                    loadBlog() {
                        axios
                            .get('/test/showallbaiviet')
                            .then((res) => {
                                if (res.data.st) {
                                    this.listPost = res.data.data;
                                }
                            });
                    },
                    formatDate(datetime) {
                        const input = datetime;
                        const dateObj = new Date(input);
                        const year = dateObj.getFullYear();
                        const month = (dateObj.getMonth() + 1).toString().padStart(2, '0');
                        const date = dateObj.getDate().toString().padStart(2, '0');
                        const result = `${date}/${month}/${year}`
                        return result;
                    },

                    //register method
                    createClient() {
                        axios
                            .post("/createClientAccount", this.list_account)
                            .then((res) => {
                                if (res.data.status == 200) {
                                    alert('vui lòng chờ 1 lát....')
                                    toastr.success(res.data.message);
                                }
                            })
                            .catch((res) => {
                                var error_list = res.response.data.errors;
                                $.each(error_list, function(key, value) {
                                    toastr.error(value[0]);
                                });
                            });
                    },

                    //contact method
                    postMess() {
                        axios
                            .post('/createContact', this.contact)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success('Feedback Successfully!');
                                    this.contact.message = ""
                                }
                            })
                            .catch((res) => {
                                var danh_sach_loi = res.response.data.errors;
                                $.each(danh_sach_loi, function(key, value) {
                                    toastr.error(value[0]);
                                });
                            });
                    },

                    //blogdetail method
                    getPost() {
                        axios
                            .get('/test/showbaiviet/' + this.postId)
                            .then((res) => {
                                if (res.data.status) {
                                    this.dataPost = res.data.data;
                                    this.dataCmt = res.data.dataCMT;
                                    this.selectedId =res.data.dataCMT.id
                                    this.count = res.data.countcmt;
                                }
                            });
                    },
                    getLastpost() {
                        axios
                            .get('/latestPost')
                            .then((res) => {
                                this.lastest = res.data.lastestPost;
                            })
                    },
                    createCmt() {
                        if (confirm('đăng cmt nha')) {
                            axios
                                .post('/test/cmt/', this.dataComment)
                                .then((res) => {
                                    if (res.data.status) {
                                        toastr.success('Bạn đã comment');
                                        this.dataComment.noi_dung_cmt = ''
                                        this.getPost();
                                    }
                                })
                                .catch((res) => {
                                    var danh_sach_loi = res.response.data.errors;
                                    $.each(danh_sach_loi, function(key, value) {
                                        toastr.error(value[0]);
                                    });

                                })
                        }
                    },
                    deleteCMT(id) {
                        if (confirm('xóa cmt này ?')) {
                            axios
                                .get('/deleteComment/' + id)
                                .then((res) => {
                                    if (res.data.status) {
                                        toastr.success('xóa  comment');
                                        this.getPost();
                                    }
                                });
                        }
                    },
                    get(id) {
                            axios
                                .get('/get/' + id)
                                .then((res) => {
                                    if (res.data.status) {
                                        this.getCmtdata = res.data.status
                                        this.id = res.data.status.id

                                    }
                                });
                    },
                    updateCMT(id) {
                        axios
                            .post('/testcmt/' + id, this.getCmtdata)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.alert);
                                    this.getPost();
                                }
                            })
                            .catch((res) => {
                                var error_list = res.response.data.errors;
                                $.each(error_list, function(key, value) {
                                    toastr.error(value[0]);
                                });
                            });
                    },
                    formatDate(datetime) {
                        const input = datetime;
                        const dateObj = new Date(input);
                        const year = dateObj.getFullYear();
                        const month = (dateObj.getMonth() + 1).toString().padStart(2, '0');
                        const date = dateObj.getDate().toString().padStart(2, '0');
                        const result = `${date}/${month}/${year}`
                        return result;
                    },

                    //Update My Infor method
                    updateMyInfor() {
                        axios
                            .post("/update-my-information", this.accountUpdate)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success("Update Information Successfully!");
                                }
                            })
                            .catch((res) => {
                                var error_list = res.response.data.errors;
                                $.each(error_list, function(key, value) {
                                    toastr.error(value[0]);
                                });
                            });
                    },
                    getDataMyInfor() {
                        axios
                            .get('/my-information/data')
                            .then((res) => {
                                this.accountUpdate = res.data.data;
                            });
                    },

                },
            });
        </script>
        <!-- scrollup end -->
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API = Tawk_API || {},
                Tawk_LoadStart = new Date();
            (function() {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = 'https://embed.tawk.to/6418094f31ebfa0fe7f38eb7/1gruu8o6c';
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>
        <!--End of Tawk.to Script-->
        <!-- all js -->
        @include('homepage.shares.js')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
        @yield('js')
    </div>
    <script>
        $(document).ready(function() {
            $(".addToCart").click(function() {
                var product_id = $(this).data('id');
                var payload = {
                    'product_id': product_id,
                    'quantity_product': 1,
                };
                axios
                    .post('/add-to-cart', payload)
                    .then((res) => {
                        if (res.data.status) {
                            toastr.success("Đã thêm vào giỏ hàng!");
                        } else {
                            toastr.error("Bạn cần đăng nhập trước!");
                        }
                    })
                    .catch((res) => {
                        var error_list = res.response.data.errors;
                        $.each(error_list, function(key, value) {
                            toastr.error(value[0]);
                        });
                    });
            });
        });
    </script>
</body>

</html>
