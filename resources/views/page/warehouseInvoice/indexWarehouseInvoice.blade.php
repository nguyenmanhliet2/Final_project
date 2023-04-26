@extends('share.master')
@section('content')
    <div class="row" id="admin_invoice_page">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>
                        Quản lý đơn hàng
                    </h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered mt-1">
                        <thead>
                            <tr> <th>#</th>
                                <th>Order Code</th>
                                <th>Real Money</th>
                                <th>Total Money</th>
                                <th>sale Money</th>
                                <th>Người mua hàng </th>

                                <th>Payment Status</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, key) in list_order">
                                <td><span class="fw-bold">@{{ key + 1 }}</span></td>
                                <td>@{{ value.order_code}}</td>
                                <td>@{{ value.real_price}}</td>
                                <td>@{{ value.total_price}}</td>
                                <td>@{{ value.sales_price_product}}</td>
                                <td>@{{ value.last_name}}</td>
                                <td>
                                    <button  v-if="value.payment == 0" type="button" class="btn btn-gradient-danger">Has not been paid</button>
                                    <button  v-else type="button" class="btn btn-gradient-success">Has been paid</button>
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
                                                <span data-bs-toggle="modal" data-bs-target="#exampleModal" v-on:click="getDetail(value.id)">xem chi tiết</span>
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
                                                <span v-on:click="deleDetail(value.id)">Delete</span>
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
                              <h5 class="modal-title" id="exampleModalLabel">Chi tiết đơn hàng : </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered mt-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>

                                            <th>Product's Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>ngày mua hàng </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(value, key) in list_detail">
                                            <td><span class="fw-bold">@{{ key + 1 }}</span></td>
                                            <td>@{{ value.name_product}}</td>
                                            <td>@{{ value.quantity_product}}</td>
                                            <td>@{{ value.unit_price}}</td>
                                            <td>@{{ formatDate(value.created_at) }}</td>

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
                    list_order: [],
                    list_detail: [],
                },
                created() {
                    this.dataOrder()
                },
                methods: {
                    dataOrder() {
                        axios
                            .get('/allOrderdata')
                            .then((res) => {
                                this.list_order = res.data.dataOrder;
                            });
                    },

                    getDetail(id){
                        axios
                            .get('/orderDetailLoad/' + id)
                            .then((res) => {
                                this.list_detail = res.data.dataDetail;
                            });
                    },
                    formatDate(datetime) {
                        const input = datetime;
                        const dateObj = new Date(input);
                        const year = dateObj.getFullYear();
                        const month = (dateObj.getMonth() + 1).toString().padStart(2, '0');
                        const date = dateObj.getDate().toString().padStart(2, '0');
                        const hours = dateObj.getHours().toString().padStart(2, '0');
                        const minutes = dateObj.getMinutes().toString().padStart(2, '0');
                        const seconds = dateObj.getSeconds().toString().padStart(2, '0');
                        const result = `${date}/${month}/${year} - ${hours}:${minutes}:${seconds}`;
                        return result;
                    },

                    deleDetail(id) {
                        if(confirm('Are you sure you want to delete this?')){
                            axios
                            .get('/orderDetailDelete/'+ id)
                            .then((res) => {
                                    toastr.success(res.data.alert) ;
                                    this.dataOrder()

                            });
                        }

                },
                },
            });
        </script>
    @endsection
