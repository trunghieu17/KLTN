@extends('share.master')
@section('title')
    Quản Lý Phòng Ban
@endsection
@section('content')
<div class="row" id="app">
    <div class="col-lg-4 col-md-12">
        <div class="card">
            <div class="card-header">
                Thêm Mới Phòng Ban
            </div>
            <div class="card-body">
                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Tên Phòng Ban</label>
                    <input type="text" class="form-control" v-model="phong_ban.name">
                </div>
                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Mô Tả</label>
                    <textarea class="form-control" rows="5" v-model="phong_ban.mo_ta"></textarea>
                </div>
                <hr>
                <div class="mb-3 text-end">
                    <button class="btn btn-primary w-100" v-on:click="create()">Thêm Mới</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="card-header">
                Danh Sách Phòng Ban
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="text-center alig-middle">
                            <tr>
                                <th>#</th>
                                <th>Tên Phòng Ban</th>
                                <th>Mô Tả</th>
                                <th>Tình Trạng</th>
                                <th>Ngày Tạo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(value, index) in list">
                                <tr class="text-nowrap">
                                    <th class="text-center align-middle">@{{ index + 1 }}</th>
                                    <td class="align-middle">@{{ value.name }}</td>
                                    <td class="text-center align-middle">
                                        <button class="btn btn-info" data-toggle="modal" data-target="#chiTietModal" v-on:click="detail = Object.assign({}, value)">Chi Tiết</button>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button v-if="value.is_open" class="btn btn-success" v-on:click="changeStatus(value)">Hoạt Động</button>
                                        <button v-else class="btn btn-danger" v-on:click="changeStatus(value)">Tạm Tắt</button>
                                    </td>
                                    <td class="text-center align-middle">@{{ value.created }}</td>
                                    <td class="text-center align-middle">
                                        <button class="btn btn-primary me-2" data-toggle="modal" data-target="#updateModal" v-on:click="detail = Object.assign({}, value)">Cập Nhật</button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" v-on:click="detail = Object.assign({}, value)">Xóa</button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL -->
    <div class="modal fade" id="chiTietModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Mô Tả</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>@{{ detail.mo_ta }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Phòng Ban</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                    Bạn có chắc chắn muốn xóa <b>@{{ detail.name }}</b> không?
                  </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" v-on:click="destroy()">Xác Nhận</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cập Nhật Phòng Ban</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Tên Phòng Ban</label>
                    <input type="text" class="form-control" v-model="detail.name">
                </div>
                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Mô Tả</label>
                    <textarea class="form-control" rows="5" v-model="detail.mo_ta"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" v-on:click="update()">Xác Nhận</button>
            </div>
            </div>
        </div>
    </div>
    <!-- ENDMODAL -->
</div>
@endsection
@section('js')
<script>
    new Vue({
        el      : "#app",
        data    : {
            phong_ban           : {},
            list                : [],
            detail              : {}
        },
        created() {
            this.getData();
        },
        methods: {
            formatToVND(number) {
                return formatTien(number)
            },
            create() {
                axios
                    .post('/phong-ban/create', this.phong_ban)
                    .then((res) => {
                        displaySuccess(res);
                        if(res.data.status) {
                            this.phong_ban = {};
                            this.getData();
                        }
                    })
            },

            getData() {
                axios
                    .get('/phong-ban/data')
                    .then((res) => {
                        this.list = res.data.data;
                    })
            },

            changeStatus(value) {
                axios
                    .post('/phong-ban/change-status', value)
                    .then((res) => {
                        window.displaySuccess(res);
                        this.getData();
                    })
            },

            update() {
                axios
                    .post('/phong-ban/update', this.detail)
                    .then((res) => {
                        displaySuccess(res);
                        this.getData();
                    })
            },

            destroy() {
                axios
                    .post('/phong-ban/delete', this.detail)
                    .then((res) => {
                        displaySuccess(res);
                        this.getData();
                    })
            },
        },
    });
</script>
@endsection
