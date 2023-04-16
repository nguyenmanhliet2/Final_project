@extends('homepage.master')
@section('content')
<div class="login-page mt-100" id="clientRegisterPage">
    <div class="container">
        <form action="#" class="login-form common-form mx-auto">
            <div class="section-header mb-3">
                <h2 class="section-heading text-center">Register</h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <fieldset>
                        <label class="label">First name</label>
                        <input v-model="list_account.first_name" class="form-control" type="text">
                    </fieldset>
                </div>
                <div class="col-12">
                    <fieldset>
                        <label class="label">Last name</label>
                        <input v-model="list_account.last_name" type="text" class="form-control">
                    </fieldset>
                </div>
                <div class="col-12">
                    <fieldset>
                        <label class="label">Phone Number</label>
                        <input v-model="list_account.phone_number" type="text" class="form-control">
                    </fieldset>
                </div>
                <div class="col-12">
                    <fieldset>
                        <label class="label">Address</label>
                        <input v-model="list_account.address" type="text" class="form-control">
                    </fieldset>
                </div>
                <div class="col-12">
                    <fieldset>
                        <label class="label">City</label>
                        <input v-model="list_account.city"  type="text" class="form-control">
                    </fieldset>
                </div>
                <div class="col-12">
                    <fieldset>
                        <label class="label">Male</label>
                        <select v-model="list_account.male" class="form-control">
                            <option value="1">Male</option>
                            <option value="0">Female</option>
                            <option value="2">Orther</option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-12">
                    <fieldset>
                        <label class="label">Email address</label>
                        <input v-model="list_account.email"  type="email" placeholder="Email address">
                    </fieldset>
                </div>
                <div class="col-12">
                    <fieldset>
                        <label class="label">Password</label>
                        <input v-model="list_account.password" type="password" placeholder="Password">
                    </fieldset>
                </div>
                <div class="col-12">
                    <fieldset>
                        <label class="label">Confirm Password</label>
                        <input v-model="list_account.re_password" type="password" placeholder="retype password">
                    </fieldset>
                </div>
                <div class="col-12 mt-3">
                    <button v-on:click="createClient()" type="submit" class="btn-primary d-block mt-3 btn-signin">CREATE</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('js')
<script>
    new Vue({
        el: '#clientRegisterPage',
        data: {
            list_account: {},
        },
        created() {

        },
        methods: {
            createClient() {
                    axios
                        .post("/createClientAccount", this.list_account)
                        .then((res) => {
                            if(res.data.status){
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
        },
    });
</script>
@endsection
