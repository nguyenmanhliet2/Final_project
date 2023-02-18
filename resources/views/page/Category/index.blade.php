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
                        <input v-model="newData.name_category" type="text" class="form-control">
                    </div>
                    <div class="mb-1">
                        <label>Category's Slug</label>
                        <input v-model="newData.slug_category" type="text" class="form-control">
                    </div>

                    <div class="mb-1">
                        <label>Status of category</label>
                        <select v-model="newData.is_open" class="form-control">
                            <option value="0">Hiển Thị</option>
                            <option value="1">Tạm Tắt</option>
                        </select>
                    </div>
                    <div class="mb-1">
                        <label>Category root</label>
                        <select v-model="newData.id_category_root" class="form-control">
                            <option value="0">Root</option>
                            <template v-for="(v, k) in list_category_root">
                                <option v-bind:value="v.id">@{{ v.name_category }}</option>
                            </template>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-end ">
                        <button v-on:click="createCategory()" class="btn btn-primary text-right"
                            style="
                        padding: 10px 41px;">Thêm</button>
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
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th class="text-center">stt</th>
                                <th class="text-center">Category's name</th>
                                <th class="text-center">Category's Slug</th>
                                <th class="text-center">Status of category</th>
                                <th class="text-center">Category root</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, key) in list_category">
                                <th class="text-center align-middle">@{{ (key + 1) }}</th>
                                <td class="text-center align-middle">@{{ value.name_category }}</td>
                                <td class="text-center align-middle">@{{ value.slug_category }}</td>
                                <td class="text-center align-middle">
                                    <button v-on:click="switchStatus(value)" v-if="value.is_open == 0" class="btn btn-primary">Hiển thị</button>
                                    <button v-on:click="switchStatus(value)" v-else class="btn btn-danger">Tạm tắt</button>
                                </td>
                                <td class="text-center align-middle">
                                    <template v-if="value.name_category_root == null">
                                        Root
                                    </template>
                                    <template v-else>
                                        @{{ value.name_category_root }}
                                    </template>
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
                <!-- Modal remove -->
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
                                    <label>Tên Danh Mục</label>
                                    <input v-model="edit.name_category" type="text" class="form-control">
                                </div>
                                <div class="mb-1">
                                    <label>Slug Danh Mục</label>
                                    <input v-model="edit.slug_category" type="text" class="form-control">
                                </div>

                                <div class="mb-1">
                                    <label>Status</label>
                                    <select v-model="edit.is_open" class="form-control">
                                        <option value="0">Hiển Thị</option>
                                        <option value="1">Tạm Tắt</option>
                                    </select>
                                </div>
                                <div class="mb-1">
                                    <label>Danh Mục Cha</label>
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
                                <button type="button" v-on:click='editChangeCategory()' class="btn btn-primary">Save
                                    changes</button>
                            </div>
                        </div>
                    </div>
                </div>
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

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" v-on:click='removeCategory()' class="btn btn-primary">Save
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

            },
            created() {
                this.loadCategory();
            },
            methods: {
                createCategory() {
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
                        .post('/admin/category/switchStatus',value)
                        .then((res) => {
                            toastr.success("Status has been changed");
                            this.loadCategory();
                        });
                },
            },
        });
    </script>
@endsection
