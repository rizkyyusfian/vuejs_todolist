<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todolist</title>

    {{-- assets --}}

    {{-- jquery --}}
    <script src="{{asset('assets/jquery-dist/jquery-3.4.1.min.js')}}"></script>

    {{-- vue.js --}}
    <script src="{{asset('assets/vuejs-dist/vue.js')}}"></script>

    {{-- bootstrap --}}
    <link rel="stylesheet" href="{{asset('assets/bootstrap-dist/css/bootstrap.min.css')}}">
    <script src="{{asset('assets/bootstrap-dist/js/bootstrap.min.js')}}"></script>

    {{-- Axios --}}
    <script src="{{asset('assets/axios-dist/axios.min.js')}}"></script>

    {{-- sweetalert --}}

    <style>
        .todolist-wrapper {
            /* margin-top: 50px; */
            border: 1px solid #ccc;
            /* border-radius: 5px; */
            /* padding: 10px; */
            min-height: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div id="app">

            {{-- MODAL --}}
            <div id="modal-from" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Todolist Form</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea rows="5" v-model="content" class="form-control" id="content" placeholder="Content"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" @click="saveTodoList" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="text-right mb-3">
                        <a href="javascript:;" @click="openForm" class="btn btn-primary">Tambah</a>
                    </div>

                    <div class="text-center mb-3">
                        <input type="text" v-model="search" @change="findTodoList" class="form-control" placeholder="Cari Todo List">
                    </div>

                    <div class="todolist-wrapper">
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <tr v-for="item in data_list">
                                    <td>
                                        @{{item.content}}
                                        <a href="javascript:;" @click="editTodoList(item.id)" class="btn btn-secondary">Ubah</a>
                                        <a href="javascript:;" @click="DeleteTodoList(item.id)" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                <tr v-if="!data_list.length">
                                    <td>Data masih kosong</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
    </div>

    <script>
        var app = new Vue({
            el: '#app',
            mounted() {
                this.getTodoList();
            },
            data: {
                data_list: [],
                content: "",
                id: "",
                search: ""
            },
            methods: {
                openForm: function() {
                    $('#modal-from').modal('show');
                },

                getTodoList: function() {
                    axios.get("{{ url('todolist/get')}}?search=" + this.search)
                    .then(response=>{
                        this.data_list = response.data;
                    }).catch(error=>{
                        alert("Terjadi kesalahan");
                        console.log(error);
                    })
                },

                saveTodoList: function() {
                    var form_data = new FormData();
                    form_data.append('content', this.content);

                    if(this.id) {
                        axios.post("{{ url('todolist/update')}}/" + this.id, form_data)
                        .then(response=>{
                            if(response.data.status == true) {
                                alert(response.data.message);
                                this.getTodoList();
                            }
                        }).catch(error=>{
                            alert("Terjadi kesalahan");
                            console.log(error);
                        }).finally(()=>{
                            $('#modal-from').modal('hide');
                        })
                    } else {
                        axios.post("{{ url('todolist/create')}}", form_data)
                        .then(response=>{
                            if(response.data.status == true) {
                                alert(response.data.message);
                                this.getTodoList();
                            }
                        }).catch(error=>{
                            alert("Terjadi kesalahan");
                            console.log(error);
                        }).finally(()=>{
                            $('#modal-from').modal('hide');
                        })
                    }
                },

                editTodoList: function(id) {
                    this.id = id;

                    axios.post("{{ url('todolist/getdetail')}}/" + this.id)
                    .then(response=>{
                        this.content = response.data.content;
                        $('#modal-from').modal('show');
                    }).catch(error=>{
                        alert("Terjadi kesalahan");
                        console.log(error);
                    })
                },

                DeleteTodoList: function(id) {
                    if(confirm("Apakah anda yakin ingin menghapus data ini?")) {
                        axios.post("{{ url('todolist/delete')}}/" + id)
                        .then(response=>{
                            if(response.data.status == true) {
                                alert(response.data.message);
                                this.getTodoList();
                            }
                        }).catch(error=>{
                            alert("Terjadi kesalahan");
                            console.log(error);
                        })
                    }
                },

                findTodoList: function() {
                    this.getTodoList();
                },
            }
        })
    </script>
</body>
</html>
