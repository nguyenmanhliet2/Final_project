@extends('homepage.master')
@section('content')
    <div class="login-page mt-100" id="clientRegisterPage">
        <div class="container">
            <div class="section-header mb-3">
                <h4 class="section-heading text-center">History Transaction</h4>
            </div>
            <div class="row mt-4">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Order ID</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Sale Price</th>
                            <th scope="col">Real Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key => $value)
                            <tr>
                                <th scope="row" class="text-center">{{$key + 1}}</th>
                                <td>{{ $value->order_code}}</td>
                                <td class="text-center">{{ $value->total_price}}</td>
                                <td class="text-center">{{ $value->sales_price_product}}</td>
                                <td class="text-center">{{ $value->real_price}}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#updatePass").click(function() {
                var payload = {
                    'old_password': $("#old_password").val(),
                    'password': $("#password").val(),
                    're_password': $("#re_password").val(),
                };
                axios
                    .post("/update-password", payload)
                    .then((res) => {
                        if (res.data.status == 1) {
                            toastr.success('Changed Password Successfully');
                            $('#changePW').trigger("reset");
                        } else if (res.data.status == 0) {
                            toastr.error('An error has occurred');
                        } else {
                            toastr.error('Old password is incorrect');
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
@endsection
