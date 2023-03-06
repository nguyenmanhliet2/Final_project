@extends('share.master')
@section('content')
    <div class="row" id="admin_invoice_page">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header"> Warehouse Invoice </div>
                <div class="card-body">
                    <div class="mb-1">
                        <label>Hash Code</label>
                        <input v-model="newInvoiceData.hash" type="text" class="form-control">
                    </div>
                    <div class="mb-1">
                        <label>Order Code</label>
                        <input v-model="newInvoiceData.order_code" type="text" class="form-control">
                    </div>
                    <div class="mb-1">
                        <label>Total Money</label>
                        <input v-model="newInvoiceData.total_money" type="text" class="form-control">
                    </div>
                    <div class="mb-1">
                        <label>Total Amount</label>
                        <input v-model="newInvoiceData.total_amount" type="text" class="form-control">
                    </div>
                    <div class="mb-1">
                        <label>Status Of Invoice</label>
                        <select v-model="newInvoiceData.status" class="form-control">
                            <option value="0">Unpaid</option>
                            <option value="1">Paid</option>
                        </select>
                    </div>
                    <div class="mb-1">
                        <label>Payments</label>
                        <select v-model="newInvoiceData.payment" class="form-control">
                            <option value="0">Cash</option>
                            <option value="1">Bank transfer</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-end">
                        <button v-on:click="createInvoice()" class="btn btn-primary text-right" style="padding: 10px 41px;"> Add Invoice </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h2> Table of Warehouse Invoice </h2>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Stt</th>
                                <th class="text-center">Hash Code</th>
                                <th class="text-center">Order code</th>
                                <th class="text-center">Total money</th>
                                <th class="text-center">Total amount</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Payment</th>
                                <th class="text-center">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(value, key) in list_invoice">
                                <tr>
                                    <td> @{{ ( key + 1 ) }} </td>
                                    <td> @{{ value.hash }} </td>
                                    <td> @{{ value.order_code }} </td>
                                    <td> @{{ value.total_money }} </td>
                                    <td> @{{ value.total_amount }} </td>
                                    <td> @{{ value.status }} </td>
                                    <td> @{{ value.payment }} </td>
                                    <td class="text-nowrap text-center align-middle">
                                        <button v-on:click="editInvoice = value" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#editInvoiceModal">Update</button>
                                        <button v-on:click="deleteInvoice = value" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#removeInvoiceModal">Delete</button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
                <div class="modal fade" id="editInvoiceModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-1">
                                    <label>Hash Code</label>
                                    <input v-model="editInvoice.hash" type="text" class="form-control">
                                </div>
                                <div class="mb-1">
                                    <label>Order code</label>
                                    <input v-model="editInvoice.order_code" type="text" class="form-control">
                                </div>
                                <div class="mb-1">
                                    <label>Total money</label>
                                    <input v-model="editInvoice.total_money" type="text" class="form-control">
                                </div>
                                <div class="mb-1">
                                    <label>Total amount</label>
                                    <input v-model="editInvoice.total_amount" type="text" class="form-control">
                                </div>
                                <div class="mb-1">
                                    <label>Status</label>
                                    <select v-model="editInvoice.status" class="form-control">
                                        <option value="0">Unpaid</option>
                                        <option value="1">Paid</option>
                                    </select>
                                </div>
                                <div class="mb-1">
                                    <label>Payment</label>
                                    <select v-model="editInvoice.payment" class="form-control">
                                        <option value="0">Cash</option>
                                        <option value="1">Bank transfer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" v-on:click="editChangeInvoice()" class="btn btn-primary" data-bs-dismiss="modal">Save
                                    changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="removeInvoiceModal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                <button v-on:click="removeInvoice()" type="button"  class="btn btn-primary" data-bs-dismiss="modal">Delete</button>
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
            el: "#admin_invoice_page" ,
            data: {
                newInvoiceData: {},
                editInvoice: {},
                deleteInvoice: {},
                list_invoice: [],
            },
            created() {
                this.loadInvoice();
            },
            methods: {
                createInvoice(){
                    axios
                        .post('/admin/warehouse-invoice/indexWarehouseInvoiceStore', this.newInvoiceData)
                        .then((res) => {
                            toastr.success(res.data.message);
                            this.loadInvoice();
                        });
                    },
                loadInvoice() {
                    axios
                        .get('/admin/warehouse-invoice/recieveWarehouseInvoice')
                        .then((res) => {
                            this.list_invoice = res.data.newData;
                        });
                    },
                editChangeInvoice() {
                    axios
                        .post('/admin/warehouse-invoice/updateWarehouseInvoice', this.editInvoice)
                        .then((res) => {
                            if(res.data.updateInvoiceStatus){
                                toastr.success("Update Invoice Successfully!");
                                this.loadInvoice();
                            }else {
                                toastr.error("Update Fail!");
                            }
                        });
                },
                removeInvoice() {
                    axios
                        .post('/admin/warehouse-invoice/removeWarehouseInvoice', this.deleteInvoice)
                        .then((res) => {
                            if(res.data.deleteInvoiceStatus){
                                toastr.success("Delete Invoice Successfully!");
                                this.loadInvoice();
                            }else{
                                toastr.error("Remove Fail!");
                            }
                    });
                },
            },
        });
    </script>
@endsection
