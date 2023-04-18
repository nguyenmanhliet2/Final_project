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
        @include('homepage.shares.menu')

        <main id="MainContent" class="content-for-layout">
            @yield('content')
        </main>
        <!-- footer start -->
        @include('homepage.shares.footer')
        <!-- footer end -->

        <!-- scrollup start -->
        <button id="scrollup">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="18 15 12 9 6 15"></polyline>
            </svg>
        </button>
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
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
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
    <script>
        
    </script>
</body>

</html>
