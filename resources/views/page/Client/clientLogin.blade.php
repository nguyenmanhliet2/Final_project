@extends('homepage.master')
@section('content')
    <div class="login-page mt-100" id="clientLoginPage">
        <div class="container">
            <form action="#" class="login-form common-form mx-auto">
                <div class="section-header mb-3">
                    <h2 class="section-heading text-center">Login</h2>
                </div>
                <div class="row">
                    <div class="col-12">
                        <fieldset>
                            <label class="label">Email address</label>
                            <input type="email" v-model="listLogin.email">
                        </fieldset>
                    </div>
                    <div class="col-12">
                        <fieldset>
                            <label class="label">Password</label>
                            <input type="password" v-model="listLogin.password">
                        </fieldset>
                    </div>
                    <div class="col-12 mt-3">
                        <button type="button" class="btn-primary d-block mt-4 btn-signin" v-on:click="login()">SIGN
                            IN</button>
                        <a href="/indexClientRegister" class="btn-secondary mt-2 btn-signin">CREATE AN ACCOUNT</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        new Vue({
            el: '#clientLoginPage',
            data: {
                listLogin: {
                    email: '',
                    password: ''

                },
            },
            created() {

            },
            methods: {
                login() {
                    axios.post("actionClientLogin", this.listLogin)
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
            },
        });
    </script>
@endsection
