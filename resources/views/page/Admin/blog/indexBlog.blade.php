@extends('share.master')
@section('content')
    <div id="admin_blog">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h2>Blog</h2>
                </div>
                <div class="card-body">
                    {{-- <div class="mb-1">
                        <label>User Id</label>
                        <input v-model="newData.id_nguoi_viet" type="text" class="form-control">
                    </div> --}}
                    <div class="mb-1">
                        <label>Blog Title</label>
                        <input v-model="newData.title" type="text" class="form-control">
                    </div>
                    <div class="mb-1">
                        <label>Blog Content</label>
                        <textarea  cols="5" rows="5" v-model="newData.content" type="text" class="form-control"> </textarea>
                    </div>
                    <div class="mb-1">
                        <label>Blog Image</label>
                        <input v-model="newData.hinh_anh" type="text" class="form-control">
                    </div>
                    {{-- <div class="mb-0">
                        <label>Blog Image</label>
                        <div class="input-group">
                            <input v-model="newData.hinh_anh" type="text" class="form-control" id="thumbnail">
                            <input type="button" data-input="thumbnail" data-preview="holder" id="lfm" value="Upload" class="btn btn-info">
                        </div>
                        <img id="holder" style="margin-top:15px;max-height:100px;">
                    </div> --}}
                </div>
                <div class="card-footer">
                    <div class="text-end ">
                        <button v-on:click="createBlog()" class="btn btn-primary text-right" style="padding: 10px 41px;">Add
                            Blog</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="card">
                <div class="card-header">
                    <h2>Table of Blog</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th class="text-center">stt</th>
                                    <th class="text-center">Admin Id</th>
                                    <th class="text-center">Blog Title</th>
                                    <th class="text-center">Blog Content</th>
                                    <th class="text-center">Blog img</th>
                                    <th class="text-center">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(value, key) in listPost">
                                    <th class="text-center align-middle">@{{ (key + 1) }}</th>
                                    <td class="text-center align-middle">@{{ value.id_nguoi_viet }}</td>
                                    <td class="text-center align-middle">@{{ value.title }}</td>
                                    <td class="text-center align-middle">@{{ value.content }}</td>
                                    <td class="text-center align-middle"><img v-bind:src=" value.hinh_anh" alt="">
                                    </td>
                                    <td class="text-nowrap text-center align-middle">
                                        <button class="btn btn-danger" v-on:click="removePost(value.id)">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Modal update -->
                {{-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                </div> --}}
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        new Vue({
            el: "#admin_blog",
            data: {
                newData: {
                    title: '',
                    content: '',
                    hinh_anh: '',
                },
                listPost: [],

            },
            created() {
                this.loadBlog();
            },
            methods: {
                createBlog() {
                    axios
                        .post("/test/baiviet", this.newData)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.message);
                                this.loadBlog();
                                this.newData.title    = ' '
                                this.newData.content  = ' '
                                this.newData.hinh_anh = ' '
                            }

                        });
                },
                loadBlog() {
                    axios
                        .get('/test/showallbaiviet')
                        .then((res) => {
                            if (res.data.st) {
                                this.listPost = res.data.data;
                                toastr.info('data is vaild');
                            } else {
                                toastr.warning(res.data.mess)
                            }
                        });
                },
                removePost(id) {
                    if(confirm('xóa nha')){
                        axios.get('/test/deleteallbaiviet/' + id)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.message);
                                this.loadBlog();
                            }
                        });
                    }

                }
            },
        });
    </script>
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>
@endsection
