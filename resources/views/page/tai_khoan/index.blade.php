@extends('share.master')
@section('title')
    Quản Lý Nhân Viên
@endsection
@section('content')
<div class="row" id="app">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                Danh Sách Tài Khoản
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
                                <th>Thông Tin Chi Tiết</th>
                                <th>Cấp Mật Khẩu</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(value, index) in list">
                                <tr class="text-nowrap" v-if="value.is_tai_khoan == 1 && value.is_master == 0">
                                    <th class="text-center align-middle">@{{ index + 1 }}</th>
                                    <td class="align-middle">@{{ value.code }}</td>
                                    <td class="align-middle">@{{ value.ho_ten }}</td>
                                    <td class="align-middle">@{{ value.email }}</td>
                                    <td class="align-middle">@{{ value.so_dien_thoai }}</td>
                                    <td class="align-middle">@{{ value.so_can_cuoc }}</td>
                                    <td class="text-center align-middle">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#chiTietModal" v-on:click="detail = Object.assign({}, value)">Chi Tiết</button>
                                    </td>
                                    <td class="text-center align-middle">
                                        <template v-if="value.password">
                                            <button class="btn btn-success" v-on:click="capMatKhau(value)">Đã Cấp</button>
                                        </template>
                                        <template v-else>
                                            <button class="btn btn-info" v-on:click="capMatKhau(value)">Cấp Mật Khẩu</button>
                                        </template>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button class="btn btn-danger">Hủy Tài Khoản</button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
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
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    new Vue({
        el      : "#app",
        data    : {
            nhan_vien           : {},
            list                : [],
            detail              : {}
        },
        created() {
            this.getData();
        },
        methods: {
            getData() {
                axios
                    .get('/nhan-vien/data')
                    .then((res) => {
                        this.list = res.data.data;
                    })
            },

            capMatKhau(value) {
                axios
                    .post('/tai-khoan/cap-mat-khau', value)
                    .then((res) => {
                        displaySuccess(res);
                        this.getData();
                    })
            }
        },
    });
</script>
@endsection
