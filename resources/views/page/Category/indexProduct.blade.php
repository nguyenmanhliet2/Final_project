@extends('share.master')
@section('content')
    <div class="row" id="admin_product_page">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2>Product</h2>
                </div>
                <div class="card-body">
                    <div class="mb-1">
                        <label>Product's name</label>
                        <input v-model="newProductData.name_product" type="text" class="form-control">
                    </div>
                    <div class="mb-1">
                        <label>Product's Slug</label>
                        <input v-model="newProductData.slug_product" type="text" class="form-control">
                    </div>
                    <div class="mb-1">
                        <label>Status Of Product</label>
                        <select v-model="newProductData.status_product" class="form-control">
                            <option value="0">Enable</option>
                            <option value="1">Disable</option>
                        </select>
                    </div>
                    <div class="mb-1">
                        <label>Product's Category</label>
                        <select v-model="newProductData.id_product" class="form-control">
                            <option value="0">Root</option>
                            <template v-for="(v, k) in list_product">
                                <option v-bind:value="v.id">@{{ v.name_product }}</option>
                            </template>
                        </select>
                    </div>
                    <div class="mb-1">
                        <label>Product's Description</label>
                        <input v-model="newProductData.description_product" type="text" class="form-control">
                    </div>
                    <div class="mb-1">
                        <label>Image</label>
                        <input v-model="newProductData.image_product" type="text" class="form-control">
                    </div>
                    <div class="mb-1">
                        <label>Product's Price</label>
                        <input v-model="newProductData.price_product" type="text" class="form-control">
                    </div>
                    <div class="mb-1">
                        <label>Product's Quantity</label>
                        <input v-model="newProductData.quantity_product" type="text" class="form-control">
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-end ">
                        <button v-on:click="createProduct()" class="btn btn-primary text-right"
                            style="
                            padding: 10px 41px;">Add Product</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Table of Product</h2>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">stt</th>
                                <th class="text-center">Product's name</th>
                                <th class="text-center">Product's Slug</th>
                                <th class="text-center">Status of Product</th>
                                <th class="text-center">Product's Category</th>
                                <th class="text-center">Product's Description</th>
                                <th class="text-center">Product's Price</th>
                                <th class="text-center">Product's Quantity</th>
                                <th class="text-center">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(value, key) in list_product">
                                <tr>
                                    <td>@{{ ( key +1 ) }}</td>
                                    <td>@{{ value.name_product }}</td>
                                    <td>@{{ value.slug_product }}</td>
                                    <td class="text-center align-middle">
                                        <button class="btn btn-primary">Enable</button>

                                    </td>
                                    <td>@{{ value.id_product }}</td>
                                    <td>@{{ value.description_product }}</td>
                                    <td>@{{ value.image_product }}</td>
                                    <td>@{{ value.price_product }}</td>
                                    <td class="text-nowrap text-center align-middle">
                                        <button class="btn btn-primary"  data-bs-toggle="modal"
                                            data-bs-target="">Update</button>
                                        <button class="btn btn-danger"  data-bs-toggle="modal"
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
            el: "#admin_product_page" ,
            data: {
                newProductData: {},
                list_product: [],
            },
            created() {
                this.loadProduct();
            },
            methods: {
                createProduct() {
                    axios
                        .post('/admin/product/indexNewProduct', this.newProductData)
                        .then((res) => {
                            toastr.success(res.data.message);
                            this.loadProduct();
                        });
                },
                loadProduct() {
                    axios
                        .get('/admin/product/receiveProductData')
                        .then((res) => {
                            this.list_product = res.data.newData;
                        });
                },
            },
        });

    </script>
@endsection
