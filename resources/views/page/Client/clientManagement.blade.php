@extends('share.master')
@section('content')
    <div class="row" id="client_management">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Client Management</h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td colspan="100%">
                                    <div class="input-group">
                                        <button v-model="inputSearch.email" class="btn btn-outline-primary waves-effect"
                                            type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-search">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                            </svg>
                                        </button>
                                        <input v-model="inputSearch.email" v-on:keyup="search()" type="text"
                                            class="form-control" placeholder="Search the product" aria-label="Amount">
                                        <button v-on:click="search()" v-model="inputSearch.email" class="btn btn-outline-primary waves-effect"
                                            type="button">Search</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Client Account</th>
                                <th scope="col">Client Name</th>
                                <th scope="col">Client phone</th>


                                <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, key) in user">
                                <th scope="row">@{{ key + 1 }}</th>
                                <td>@{{ value.email }}</td>
                                <td>@{{ value.first_name }} @{{ value.last_name }}</td>
                                <td>@{{ value.phone_number }}</td>


                                <td style="gap : 20px;display:flex;align-items: center;justify-content: center  ">
                                    {{-- block --}}
                                    <button class="btn btn-danger text-right" v-if="value.block == 1" v-on:click="userBl(value.id)" style="padding: 10px ;font-size:17px"><i
                                            class="fas fa-lock"
                                            ></i></button>
                                    <button class="btn btn-info text-right" v-else  v-on:click="userBl(value.id)" style="padding: 10px ;font-size:17px"><i
                                            class="fas fa-unlock" ></i></button>


                                     {{-- //active --}}
                                    <button class="btn btn-warning text-right" v-on:click="userAT(value.id)" v-if="value.active == 0" style="padding: 10px ;font-size:17px"><i
                                            class="fas fa-xmark"></i></button>
                                    <button class="btn btn-success text-right" v-on:click="userAT(value.id)" v-else style="padding: 10px ;font-size:17px"><i
                                        class="fas fa-check"></i></button>

                                    <i class="fas fa-trash dele-hover"  v-on:click="userDl(value.id)"></i>

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
            el: "#client_management",
            data: {
                inputSearch: {
                    email:''
                },
                user: [],
            },
            created() {
                this.loadUser()
            },
            methods: {
                loadUser() {
                    axios.get('/admin/client/loadUser')
                        .then((res) => {
                            this.user = res.data.datauser

                        })
                },
                userBl(id) {
                    axios
                        .get('/admin/client/userBlocked/' + id)
                        .then((res) => {
                            if (res.data.alert) {
                                res.data.actionBlock ? toastr.warning('locked') : toastr.success('unlocked')
                                this.loadUser()

                            }
                        });
                },
                userAT(id)
                {
                    axios
                        .get('/admin/client/userActive/' + id)
                        .then((res) => {
                            res.data.Actived ? toastr.warning('unActive') : toastr.success('Active')
                            this.loadUser()
                        });
                },
                userDl(id)
                {
                     if(confirm('are you sure about that')){
                        axios
                            .get('/admin/client/userDelete/' + $id)
                            .then((res) => {
                                if(res.data.alert){
                                    this.loadUser()
                                }
                            });
                }

                },

                search() {

                    axios
                        .post('/admin/client/searchEmail', this.inputSearch)
                        .then((res) => {
                            this.user = res.data.dataEmail;
                        });
                },
            },
        });
    </script>
@endsection
