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
                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, key) in list_product">
                                <th scope="row">@{{ key + 1 }}</th>
                                <td>@{{ value.name_product }}</td>
                                <td>
                                    <button v-on:click="createDetail(value)" class="btn btn-primary text-right"
                                        style="padding: 10px 41px;">Edit</button>
                                </td>
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
                                <th class="text-center text-nowrap">Into money</th>
                                <th class="text-center text-nowrap">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(value, key) in list_detail">
                                <tr>
                                    <td>@{{ key + 1 }} </td>
                                    <td>@{{ value.name_product }} </td>
                                    <td>
                                        <input type="number" class="form-control" v-on:blur="increaseQuantity(value)"
                                            v-model="value.input_quantity" v-bind:value="value.input_quantity">
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" v-on:blur="increaseQuantity(value)"
                                            v-model="value.input_price" v-bind:value="value.price_product">
                                    </td>
                                    <td>
                                        @{{ value.input_price * value.input_quantity }} đ
                                    </td>
                                    <td class="text-nowrap text-center align-middle">
                                        <button v-on:click="deleteDetail = value" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#removeDetailModal">Delete</button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                    <div v-show="check == true">
                        <div class="form-floating mt-2" >
                            <textarea  data-length="100" v-model="add.description" class="form-control char-textarea active" rows="3"
                                placeholder="Description" style="height: 100px; color: rgb(78, 81, 84);"></textarea>
                            <label for="textarea-counter">Description</label>
                        </div>
                        <small class="textarea-counter-value float-end" style="background-color: rgb(100, 107, 210);"><span
                                class="char-count">0</span> / 100 </small>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <p class="text-xl-start fs-4 fw-bolder">Total Price: @{{totalPrice}}</p>
                    <p class="text-xl-start fs-5"></p>
                    <button class="btn btn-icon btn-primary waves-effect waves-float waves-light" v-on:click="addProductDetail()" type="button"
                        data-repeater-create="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-plus me-25">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        <span >Add New</span>
                    </button>
                </div>
                <div class="modal fade" id="removeDetailModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Remove</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" v-on:click='removeProduct()' class="btn btn-primary" data-bs-dismiss="modal">Delete</button>
                            </div>
                        </div>
                    </div>
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
                addNewDetail: {},
                deleteDetail: {},
                list_detail: [],
                list_warehouseInvoice: [],
                list_product: [],
                id_warehouse_invoices : {{isset($id_warehouse_invoices) ? $id_warehouse_invoices : 'null'}},
                add : {},
                totalPrice : 0,
                totalQuantity : 0,
                check : false,
            },
            created() {
                this.loadProduct();
                this.loadDetail();
            },
            methods: {
                loadProduct() {
                    axios
                        .get('/admin/warehouse-detail/recieveProduct')
                        .then((res) => {
                            this.list_product = res.data.newData;
                        });
                },

                createDetail(value) {
                    this.check = true;
                    axios
                        .post('/admin/warehouse-detail/createDetail', value)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success("Update Invoice Successfully!");
                                this.loadDetail();
                            } else {
                                toastr.error("Update Fail!");
                            }
                        });
                },

                loadDetail() {
                    axios
                        .get('/admin/warehouse-detail/recieveDetail')
                        .then((res) => {
                            this.list_detail    = res.data.newDataDetail;
                            if(this.list_detail.length > 0) {
                                this.check = true;
                            }
                            this.totalPrice     = res.data.totalPrice;
                            this.totalQuantity  = res.data.totalQuantity;
                        });
                },

                increaseQuantity(value) {
                    axios
                        .post('/admin/warehouse-detail/plusQuantity', value)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success("Update Invoice Successfully!");
                                this.loadDetail();
                            } else {
                                toastr.error("Update Fail!");
                            }
                        });
                },
                removeProduct() {
                    axios
                        .post('/admin/warehouse-detail/removeWarehouseDetail', this.deleteDetail)
                        .then((res) => {
                            if(res.data.deleteDetailStatus) {
                                this.check = false;
                                toastr.success("Delete Detail Successfully!");
                                this.loadDetail();
                                this.loadProduct();
                            } else {
                                toast.error("Delete Fail!");
                            }
                        });
                },
                addProductDetail(){
                    this.add.id_warehouse_invoices = this.id_warehouse_invoices;
                    this.add.totalPrice = this.totalPrice;
                    this.add.totalQuantity = this.totalQuantity;
                    axios
                        .post('/admin/warehouse-detail/addProductDetail', this.add)
                        .then((res) => {
                            if(res.data.status) {
                                this.check = false;
                                toastr.success("Create Detail Successfully!");
                                this.loadDetail();
                                this.add = [];
                            } else {
                                toast.error("Delete Fail!");
                            }
                        });
                }
            },
        });
    </script>
@endsection


