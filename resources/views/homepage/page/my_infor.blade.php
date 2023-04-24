@extends('homepage.master')
@section('content')
<div class="login-page mt-100" id="clientRegisterPage">
    <div class="container">
            <div class="section-header mb-3">
                <h4 class="section-heading text-center">Update my information</h4>
            </div>
            <div class="row">
                <div class="col-4">
                    <fieldset>
                        <label class="label">First name</label>
                        <input v-model="accountUpdate.first_name" class="form-control" type="text">
                    </fieldset>
                </div>
                <div class="col-4">
                    <fieldset>
                        <label class="label">Last name</label>
                        <input v-model="accountUpdate.last_name" type="text" class="form-control">
                    </fieldset>
                </div>
                <div class="col-4">
                    <fieldset>
                        <label class="label">Phone Number</label>
                        <input v-model="accountUpdate.phone_number" type="text" class="form-control">
                    </fieldset>
                </div>
                <div class="col-4">
                    <fieldset>
                        <label class="label">Address</label>
                        <input v-model="accountUpdate.address" type="text" class="form-control">
                    </fieldset>
                </div>
                <div class="col-4">
                    <fieldset>
                        <label class="label">City</label>
                        <input v-model="accountUpdate.city"  type="text" class="form-control">
                    </fieldset>
                </div>
                <div class="col-4">
                    <fieldset>
                        <label class="label">Male</label>
                        <select v-model="accountUpdate.male" class="form-control">
                            <option value="1">Male</option>
                            <option value="0">Female</option>
                            <option value="2">Orther</option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-4">
                    <fieldset>
                        <label class="label">Email address</label>
                        <input class="form-control" v-model="accountUpdate.email"  type="email" placeholder="Email address">
                    </fieldset>
                </div>
                <div class="col-12 mt-3 ">
                    <div class="col-4 float-end">
                        <button v-on:click="updateMyInfor()" type="button" class="btn-primary d-block mt-3 btn-signin">Update</button>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
@section('js')
@endsection
