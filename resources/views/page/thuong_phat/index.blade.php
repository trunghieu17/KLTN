@extends('share.master')
@section('title')
    Quản Lý Khen Thưởng Và Kỷ Luật
@endsection
@section('content')
<div id="app">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6 mt-1">
                            Danh Sách Khen Thưởng Và Kỷ Luật
                        </div>
                        <div class="col-lg-6 text-right">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">Tạo Thưởng Phạt</button>
                        </div>
                    </div>
                    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Thêm Mới Thưởng Phạt</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nhân Viên</label>
                                            <select class="form-control" v-model="post_data.id_nhan_vien">
                                                <template v-for="(value, index) in list_nhan_vien">
                                                    <option v-if="value.is_open == 1" v-bind:value="value.id">@{{ value.ho_ten }}</option>
                                                </template>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Loại</label>
                                            <select class="form-control" v-model="post_data.the_loai">
                                                <option value="0">Phạt</option>
                                                <option value="1">Thưởng</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Số Tiền</label>
                                            <input type="number" class="form-control" v-model="post_data.tien_thuong">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Ngày Ghi Nhận</label>
                                            <input type="date" class="form-control" v-model="post_data.ngay_ghi_nhan">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Lý Do</label>
                                            <textarea cols="30" rows="10" class="form-control" v-model="post_data.ly_do"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Ghi Chú</label>
                                            <textarea cols="30" rows="10" class="form-control" v-model="post_data.ghi_chu"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary" data-dismiss="modal" v-on:click="createThuongPhat()">Xác Nhận</button>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="align-middle text-center">
                                    <th>#</th>
                                    <th>Mã Nhân Viên</th>
                                    <th>Tên Nhân Viên</th>
                                    <th>Phòng Ban</th>
                                    <th>Chức Vụ</th>
                                    <th>Loại</th>
                                    <th>Tiền</th>
                                    <th>Ngày Ghi</th>
                                    <th>Lý Do</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(value, index) in list">
                                    <th class="align-middle text-center">@{{ index + 1 }}</th>
                                    <td class="align-middle text-center">@{{ value.code }}</td>
                                    <td class="align-middle">@{{ value.ho_ten }}</td>
                                    <td class="align-middle">@{{ value.ten_phong_ban }}</td>
                                    <td class="align-middle">@{{ value.ten_chuc_vu }}</td>
                                    <td class="align-middle text-center">
                                        <template v-if="value.the_loai == 1">
                                            <b class="text-success">Thưởng</b>
                                        </template>
                                        <template v-else>
                                            <b class="text-danger">Phạt</b>
                                        </template>
                                    </td>
                                    <td class="align-middle text-right">@{{ formatTien(value.tien_thuong) }}</td>
                                    <td class="align-middle text-center">@{{ formatDay(value.ngay_ghi_nhan) }}</td>
                                    <td class="align-middle">@{{ value.ly_do }}</td>
                                    <td class="align-middle text-center">
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#ghiChuModal" v-on:click="detail = Object.assign({}, value)">Ghi Chú</button>
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#updateModal" v-on:click="detail = Object.assign({}, value)">Cập Nhật</button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" v-on:click="detail = Object.assign({}, value)">Xóa</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Thưởng Phạt</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nhân Viên</label>
                                            <select class="form-control" v-model="detail.id_nhan_vien">
                                                <template v-for="(value, index) in list_nhan_vien">
                                                    <option v-if="value.is_open == 1" v-bind:value="value.id">@{{ value.ho_ten }}</option>
                                                </template>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Loại</label>
                                            <select class="form-control" v-model="detail.the_loai">
                                                <option value="0">Phạt</option>
                                                <option value="1">Thưởng</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Số Tiền</label>
                                            <input type="number" class="form-control" v-model="detail.tien_thuong">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Ngày Ghi Nhận</label>
                                            <input type="date" class="form-control" v-model="detail.ngay_ghi_nhan">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Lý Do</label>
                                            <textarea cols="30" rows="10" class="form-control" v-model="detail.ly_do"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Ghi Chú</label>
                                            <textarea cols="30" rows="10" class="form-control" v-model="detail.ghi_chu"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary" data-dismiss="modal" v-on:click="update()">Xác Nhận</button>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="modal fade" id="ghiChuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Ghi Chú</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <textarea cols="30" rows="10" class="form-control" v-model="detail.ghi_chu"></textarea>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Thêm Mới Thưởng Phạt</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-danger" role="alert">
                                    Bạn có chắc chắn muốn xóa thưởng phạt này không?
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary" data-dismiss="modal" v-on:click="destroy()">Xác Nhận</button>
                            </div>
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
            el          : "#app",
            data        : {
                list                    : [],
                list_nhan_vien          : [],
                post_data               : {},
                detail                  : {}
            },
            created() {
                this.loadData();
                this.getDataNhanVien();
            },
            methods: {
                formatTien(number) {
                    return formatTien(number);
                },
                loadData() {
                    axios
                        .get('/thuong-phat/data')
                        .then((res) => {
                            this.list   = res.data.data;
                        })

                },
                getDataNhanVien() {
                    axios
                        .get('/nhan-vien/data')
                        .then((res) => {
                            this.list_nhan_vien = res.data.data;
                        })
                },

                createThuongPhat() {
                    axios
                        .post('/thuong-phat/create', this.post_data)
                        .then((res) => {
                            displaySuccess(res);
                            this.loadData();
                        })
                },

                formatDay(day) {
                    const date = new Date(day);
                    const formattedDate = date.toLocaleDateString('vi-VN');
                    return formattedDate;
                },

                update() {
                axios
                    .post('/thuong-phat/update', this.detail)
                    .then((res) => {
                        displaySuccess(res);
                        this.loadData();
                    })
                },

                destroy() {
                    axios
                        .post('/thuong-phat/delete', this.detail)
                        .then((res) => {
                            displaySuccess(res);
                            this.loadData();
                        })
                },
            },
        });
    </script>
@endsection
