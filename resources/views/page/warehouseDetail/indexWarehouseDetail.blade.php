@extends('share.master')
@section('content')
        <div class="row" id="admin_warehouse_detail_page">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h2>Warehouse Detail</h2>
                    </div>
                    <div class="card-body">
                        <div class="mb-1">
                            <label>Id of Product</label>
                            <input v-model="newDetailData.id_product" type="text" class="form-control">
                        </div>
                        <div class="mb-1">
                            <label>Name of Product</label>
                            <input v-model="newDetailData.name_product" type="text" class="form-control">
                        </div>
                        <div class="mb-1">
                            <label>Input quantity</label>
                            <input v-model="newDetailData.input_quantity" type="text" class="form-control">
                        </div>
                        <div class="mb-1">
                            <label>Input Price</label>
                            <input v-model="newDetailData.input_price" type="text" class="form-control">
                        </div>
                        <div class="mb-1">
                            <label>Id of Warehouse Invoice</label>
                                <select v-model="newDetailData.id_warehouse_invoice" class="form-control">
                                    <template v-for="(value2, key2) in list_warehouseInvoice">
                                        <option v-bind:value="value2.id">@{{ value2.hash }}</option>
                                    </template>
                                </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-end">
                            <button v-on:click="createDetail()" class="btn btn-primary text-right" style="padding: 10px 41px;"> Add Warehouse Detail </button>
                        </div>
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
                                    <th class="text-center">Stt</th>
                                    <th class="text-center">Id of Product</th>
                                    <th class="text-center">Name of Product</th>
                                    <th class="text-center">Input quantity</th>
                                    <th class="text-center">Input Price</th>
                                    <th class="text-center">Id of Warehouse Invoice</th>
                                    <th class="text-center">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(value, key) in list_detail">
                                    <tr>
                                        <td>@{{ key + 1 }} </td>
                                        <td>@{{ value.id_product }} </td>
                                        <td>@{{ value.name_product }} </td>
                                        <td>@{{ value.input_quantity }} </td>
                                        <td>@{{ value.input_price }} </td>
                                        <template v-for="(value1, key1) in list_warehouseInvoice">
                                            <td v-if="value1.id == value.id_warehouse_invoice"> @{{ value1.hash }} </td>
                                        </template>
                                        <td class="text-nowrap text-center align-middle">
                                            <button v-on:click="" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="">Update</button>
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
                newDetailData: {},
                list_detail: [],
                list_warehouseInvoice: [],
                list_productDetail: [],
            },
            created() {
                this.loadDetail();
                this.loadIdInvoice();
            },
            methods: {
                createDetail(){
                    axios
                    .post('/admin/warehouse-detail/indexWarehouseDetailStore', this.newDetailData)
                    .then((res) => {
                        toastr.success(res.data.message);
                        this.loadDetail();
                    });
                },
                loadDetail(){
                    axios
                    .get('/admin/warehouse-detail/recieveWarehouseDetail')
                    .then((res) => {
                        this.list_detail = res.data.newDataDetail;
                    });
                },
                loadIdInvoice(){
                    axios
                    .get('/admin/warehouse-invoice/recieveWarehouseInvoice')
                    .then((res) => {
                        this.list_warehouseInvoice = res.data.newData;
                    });
                },
                loadIdProduct(){
                    axios
                    .get('/admin/product/receiveProductData')
                    .then((res) => {
                        this.list_product = res.data.newData;
                    });
                }
            },
        });
    </script>
@endsection
