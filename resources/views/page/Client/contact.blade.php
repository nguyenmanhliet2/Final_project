@extends('share.master')
@section('content')
    <div class="row" id="comment_management">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Contact Management</h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td colspan="100%">
                                    <div class="input-group">
                                        <button v-model="inputSearch" class="btn btn-outline-primary waves-effect"
                                            type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-search">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                            </svg>
                                        </button>
                                        <input v-model="inputSearch" v-on:keyup="search()" type="text"
                                            class="form-control" placeholder="Search the product" aria-label="Amount">
                                        <button v-model="inputSearch" class="btn btn-outline-primary waves-effect"
                                            type="button">Search</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">User Name</th>
                                <th scope="col">User Email</th>
                                <th scope="col">User Phone</th>

                                <th scope="col">Message</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, key) in dataContact">
                                <th scope="row">@{{ key + 1 }}</th>
                                <td>@{{ value.your_name }}</td>
                                <td>@{{  value.your_email }}</td>
                                <td>@{{value.your_phone_number  }}</td>
                                <td>@{{value.message  }}</td>

                                <td style="display: flex ; justify-content: center;">
                                   <i v-on:click="deletedCt(value.id)"class="fas fa-trash dele-hover"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
    @section('js')
        <script>
            new Vue({
                el: "#comment_management",
                data: {
                    dataContact: [],
                },
                created() {
                    this.loadCT()
                },
                methods: {
                    loadCT() {
                        axios
                            .get('/admin/client/loadContact')
                            .then((res) => {
                                this.dataContact = res.data.dataContact;
                            });
                    },

                    deletedCt(id) {
                        axios
                            .get('/admin/client/contactDelete/' + id)
                            .then((res) => {
                                toastr.success(res.data.alert)
                            });
                    },
                    search() {
                        var payload = {
                            'nameProduct': this.inputSearch,
                        };
                        axios
                            .post('/admin/product/searchProduct', payload)
                            .then((res) => {
                                this.list_product = res.data.dataProduct;
                            });
                    },
                },
            });
        </script>
    @endsection
