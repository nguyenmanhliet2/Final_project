@extends('share.master')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2>Danh Mục</h2>
                </div>
                <div class="card-body">
                    <div class="mb-1">
                        <label>Tên Danh Mục</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-1">
                        <label>Slug Danh Mục</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="mb-1">
                        <label>Tình Trạng</label>
                        <select class="form-control">
                            <option value="0">Hiển Thị</option>
                            <option value="1">Tạm Tắt</option>
                        </select>
                    </div>
                    <div class="mb-1">
                        <label>Danh Mục Cha</label>
                        <select class="form-control">
                            <option value="0">Root</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-end ">
                        <button class="btn btn-primary text-right"
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
                            <tr>
                                <th class="text-center align-middle">1</th>
                                <td class="text-center align-middle">Mark</td>
                                <td class="text-center align-middle">Otto</td>
                                <td class="text-center align-middle">@mdo</td>
                                <td class="text-center align-middle">@mdo</td>
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

</script>
@endsection
