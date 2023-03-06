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
                                        <button v-on:click="switchIngredientStatus(value)" v-if="value.status_ingredient == 0" class="btn btn-primary">Enable</button>
                                        <button v-on:click="switchIngredientStatus(value)" v-else class="btn btn-danger">Disable</button>
                                    </td>
                                    <td> @{{ value.quantity_ingredient }}</td>
                                    <td> @{{ value.price_ingredient }}</td>
                                    <td class="text-nowrap text-center align-middle">
                                        <button class="btn btn-primary" v-on:click="editIngredient = value"  data-bs-toggle="modal" data-bs-target="#editIngredientModal">Update</button>
                                        <button class="btn btn-primary" v-on:click="deleteIngredient = value" data-bs-toggle="modal" data-bs-target="#removeIngredientModal">Delete</button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
                <div class="modal fade" id="editIngredientModal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                    <label>Ingredient's Code</label>
                                    <input v-model="editIngredient.code_ingredient" type="text" class="form-control">
                                </div>
                                <div class="mb-1">
                                    <label>Ingredient's Name</label>
                                    <input v-model="editIngredient.name_ingredient" type="text" class="form-control">
                                </div>
                                <div class="mb-1">
                                    <label>Ingredient's Slug</label>
                                    <input v-model="editIngredient.slug_ingredient" type="text" class="form-control">
                                </div>
                                <div class="mb-1">
                                    <label>Status Of Ingredient</label>
                                    <select v-model="editIngredient.status_ingredient" class="form-control">
                                        <option value="0">Enable</option>
                                        <option value="1">Disable</option>
                                    </select>
                                </div>
                                <div class="mb-1">
                                    <label>Product's Quantity</label>
                                    <input v-model="editIngredient.quantity_ingredient" type="text" class="form-control">
                                </div>
                                <div class="mb-1">
                                    <label>Product's Price</label>
                                    <input v-model="editIngredient.price_ingredient" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" v-on:click='editChangeIngredient()' class="btn btn-primary" data-bs-dismiss="modal">Save
                                    changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="removeIngredientModal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                <button type="button" v-on:click='removeIngredient()' class="btn btn-primary" data-bs-dismiss="modal">Delete</button>
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
            el: "#admin_ingredient_page" ,
            data: {
                deleteIngredient: {},
                editIngredient: {},
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
                switchIngredientStatus(value) {
                    axios
                       .post('/admin/ingredient/switchIngredientStatus', value)
                       .then((res) => {
                            toastr.success("Status of Ingredient has been changed");
                            this.loadIngredient();
                       });
                },
                editChangeIngredient() {
                    axios
                       .post('/admin/ingredient/updateIngredient', this.editIngredient)
                       .then((res) => {
                        if(res.data.updateIngredientData){
                                toastr.success("Update Ingredient successfully");
                                this.loadIngredient();
                            } else {
                                toastr.error("Update fail");
                            }
                        });
                },
                removeIngredient() {
                    axios
                       .post('/admin/ingredient/removeIngredient', this.deleteIngredient)
                       .then((res) => {
                         if(res.data.deleteIngredientStatus) {
                            toastr.success("Remove Ingredient successfully");
                            this.loadIngredient();
                         } else {
                            toastr.error("Remove fail");
                         }
                       });
                }
            },
        });
    </script>
@endsection
