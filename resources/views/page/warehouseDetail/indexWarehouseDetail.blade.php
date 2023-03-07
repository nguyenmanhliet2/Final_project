@extends('share.master')
@section('content')
    <div class="row" id="admin_warehouse_detail_page">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2>Warehouse Detail</h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td colspan="100%">
                                    <input type="text" class="form-control" placeholder="Search the product">
                                </td>
                            </tr>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, key) in list_product">
                                <th scope="row">@{{ key + 1 }}</th>
                                <td>@{{ value.name_product }}</td>
                                <td> <button v-on:click="createDetail(value)" class="btn btn-primary text-right"
                                        style="padding: 10px 41px;">
                                        Add </button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2> Table of Warehouse Invoice</h2>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center text-nowrap">Stt</th>
                                <th class="text-center text-nowrap">Name of Product</th>
                                <th class="text-center text-nowrap">Input quantity</th>
                                <th class="text-center text-nowrap">Input Price</th>
                                <th class="text-center text-nowrap">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(value, key) in list_detail">
                                <tr>
                                    <td>@{{ key + 1 }} </td>
                                    <td>@{{ value.name_product }} </td>
                                    <td>
                                        <input type="number" class="form-control" v-on:blur="tangSoLuong(value)" v-model="value.input_quantity" v-bind:value="value.input_quantity">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" v-on:blur="tangSoLuong(value)" v-model="value.input_price" v-bind:value="value.input_price">
                                    </td>
                                    <td class="text-nowrap text-center align-middle">
                                        <button v-on:click="" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="">Delete</button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        new Vue({
            el: "#admin_warehouse_detail_page",
            data: {
                list_detail: [],
                list_warehouseInvoice: [],
                list_product: [],
            },
            created() {
                this.loadProduct();
                this.loadDetail();
            },
            methods: {
                loadProduct(){
                    axios
                        .get('/admin/warehouse-detail/recieveProduct')
                        .then((res) => {
                            this.list_product = res.data.newData;
                        });
                },

                createDetail(value){
                    axios
                        .post('/admin/warehouse-detail/createDetail', value)
                        .then((res) => {
                            if(res.data.status){
                                toastr.success("Update Invoice Successfully!");
                                this.loadDetail();
                            }else {
                                toastr.error("Update Fail!");
                            }
                        });
                },

                loadDetail(){
                    axios
                        .get('/admin/warehouse-detail/recieveDetail')
                        .then((res) => {
                            this.list_detail = res.data.newDataDetail;
                        });
                },

                tangSoLuong(value){
                    axios
                        .post('/admin/warehouse-detail/plusQuantity', value)
                        .then((res) => {
                            if(res.data.updateInvoiceStatus){
                                toastr.success("Update Invoice Successfully!");
                            }else {
                                toastr.error("Update Fail!");
                            }
                        });
                },
            },
        });
    </script>
@endsection
