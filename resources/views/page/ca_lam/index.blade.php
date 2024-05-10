@extends('share.master')
@section('title')
    Quản Lý Ca Làm
@endsection
@section('content')
<div class="row" id="app">
    <div class="col-lg-4 col-md-12">
        <div class="card">
            <div class="card-header">
                Thêm Mới Ca Làm
            </div>
            <div class="card-body">
                <div class="mb-1">
                    <label class="form-label">Tên Ca Làm</label>
                    <input type="text" class="form-control" v-model="ca_lam.name">
                </div>
                <div class="mb-1">
                    <label class="form-label">Giờ Vào</label>
                    <input type="time" class="form-control" v-model="ca_lam.gio_vao">
                </div>
                <div class="mb-1">
                    <label class="form-label">Giờ Ra</label>
                    <input type="time" class="form-control" v-model="ca_lam.gio_ra">
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
                <div class="row">
                    Danh Sách Ca Làm
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="text-center alig-middle">
                            <tr>
                                <th>#</th>
                                <th>Tên Ca Làm</th>
                                <th>Giờ Vào</th>
                                <th>Giờ Ra</th>
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
                                    <td class="align-middle text-center">@{{ value.gio_vao }}</td>
                                    <td class="align-middle text-center">@{{ value.gio_ra }}</td>
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
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Ca Làm</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                    Bạn có chắc chắn muốn xóa  <b>@{{ detail.name }}</b> không?
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cập Nhật Ca Làm</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-1">
                    <label class="form-label">Tên Ca Làm</label>
                    <input type="text" class="form-control" v-model="detail.name">
                </div>
                <div class="mb-1">
                    <label class="form-label">Giờ Vào</label>
                    <input type="time" class="form-control" v-model="detail.gio_vao">
                </div>
                <div class="mb-1">
                    <label class="form-label">Giờ Ra</label>
                    <input type="time" class="form-control" v-model="detail.gio_ra">
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
            ca_lam      : {},
            list                : [],
            detail              : {},
            list_phong_ban      : []
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
                    .post('/ca-lam/create', this.ca_lam)
                    .then((res) => {
                        displaySuccess(res);
                        if(res.data.status) {
                            this.ca_lam = {};
                            this.getData();
                        }
                    })
            },

            getData() {
                axios
                    .get('/ca-lam/data')
                    .then((res) => {
                        this.list = res.data.data;
                    })
            },

            changeStatus(value) {
                axios
                    .post('/ca-lam/change-status', value)
                    .then((res) => {
                        window.displaySuccess(res);
                        this.getData();
                    })
            },

            update() {
                axios
                    .post('/ca-lam/update', this.detail)
                    .then((res) => {
                        displaySuccess(res);
                        this.getData();
                    })
            },

            destroy() {
                axios
                    .post('/ca-lam/delete', this.detail)
                    .then((res) => {
                        displaySuccess(res);
                        this.getData();
                    })
            },
        },
    });
</script>
@endsection
