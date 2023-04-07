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
                    <button type="button" class="btn-primary d-block mt-4 btn-signin" v-on:click="createClient()">SIGN IN</button>
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
            listLogin: {},
        },
        created() {

        },
        methods: {
            createClient() {
                    axios
                        .post("actionClientLogin", this.listLogin)
                        .then((res) => {
                            if(res.data.status){
                                toastr.success("Login successfully!");
                                window.location.href = '/indexHomePage';
                            }
                        });
                },
        },
    });
</script>
@endsection
