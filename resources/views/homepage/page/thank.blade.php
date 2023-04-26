@extends('homepage.master')
@section('content')
<div id="cart" class="" style="margin-bottom: 470px">
    <h3 class="text-center mt-100">You have successfully paid</h3>
</div>
@endsection
@section('js')
<script>
    new Vue({
        el: '#cart',
        data: {
        },
        created() {
            this.paymentPaypal();
        },
        methods: {
            paymentPaypal() {
                axios
                    .get('create-bill')
                    .then((res) => {
                        if (res.data.status == 1) {
                            toastr.success("Successful order creation!")
                            window.setTimeout(() => {
                                window.location = '/indexHomePage';
                            }, 500);
                        } else if (res.data.status == 0) {
                            toastr.error("Error! An error occurred. Please try again later");
                            window.setTimeout(() => {
                                window.location = '/indexCart';
                            }, 500);
                        } else {
                            toastr.warning("Empty cart!");
                            window.setTimeout(() => {
                                window.location = '/indexCart';
                            }, 500);
                        }
                    });
            },
        },
    });
</script>
@endsection
