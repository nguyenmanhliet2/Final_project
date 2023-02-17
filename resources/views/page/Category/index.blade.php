@extends('share.master')
@section('content')
    <div class="row" id="admin_page">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2>Danh Mục</h2>
                </div>
                <div class="card-body">
                    <div class="mb-1">
                        <label>Tên Danh Mục</label>
                        <input v-model="newData.name_category" type="text" class="form-control">
                    </div>
                    <div class="mb-1">
                        <label>Slug Danh Mục</label>
                        <input v-model="newData.slug_category" type="text" class="form-control">
                    </div>

                    <div class="mb-1">
                        <label>Tình Trạng</label>
                        <select v-model="newData.is_open" class="form-control">
                            <option value="0">Hiển Thị</option>
                            <option value="1">Tạm Tắt</option>
                        </select>
                    </div>
                    <div class="mb-1">
                        <label>Danh Mục Cha</label>
                        <select v-model="newData.id_category_root" class="form-control">
                            <option value="0">Root</option>
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
                    <h2>Bảng Danh Mục</h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th class="text-center">stt</th>
                                <th class="text-center">Tên danh mục</th>
                                <th class="text-center">Slug danh mục</th>
                                <th class="text-center">Tình trạng</th>
                                <th class="text-center">Danh mục cha</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, key) in list_category">
                                <th class="text-center align-middle">@{{(key + 1)}}</th>
                                <td class="text-center align-middle">@{{value.name_category}}</td>
                                <td class="text-center align-middle">@{{value.slug_category}}</td>
                                <td class="text-center align-middle">
                                    <template>
                                        <button v-if="value.is_open == 0" class="btn btn-primary">
                                            Hiển thị
                                        </button>
                                    </template>
                                    <template>
                                        <button v-else class="btn btn-danger">
                                            Tạm tắt
                                        </button>
                                    </template>
                                </td>
                                <td class="text-center align-middle">
                                    <template v-if="value.id_category_root == 0">
                                        Root
                                    </template>
                                    <template v-else>
                                        @{{value.name_category}}
                                    </template>
                                </td>
                                <td class="text-nowrap text-center align-middle">
                                    <button class="btn btn-primary">Update</button>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
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
        el      :   "#admin_page",
        data    : {
            newData : {},
            list_category : [],
        },
        created() {
            this.loadCategory();
        },
        methods  : {
            createCategory(){
                axios
                    .post("/admin/category/index", this.newData)
                    .then((res)=>{
                        toastr.success(res.data.message);
                        this.loadCategory();
                    });
            },
            loadCategory(){
                axios
                    .get('/admin/category/getData')
                    .then((res)=>{
                        this.list_category = res.data.data;
                    });
            },
        },

    });
</script>
@endsection
