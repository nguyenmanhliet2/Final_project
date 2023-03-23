@extends('share.master')
@section('content')
    <div class="row" id="admin_register_page">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2>Admin Create</h2>
                </div>
                <div class="card-body">
                    <div class="mb-1">
                        <label>First Name</label>
                        <input v-model="list_account.first_name" type="text" class="form-control" placeholder="First Name"
                            required="">
                    </div>
                    <div class="mb-1">
                        <label>Last Name</label>
                        <input v-model="list_account.last_name" type="text" class="form-control" placeholder="Last Name"
                            required="">
                    </div>
                    <div class="mb-1">
                        <label>Phone Number</label>
                        <input v-model="list_account.phone_number" type="number" class="form-control"
                            placeholder="Phone Number" required="">
                    </div>
                    <div class="mb-1">
                        <label>Address</label>
                        <input v-model="list_account.address" type="text" class="form-control" placeholder="Address"
                            required="">
                    </div>
                    <div class="mb-1">
                        <label>City</label>
                        <input v-model="list_account.city" type="text" class="form-control" placeholder="City"
                            required="">
                    </div>
                    <div class="mb-1">
                        <label>Male</label>
                        <select v-model="list_account.male" class="form-control" required="">
                            <option value="1">Male</option>
                            <option value="0">Female</option>
                            <option value="2">Orther</option>
                        </select>
                    </div>
                    <div class="mb-1">
                        <label>Email</label>
                        <input v-model="list_account.email" type="email" class="form-control" placeholder="Email"
                            required="">
                    </div>
                    <div class="mb-1">
                        <label>Password</label>
                        <input v-model="list_account.password" type="password" class="form-control" placeholder="Password"
                            required="">
                    </div>
                    <div class="mb-1">
                        <label>Confirm Password</label>
                        <input v-model="list_account.confirm_password" type="password" class="form-control"
                            placeholder="Confirm Password" required="">
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-end ">
                        <button v-on:click="createAdmin()" class="btn btn-primary text-right"
                            style="padding: 10px 41px;" type="button">Create Admin</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Table of Admin</h2>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">stt</th>
                                <th class="text-center">First Name</th>
                                <th class="text-center">Last Name</th>
                                <th class="text-center">Phone Number</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">City</th>
                                <th class="text-center">Male</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Password</th>
                                <th class="text-center">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(value, key) in list_account_data">
                                <tr>
                                    <td class="text-center align-middle">@{{ (key + 1) }}</td>
                                    <td class="text-center align-middle">@{{ value.first_name }}</td>
                                    <td class="text-center align-middle">@{{ value.last_name }}</td>
                                    <td class="text-center align-middle">@{{ value.phone_number }}</td>
                                    <td class="text-center align-middle">@{{ value.address }}</td>
                                    <td class="text-center align-middle">@{{ value.city }}</td>
                                    <td class="text-center align-middle">
                                        @{{ value.male === 1 ? 'Male' : value.male }}
                                    </td>
                                    <td>@{{ value.email }}</td>
                                    <td>@{{ value.password }}</td>
                                    <td class="text-nowrap text-center align-middle">
                                        <button class="btn btn-primary" v-on:click="editAdmin = value"
                                            data-bs-toggle="modal" data-bs-target="#editAdminModal">Update</button>
                                        <button class="btn btn-danger" v-on:click="deleteAdmin = value"
                                            data-bs-toggle="modal" data-bs-target="#removeAdminModal">Delete</button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
                <div class="modal fade" id="editAdminModal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                    <label>First Name</label>
                                    <input v-model="list_account.first_name" type="text" class="form-control" placeholder="First Name"
                                        required="">
                                </div>
                                <div class="mb-1">
                                    <label>Last Name</label>
                                    <input v-model="list_account.last_name" type="text" class="form-control" placeholder="Last Name"
                                        required="">
                                </div>
                                <div class="mb-1">
                                    <label>Phone Number</label>
                                    <input v-model="list_account.phone_number" type="number" class="form-control"
                                        placeholder="Phone Number" required="">
                                </div>
                                <div class="mb-1">
                                    <label>Address</label>
                                    <input v-model="list_account.address" type="text" class="form-control" placeholder="Address"
                                        required="">
                                </div>
                                <div class="mb-1">
                                    <label>City</label>
                                    <input v-model="list_account.city" type="text" class="form-control" placeholder="City"
                                        required="">
                                </div>
                                <div class="mb-1">
                                    <label>Male</label>
                                    <select v-model="list_account.male" class="form-control" required="">
                                        <option value="1">Male</option>
                                        <option value="0">Female</option>
                                        <option value="2">Orther</option>
                                    </select>
                                </div>
                                <div class="mb-1">
                                    <label>Email</label>
                                    <input v-model="list_account.email" type="email" class="form-control" placeholder="Email"
                                        required="">
                                </div>
                                <div class="mb-1">
                                    <label>Password</label>
                                    <input v-model="list_account.password" type="password" class="form-control" placeholder="Password"
                                        required="">
                                </div>
                                <div class="mb-1">
                                    <label>Confirm Password</label>
                                    <input v-model="list_account.confirm_password" type="password" class="form-control"
                                        placeholder="Confirm Password" required="">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" v-on:click='editChangeAdmin()' class="btn btn-primary"
                                    data-bs-dismiss="modal">Save
                                    changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Remove -->
                <div class="modal fade" id="removeAdminModal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                <button type="button" v-on:click='removeAdmin()' class="btn btn-primary"
                                    data-bs-dismiss="modal">Delete</button>
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
            el: '#admin_register_page',
            data: {
                deleteAdmin: {},
                editAdmin: {},
                list_account: {},
                list_account_data: [],
            },
            created() {
                this.loadAdmin();
            },
            methods: {
                createAdmin() {
                    axios
                        .post("/createAdminAccount", this.list_account)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.message);
                                this.loadAdmin();
                            }
                        });
                },
                loadAdmin() {
                    axios
                       .get('/recieveAdmin')
                       .then((res) => {
                            this.list_account_data = res.data.newData;
                        });
                },
                editChangeAdmin() {
                    axios
                       .post('/updateAdmin', this.editAdmin)
                       .then((res) => {
                        if(res.data.updateAdminData){
                                toastr.success("Update Ingredient successfully");
                                this.loadAdmin();
                            } else {
                                toastr.error("Update fail");
                            }
                        });
                },
                removeAdmin() {
                    axios
                       .post('/removeAdmin', this.deleteAdmin)
                       .then((res) => {
                         if(res.data.deleteAdminStatus) {
                            toastr.success("Remove Ingredient successfully");
                            this.loadAdmin();
                         } else {
                            toastr.error("Remove fail");
                         }
                       });
                }
            },
        });
    </script>
@endsection
