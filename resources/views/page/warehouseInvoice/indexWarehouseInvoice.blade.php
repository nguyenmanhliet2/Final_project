@extends('share.master')
@section('content')
    <div class="row" id="admin_invoice_page">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>
                        Warehouse Invoice
                    </h2>
                </div>
                <div class="card-body">
                    <div class="input-group">
                        <button class="btn btn-outline-primary waves-effect" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        </button>
                        <input type="text" class="form-control" placeholder="Search Invoice" aria-label="Amount">
                        <button class="btn btn-outline-primary waves-effect" type="button">Search !</button>
                    </div>
                    <table class="table table-bordered mt-1">
                        <thead>
                            <tr>
                                <th>Order Code</th>
                                <th>Total Money</th>
                                <th>Total Amount</th>
                                <th>Description</th>
                                <th>Payment Status</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, key) in list_invoice">
                                <td><span class="fw-bold">@{{ key + 1 }}</span></td>
                                <td>@{{ value.total_money}}</td>
                                <td>@{{ value.total_amount}}</td>
                                <td>@{{ value.description}}</td>
                                <td>
                                    <button v-on:click="switchInvoiceData(value)" v-if="value.payment == 0" type="button" class="btn btn-gradient-danger">Chưa Thanh Toán</button>
                                    <button v-on:click="switchInvoiceData(value)" v-else type="button" class="btn btn-gradient-success">Đã Thanh Toán</button>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button"
                                            class="btn btn-sm dropdown-toggle hide-arrow py-0 waves-effect waves-float waves-light"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-more-vertical">
                                                <circle cx="12" cy="12" r="1"></circle>
                                                <circle cx="12" cy="5" r="1"></circle>
                                                <circle cx="12" cy="19" r="1"></circle>
                                            </svg>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" style="">
                                            <a class="dropdown-item" href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2 me-50">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg>
                                                <span data-bs-toggle="modal" data-bs-target="#exampleModal" v-on:click="getDetail(value.id)">Info</span>
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-trash me-50">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path
                                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                    </path>
                                                </svg>
                                                <span>Delete</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered mt-1">
                                    <thead>
                                        <tr>
                                            <th>Order Code</th>
                                            <th>Product's Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Into price</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(value, key) in list_Detail">
                                            <td><span class="fw-bold">@{{ key + 1 }}</span></td>
                                            <td>@{{ value.name_product}}</td>
                                            <td>@{{ value.input_quantity}}</td>
                                            <td>@{{ value.input_price}}</td>
                                            <td>@{{ value.into_price}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                el: "#admin_invoice_page",
                data: {
                    list_invoice: [],
                    list_Detail: [],
                },
                created() {
                    this.loadInvoice();
                },
                methods: {
                    loadInvoice() {
                        axios
                            .get('/admin/warehouse-invoice/dataWarehouseInvoice')
                            .then((res) => {
                                this.list_invoice = res.data.dataWarehouseInvoices;
                            });
                    },

                    getDetail(id){
                        axios
                            .get('/admin/warehouse-invoice/dataDetailWarehouseInvoice/' + id)
                            .then((res) => {
                                this.list_Detail = res.data.dataDetailWarehouseDetails;
                            });
                    },
                    switchInvoiceData(value) {
                    axios
                       .post('/admin/warehouse-invoice/switchInvoiceStatus', value)
                       .then((res) => {
                            toastr.success("Status of Ingredient has been changed");
                            this.loadInvoice();
                       });
                },
                },
            });
        </script>
    @endsection
