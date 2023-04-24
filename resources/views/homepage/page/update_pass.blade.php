@extends('homepage.master')
@section('content')
<div class="login-page mt-100" id="clientRegisterPage">
    <div class="container">
            <div class="section-header mb-3">
                <h4 class="section-heading text-center">Update my password</h4>
            </div>
            <div class="row mt-4">
                <div class="col-4">
                    <fieldset>
                        <label class="label">Old Password</label>
                        <input id="old_password" type="password" placeholder="Password old" class="form-control">
                    </fieldset>
                </div>
                <div class="col-4">
                    <fieldset>
                        <label class="label">Password</label>
                        <input id="password" type="password" placeholder="Password" class="form-control">
                    </fieldset>
                </div>
                <div class="col-4">
                    <fieldset>
                        <label class="label">Confirm Password</label>
                        <input id="re_password" type="password" placeholder="retype password" class="form-control">
                    </fieldset>
                </div>
                <div class="col-12 mt-3 ">
                    <div class="col-3 float-end">
                        <button id="updatePass" type="button" class="btn-primary d-block mt-3 btn-signin">Update</button>
                    </div>
                </div>
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
