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
                        <input v-on:keyup="toSlug(newProductData.name_product)" v-model="newProductData.name_product" type="text" class="form-control">
                    </div>
                    <div class="mb-1">
                        <label>Product's Slug</label>
                        <input v-model="slug_product" type="text" class="form-control">
                    </div>
                    <div class="mb-1">
                        <label>Status Of Product</label>
                        <select v-model="newProductData.status_product" class="form-control">
                            <option value="1">Enable</option>
                            <option value="0">Disable</option>
                        </select>
                    </div>
                    <div class="mb-1">
                        <label>Product's Category</label>
                        <select v-model="newProductData.id_product_catalog" class="form-control">
                            <template v-for="(v, k) in list_category">
                                <option v-bind:value="v.id">@{{ v.name_category }}</option>
                            </template>
                        </select>
                    </div>
                    <div class="mb-1">
                        <fieldset>
                            <label>Product's Description</label>
                            <label for="placeTextarea"></label>
                            <textarea name="description_product" cols="30" rows="10" class="form-control"></textarea>
                        </fieldset>
                    </div>
                    <div class="mb-0">
                        <label>Image</label>
                        <div class="input-group">
                            <input v-model="newProductData.image_product" type="text" class="form-control" id="thumbnail">
                            <input type="button" data-input="thumbnail" data-preview="holder" id="lfm" value="Upload" class="btn btn-info">
                        </div>
                        <img id="holder" style="margin-top:15px;max-height:100px;">
                    </div>
                    <div class="mb-1">
                        <label>Product's Price</label>
                        <input  v-model="newProductData.price_product" type="number" class="form-control">
                    </div>
                    <div class="mb-1">
                        <label>Product's Quantity</label>
                        <input  v-model="newProductData.quantity_product" type="number" class="form-control">
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-end ">
                        <button v-on:click="createProduct()" class="btn btn-primary text-right"
                            style="padding: 10px 41px;">Add Product</button>
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
                                    <td class="text-center align-middle">@{{ ( key +1 ) }}</td>
                                    <td class="text-center align-middle">@{{ value.name_product }}</td>
                                    <td class="text-center align-middle">
                                        <button v-on:click="switchProductStatus(value)" v-if="value.status_product == 0" class="btn btn-danger">Disable</button>
                                        <button v-on:click="switchProductStatus(value)" v-else class="btn btn-primary">Enable</button>
                                    </td>
                                    <td class="text-center align-middle">@{{ value.id_product_catalog }}</td>
                                    <td class="text-center align-middle" v-html="value.description_product"></td>
                                    <td class="text-center align-middle">@{{ value.price_product }}</td>
                                    <td class="text-center align-middle">@{{ value.quantity_product }}</td>
                                    <td class="text-nowrap text-center align-middle">
                                        <button class="btn btn-primary" v-on:click="editProduct = value"  data-bs-toggle="modal"
                                            data-bs-target="#editProductModal">Update</button>
                                        <button class="btn btn-danger" v-on:click="deleteProduct = value" data-bs-toggle="modal"
                                            data-bs-target="#removeProductModal">Delete</button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
                <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                    <label>Product's name</label>
                                    <input v-model="editProduct.name_product" type="text" class="form-control">
                                </div>
                                <div class="mb-1">
                                    <label>Product's Slug</label>
                                    <input v-model="editProduct.slug_product" type="text" class="form-control">
                                </div>
                                <div class="mb-1">
                                    <label>Status Of Product</label>
                                    <select v-model="editProduct.status_product" class="form-control">
                                        <option value="0">Enable</option>
                                        <option value="1">Disable</option>
                                    </select>
                                </div>
                                <div class="mb-1">
                                    <label>Product's Category</label>
                                    <select  class="form-control">
                                        <template v-for="(v, k) in list_category">
                                            <option v-bind:value="v.id">@{{ v.name_category }}</option>
                                        </template>
                                    </select>
                                </div>
                                <div class="mb-1">
                                    <label>Product's Description</label>
                                    <input v-model="editProduct.description_product" type="text" class="form-control">
                                </div>
                                <div class="mb-1">
                                    <label>Product's Image</label>
                                    <input v-model="editProduct.image_product" type="text" class="form-control">
                                </div>
                                <div class="mb-1">
                                    <label>Product's Price</label>
                                    <input v-model="editProduct.price_product" type="text" class="form-control">
                                </div>
                                <div class="mb-1">
                                    <label>Product's Quantity</label>
                                    <input v-model="editProduct.quantity_product" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" v-on:click='editChangeProduct()' class="btn btn-primary" data-bs-dismiss="modal">Save
                                    changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Remove -->
                <div class="modal fade" id="removeProductModal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
            el: "#admin_product_page" ,
            data: {
                editProduct: {},
                deleteProduct: {},
                newProductData: {},
                list_product: [],
                list_category: [],
                slug_product: '',
            },
            created() {
                this.loadProduct();
            },
            methods: {
                toSlug(str) {
                    console.log(str);
                    str = str.toLowerCase();
                    str = str
                    .normalize('NFD')
                    .replace(/[\u0300-\u036f]/g, '');
                    str = str.replace(/[đĐ]/g, 'd');
                    str = str.replace(/([^0-9a-z-\s])/g, '');
                    str = str.replace(/(\s+)/g, '-');
                    str = str.replace(/-+/g, '-');
                    str = str.replace(/^-+|-+$/g, '');
                    this.slug_product = str;
                },

                createProduct() {
                    this.newProductData.slug_product = this.slug_product;
                    this.newProductData.image_product = $('#thumbnail').val();
                    this.newProductData.description_product = CKEDITOR.instances.description_product.getData();
                    console.log(this.newProductData.description_product);
                    console.log(this.newProductData.image_product);
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
                            this.loadCategory();
                        });
                },

                loadCategory() {
                    axios
                        .get('/admin/product/receiveCategoryData')
                        .then((res) => {
                            this.list_category = res.data.newData;
                        });
                },

                switchProductStatus(value){
                    axios
                       .post('/admin/product/switchProductStatus', value)
                       .then((res) => {
                            toastr.success("Status of product has been changed");
                            this.loadProduct();
                        });
                },
                editChangeProduct(){
                    axios
                       .post('/admin/product/updateProductData', this.editProduct)
                       .then((res) => {
                            if(res.data.updateProductStatus) {
                                toastr.success("Update product successfully");
                                this.loadProduct();
                            } else {
                                toastr.error("Update fail");
                            }
                        });
                },
                removeProduct(){
                    axios
                       .post('/admin/product/removeProductData', this.deleteProduct)
                       .then((res) => {
                            if(res.data.deleteProductStatus) {
                                toastr.success("Delete product successfully");
                                this.loadProduct();
                            } else {
                                toastr.error("Delete fail!")
                            }
                        });
                }
            },
        });
    </script>
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        $('#lfm').filemanager('image');
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Image',
            filebrowserImageBrowseUrl: '/laravel-filemanager/upload?type=Image&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/larevel-filemanager/upload?type=Files&_token='
        };
        CKEDITOR.replace('description_product',options);
    </script>
@endsection
