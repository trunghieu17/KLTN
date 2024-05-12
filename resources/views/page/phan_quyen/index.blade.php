@extends('share.master')
@section('title')
    Quản Lý Phân Quyền
@endsection
@section('content')
    <div class="row" id="app">
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-header">
                    Chức vụ
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="text-center alig-middle">
                                <tr>
                                    <th>#</th>
                                    <th>Tên Chức Vụ</th>
                                    <th>Action</th>
                                    <th>Tình Trạng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(value, index) in list_chuc_vu">
                                    <tr class="text-nowrap">
                                        <th class="text-center align-middle">@{{ index + 1 }}</th>
                                        <td class="align-middle">@{{ value.name }}</td>
                                        <td class="text-center align-middle">
                                            <button class="btn btn-primary me-2"
                                                v-on:click="detail = Object.assign({}, value), getDataChucNang(value.id), getDataPhanQuyen(value.id)">Phân
                                                Quyền</button>
                                        </td>
                                        <td class="text-center align-middle">
                                            <button v-if="value.is_open" class="btn btn-success"
                                                v-on:click="changeStatusChucVu(value)">Hoạt Động</button>
                                            <button v-else class="btn btn-danger" v-on:click="changeStatusChucVu(value)">Tạm
                                                Tắt</button>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-header">
                    Chức Năng
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="text-center alig-middle">
                                <tr>
                                    <th>Tên Chức Năng</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(value, index) in list_chuc_nang">
                                    <tr class="text-nowrap">
                                        <td class="align-middle">@{{ value.name }}</td>
                                        <td class="text-center align-middle">
                                            <button class="btn btn-primary me-2"
                                                v-on:click="create(value.id), getDataPhanQuyen(detail.id), getDataChucNang(detail.id)">Cấp
                                                Quyền</button>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-header">
                    Quyền Đã Cấp - <b class="text-danger">@{{ detail.name }}</b>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="text-center alig-middle">
                                <tr>
                                    <th>#</th>
                                    <th>Tên Chức Vụ</th>
                                    <th>Tình Trạng</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(value, index) in list_phan_quyen">
                                    <tr class="text-nowrap">
                                        <th class="text-center align-middle">@{{ index + 1 }}</th>
                                        <td class="align-middle">@{{ value.name }}</td>
                                        <td class="text-center align-middle">
                                            <button v-if="value.is_open" class="btn btn-success"
                                                v-on:click="changeStatus(value)">Hoạt Động</button>
                                            <button v-else class="btn btn-danger" v-on:click="changeStatus(value)">Tạm
                                                Tắt</button>
                                        </td>
                                        <td class="text-center align-middle">
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"
                                                v-on:click="xoa = Object.assign({}, value)">Xóa</button>
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
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Phòng Ban</h1>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger" role="alert">
                            Bạn có chắc chắn muốn xóa <b>@{{ xoa.name }}</b> không?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal"
                            v-on:click="destroy(), getDataPhanQuyen(detail.id), getDataChucNang(detail.id)">Xác
                            Nhận</button>
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
            el: "#app",
            data: {
                phong_ban: {},
                list_chuc_vu: [],
                list_chuc_nang: [],
                list_phan_quyen: [],
                detail: {},
                xoa: {}
            },
            created() {
                this.getDataChucVu();

            },
            methods: {
                formatToVND(number) {
                    return formatTien(number)
                },
                create(id_chuc_nang) {
                    var payload = {
                        'id_chuc_vu': this.detail.id,
                        'id_chuc_nang': id_chuc_nang,
                    };
                    axios
                        .post('/phan-quyen/create', payload)
                        .then((res) => {
                            displaySuccess(res);
                            if (res.data.status) {
                                this.phong_ban = {};
                                this.getData();
                            }
                        })
                },

                getDataChucVu() {
                    axios
                        .get('/chuc-vu/data')
                        .then((res) => {
                            this.list_chuc_vu = res.data.data;
                        })
                },

                getDataChucNang(id_chuc_vu) {
                    axios
                        .get('/phan-quyen/data-chuc-nang/' + id_chuc_vu)
                        .then((res) => {
                            this.list_chuc_nang = res.data.data;
                        })
                },

                getDataPhanQuyen(id_chuc_vu) {
                    axios
                        .get('/phan-quyen/data/' + id_chuc_vu)
                        .then((res) => {
                            this.list_phan_quyen = res.data.data;
                        })
                },

                changeStatus(value) {
                    axios
                        .post('/phan-quyen/change-status', value)
                        .then((res) => {
                            window.displaySuccess(res);
                            this.getDataPhanQuyen(this.detail.id);
                        })
                },

                changeStatusChucVu(value) {
                    axios
                        .post('/chuc-vu/change-status', value)
                        .then((res) => {
                            window.displaySuccess(res);
                            this.getDataChucVu();
                        })
                },

                destroy() {
                    axios
                        .post('/phan-quyen/delete', this.xoa)
                        .then((res) => {
                            displaySuccess(res);
                            this.getData();
                        })
                },
            },
        });
    </script>
@endsection
