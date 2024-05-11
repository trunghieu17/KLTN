@extends('share.master')
@section('title')
    Quản Lý Nhân Viên
@endsection
@section('content')
<div class="row" id="app">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6 mt-1">
                        Danh Sách Nhân Viên
                    </div>
                    <div class="col-lg-6 text-right">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">Tạo Nhân Viên</button>
                    </div>
                    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Tạo Mới Nhân Viên</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Họ Và Tên</label>
                                            <input type="text" class="form-control" v-model="nhan_vien.ho_ten">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" v-model="nhan_vien.email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Số Điện Thoại</label>
                                            <input type="tel" class="form-control" v-model="nhan_vien.so_dien_thoai">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Số Căn Cước</label>
                                            <input type="number" class="form-control" v-model="nhan_vien.so_can_cuoc">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Ngày Sinh</label>
                                            <input type="date" class="form-control" v-model="nhan_vien.ngay_sinh">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Giới Tính</label>
                                            <select class="form-control" v-model="nhan_vien.gioi_tinh">
                                                <option value="1">Nam</option>
                                                <option value="0">Nữ</option>
                                                <option value="2">Khác</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Quê Quán</label>
                                            <input type="text" class="form-control" v-model="nhan_vien.que_quan">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Thường Trú</label>
                                            <input type="text" class="form-control" v-model="nhan_vien.thuong_tru">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Chức Vụ</label>
                                            <select class="form-control" v-model="nhan_vien.id_chuc_vu">
                                                <template v-for="(value, index) in list_chuc_vu">
                                                    <option v-bind:value="value.id">@{{ value.name }}</option>
                                                </template>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Phòng Ban</label>
                                            <select class="form-control" v-model="nhan_vien.id_phong_ban">
                                                <template v-for="(value, index) in list_phong_ban">
                                                    <option v-bind:value="value.id">@{{ value.name }}</option>
                                                </template>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Loại Nhân Viên</label>
                                            <select class="form-control" v-model="nhan_vien.id_loai_nhan_vien">
                                                <template v-for="(value, index) in list_loai_nhan_vien">
                                                    <option v-bind:value="value.id">@{{ value.name }}</option>
                                                </template>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary" v-on:click="create()">Save changes</button>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="text-center alig-middle">
                            <tr>
                                <th>#</th>
                                <th>Mã Nhân Viên</th>
                                <th>Tên Nhân Viên</th>
                                <th>Email</th>
                                <th>Số Điện Thoại</th>
                                <th>Số Căn Cước</th>
                                <th>Ngày Sinh</th>
                                <th>Thông Tin Chi Tiết</th>
                                <th>Tình Trạng</th>
                                <th>Ngày Tạo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(value, index) in list">
                                <tr class="text-nowrap">
                                    <th class="text-center align-middle">@{{ index + 1 }}</th>
                                    <td class="align-middle">@{{ value.code }}</td>
                                    <td class="align-middle">@{{ value.ho_ten }}</td>
                                    <td class="align-middle">@{{ value.email }}</td>
                                    <td class="align-middle">@{{ value.so_dien_thoai }}</td>
                                    <td class="align-middle">@{{ value.so_can_cuoc }}</td>
                                    <td class="align-middle">@{{ value.ngay_sinh }}</td>
                                    <td class="text-center align-middle">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#chiTietModal" v-on:click="detail = Object.assign({}, value)">Chi Tiết</button>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button v-if="value.is_open" class="btn btn-success" v-on:click="changeStatus(value)">Hoạt Động</button>
                                        <button v-else class="btn btn-danger" v-on:click="changeStatus(value)">Tạm Tắt</button>
                                    </td>
                                    <td class="text-center align-middle">@{{ value.created }}</td>
                                    <td class="text-center align-middle">
                                        <button class="btn btn-primary me-2" data-toggle="modal" data-target="#updateModal" v-on:click="detail = Object.assign({}, value)">Cập Nhật</button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" v-on:click="detail = Object.assign({}, value)">Xóa</button>
                                        <button class="btn btn-secondary" v-on:click="phanTaiKhoan(value)">Phân Tài Khoản</button>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Mô Tả</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Phòng Ban</th>
                            <td>@{{ detail.ten_phong_ban }}</td>
                        </tr>
                        <tr>
                            <th>Chức Vụ</th>
                            <td>@{{ detail.ten_chuc_vu }}</td>
                        </tr>
                        <tr>
                            <th>Loại Nhân Viên</th>
                            <td>@{{ detail.ten_loai_nhan_vien }}</td>
                        </tr>
                    </thead>
                </table>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Nhân Viên</h1>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cập Nhật Nhân Viên</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Tên Nhân Viên</label>
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
            nhan_vien           : {},
            list                : [],
            list_chuc_vu        : [],
            list_phong_ban      : [],
            list_loai_nhan_vien : [],
            detail              : {}
        },
        created() {
            this.getData();
            this.getDataChucVu();
            this.getDataLoaiNhanVien();
            this.getDataPhongBan();
        },
        methods: {
            create() {
                axios
                    .post('/nhan-vien/create', this.nhan_vien)
                    .then((res) => {
                        displaySuccess(res);
                        if(res.data.status) {
                            this.nhan_vien = {};
                            this.getData();
                        }
                    })
            },

            getData() {
                axios
                    .get('/nhan-vien/data')
                    .then((res) => {
                        this.list = res.data.data;
                    })
            },

            getDataLoaiNhanVien() {
                axios
                    .get('/loai-nhan-vien/data')
                    .then((res) => {
                        this.list_loai_nhan_vien = res.data.data;
                    })
            },

            getDataChucVu() {
                axios
                    .get('/chuc-vu/data')
                    .then((res) => {
                        this.list_chuc_vu = res.data.data;
                    })
            },

            getDataPhongBan() {
                axios
                    .get('/phong-ban/data')
                    .then((res) => {
                        this.list_phong_ban = res.data.data;
                    })
            },

            changeStatus(value) {
                axios
                    .post('/loai-nhan-vien/change-status', value)
                    .then((res) => {
                        window.displaySuccess(res);
                        this.getData();
                    })
            },

            update() {
                axios
                    .post('/loai-nhan-vien/update', this.detail)
                    .then((res) => {
                        displaySuccess(res);
                        this.getData();
                    })
            },

            destroy() {
                axios
                    .post('/loai-nhan-vien/delete', this.detail)
                    .then((res) => {
                        displaySuccess(res);
                        this.getData();
                    })
            },

            phanTaiKhoan(value) {
                axios
                    .post('/tai-khoan/phan-tai-khoan', value)
                    .then((res) => {
                        displaySuccess(res);
                    })
            },
        },
    });
</script>
@endsection
