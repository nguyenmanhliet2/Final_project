@extends('share.master')
@section('content')
    <div class="row" id="admin_ingredient_page">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2>Ingredient</h2>
                </div>
                <div class="card-body">
                    <div class="mb-1">
                        <label>Ingredient's code</label>
                        <input v-model="newIngredientData.code_ingredient" type="text" class="form-control">
                    </div>
                    <div class="mb-1">
                        <label>Ingredient's name</label>
                        <input v-model="newIngredientData.name_ingredient" type="text" class="form-control">
                    </div>
                    <div class="mb-1">
                        <label>Ingredient's slug</label>
                        <input v-model="newIngredientData.slug_ingredient" type="text" class="form-control">
                    </div>
                    <div class="mb-1">
                        <label>Ingredient's status</label>
                        <select v-model="newIngredientData.status_ingredient" class="form-control">
                            <option value="0">Enable</option>
                            <option value="1">Disable</option>
                        </select>
                    </div>
                    <div class="mb-1">
                        <label>Ingredient's quantity</label>
                        <input v-model="newIngredientData.quantity_ingredient" type="text" class="form-control">
                    </div>
                    <div class="mb-1">
                        <label>Ingredient's price</label>
                        <input v-model="newIngredientData.price_ingredient" type="text" class="form-control">
                    </div>
                    <div class="card-footer">
                        <div class="text-end">
                            <button v-on:click="createIngredient()" class="btn btn-primary text-right" style="padding: 10px 41px;">
                                Add Ingredient
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>
                        Table of Ingredient
                    </h2>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Stt</th>
                                <th class="text-center">Ingredient's code</th>
                                <th class="text-center">Ingredient's name</th>
                                <th class="text-center">Ingredient's slug</th>
                                <th class="text-center">Ingredient's status</th>
                                <th class="text-center">Ingredient's quantity</th>
                                <th class="text-center">Ingredient's price</th>
                                <th class="text-center">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(value, key) in list_ingredient">
                                <tr>
                                    <td> @{{ (key + 1) }}</td>
                                    <td> @{{ value.code_ingredient }}</td>
                                    <td> @{{ value.name_ingredient }}</td>
                                    <td> @{{ value.slug_ingredient }}</td>
                                    <td class="text-center align-middle">
                                        <button class="btn btn-primary">Enable</button>
                                        <button class="btn btn-danger">Disable</button>
                                    </td>
                                    <td> @{{ value.quantity_ingredient }}</td>
                                    <td> @{{ value.price_ingredient }}</td>
                                    <td class="text-nowrap text-center align-middle">
                                        <button class="btn btn-primary" >Update</button>
                                        <button class="btn btn-primary" >Delete</button>
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
            el: "#admin_ingredient_page" ,
            data: {
                newIngredientData: {},
                list_ingredient: [],
            },
            created() {
                this.loadIngredient();
            },
            methods: {
                createIngredient() {
                    axios
                        .post('/admin/ingredient/indexIngredient', this.newIngredientData)
                        .then((res) => {
                            toastr.success(res.data.message);
                            this.loadIngredient();
                        });
                },
                loadIngredient() {
                    axios
                       .get('/admin/ingredient/recieveIngredient')
                       .then((res) => {
                            this.list_ingredient = res.data.newData;
                        });
                },
            },
        });
    </script>
@endsection
