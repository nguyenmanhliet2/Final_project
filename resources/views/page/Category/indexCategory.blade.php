@extends('share.master')
@section('content')
    <div class="row" id="admin_page">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2>Category</h2>
                </div>
                <div class="card-body">
                    <div class="mb-1">
                        <label>Category's name</label>
                        <input v-on:keyup="toSlug(newData.name_category)" v-model="newData.name_category" type="text" class="form-control">
                    </div>
                    <div class="mb-1">
                        <label>Category's Slug</label>
                        <input v-model="slug_category" type="text" class="form-control">
                    </div>
                    <div class="mb-0">
                        <label>Image</label>
                        <div class="input-group">
                            <input v-model="newData.image_category" type="text" class="form-control" id="thumbnail">
                            <input type="button" data-input="thumbnail" data-preview="holder" id="lfm" value="Upload" class="btn btn-info">
                        </div>
                        <img id="holder" style="margin-top:15px;max-height:100px;">
                    </div>
                    <div class="mb-1">
                        <label>Status of category</label>
                        <select v-model="newData.is_open" class="form-control">
                            <option value="1">Enable</option>
                            <option value="0">Disable</option>
                        </select>
                    </div>
                    <div class="mb-1">
                        <label>Main Category</label>
                        <select v-model="newData.id_category_root" class="form-control">
                            <option value="0">Main</option>
                            <template v-for="(v, k) in list_category_root">
                                <option v-bind:value="v.id">@{{ v.name_category }}</option>
                            </template>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-end ">
                        <button v-on:click="createCategory()" class="btn btn-primary text-right"
                            style="padding: 10px 41px;">Add Category</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Table of Category</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th class="text-center">stt</th>
                                    <th class="text-center">Category's name</th>
                                    <th class="text-center">Status of category</th>
                                    <th class="text-center">Main Category</th>
                                    <th class="text-center">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(value, key) in list_category">
                                    <th class="text-center align-middle">@{{ (key + 1) }}</th>
                                    <td class="text-center align-middle">@{{ value.name_category }}</td>
                                    <td class="text-center align-middle">
                                        <button v-on:click="switchStatus(value)" v-if="value.is_open == 0"
                                            class="btn btn-danger">Disable</button>
                                        <button v-on:click="switchStatus(value)" v-else
                                            class="btn btn-primary">Enable</button>
                                    </td>
                                    <td class="text-center align-middle">
                                        @{{ value.name_category_root === null ? 'Main' : value.name_category_root}}
                                    </td>
                                    <td class="text-nowrap text-center align-middle">
                                        <button class="btn btn-primary" v-on:click="edit = value" data-bs-toggle="modal"
                                            data-bs-target="#editModal">Update</button>
                                        <button class="btn btn-danger" v-on:click="remove = value" data-bs-toggle="modal"
                                            data-bs-target="#removeModal">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Modal update -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                    <label>Category's name</label>
                                    <input v-model="edit.name_category" type="text" class="form-control">
                                </div>
                                <div class="mb-1">
                                    <label>Category's Slug</label>
                                    <input v-model="edit.slug_category" type="text" class="form-control">
                                </div>
                                <div class="mb-1">
                                    <label>Image</label>
                                    <input v-model="edit.image_category" type="text" class="form-control">
                                </div>
                                <div class="mb-1">
                                    <label>Status</label>
                                    <select v-model="edit.is_open" class="form-control">
                                        <option value="0">Enable</option>
                                        <option value="1">Disable</option>
                                    </select>
                                </div>
                                <div class="mb-1">
                                    <label>Category root</label>
                                    <select v-model="edit.id_category_root" class="form-control">
                                        <option value="0">Root</option>
                                        <template v-for="(v, k) in list_category_root">
                                            <option v-bind:value="v.id">@{{ v.name_category }}</option>
                                        </template>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" v-on:click='editChangeCategory()' class="btn btn-primary"
                                    data-bs-dismiss="modal">Save
                                    changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Remove -->
                <div class="modal fade" id="removeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Remove</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you will delete this?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" v-on:click='removeCategory()' class="btn btn-primary"
                                    data-bs-dismiss="modal">Save
                                    changes</button>
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
            el: "#admin_page",
            data: {
                newData: {},
                edit: {},
                remove: {},
                list_category: [],
                list_category_root: [],
                slug_category : '',
            },
            created() {
                this.loadCategory();
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
                    this.slug_category = str;
                },
                createCategory() {
                    this.newData.slug_category = this.slug_category;
                    this.newData.image_category = $('#thumbnail').val();
                    axios
                        .post("/admin/category/index", this.newData)
                        .then((res) => {
                            toastr.success(res.data.message);
                            this.loadCategory();
                        });
                },
                loadCategory() {
                    axios
                        .get('/admin/category/getData')
                        .then((res) => {
                            this.list_category = res.data.data;
                            this.list_category_root = res.data.categoryCha;
                        });
                },
                editChangeCategory() {
                    axios
                        .post('/admin/category/updateData', this.edit)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success("Update category successfully");
                                this.loadCategory();
                            } else {
                                toastr.error("Update fail");
                            }
                        });
                },
                removeCategory() {
                    axios
                        .post('/admin/category/removeData', this.remove)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success("Remove category successfully");
                                this.loadCategory();
                            } else {
                                toastr.error("Remove fail");
                            }
                        });
                },
                switchStatus(value) {
                    axios
                        .post('/admin/category/switchStatus', value)
                        .then((res) => {
                            toastr.success("Status has been changed");
                            this.loadCategory();
                        });
                },
            },
        });
    </script>
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>
@endsection
