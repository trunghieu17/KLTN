@extends('share.master')
@section('title')
    Quản Lý Chấm Công Nhân Viên
@endsection
@section('content')
<div id="app">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <fieldset class="form-group">
                                <label for="basicInput">Ngày Đầu</label>
                                <input type="date" id="ngay_dau" class="form-control" value="{{ $ngay_dau }}" v-on:change="getData()">
                            </fieldset>
                        </div>
                        <div class="col">
                            <fieldset class="form-group">
                                <label for="basicInput">Ngày Cuối</label>
                                <input type="date" id="ngay_cuoi" class="form-control" value="{{ $ngay_cuoi }}" v-on:change="getData()">
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-1">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="form-group">
                        <label>Phòng Ban</label>
                        <select class="form-control" v-model="id_phong_ban">
                            <option value="0">Chọn Phòng Ban</option>
                            <template v-for="(value, index) in list_phong_ban">
                                <option v-bind:value="value.id">@{{ value.name }}</option>
                            </template>
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <template v-for="(value, index) in list_ngay">
                                        <th>@{{ value }}</th>
                                    </template>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(value, index) in list_ca_lam">
                                    <tr class="text-left">
                                        <th class="align-middle">@{{ value.name }}</th>
                                        <template v-for="(value_ngay, index_ngay) in list_ngay">
                                            <td class="align-middle" v-on:click="object_chon.id_ca = value.id; object_chon.ngay_lam = value_ngay; getDataNhanVien()" data-toggle="modal" data-target="#phanLichModal" >
                                                <template v-for="(value_k, index_k) in list">
                                                    <span v-if="value_k.id_ca == value.id && value_k.ngay_lam == value_ngay && value_k.id_phong_ban == id_phong_ban"><b>@{{ value_k.ho_ten }}</b><br><hr></span>
                                                </template>
                                            </td>
                                        </template>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="phanLichModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Danh Sách Nhân Viên</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mã Nhân Viên</th>
                                <th>Họ Tên</th>
                                <th>Chấm Công</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(value, index) in list_nhan_vien">
                                <tr v-if="value.id_phong_ban == id_phong_ban">
                                    <th class="text-center align-middle">@{{ index + 1 }}</th>
                                    <td class="text-center align-middle">@{{ value.code }}</td>
                                    <td class="align-middle">@{{ value.ho_ten }}</td>
                                    <td class="text-center align-middle">
                                        <button v-if="value.is_check" class="btn btn-success" v-on:click="chamCong(value)">YES</button>
                                        <button v-else class="btn btn-danger" v-on:click="chamCong(value)">NO</button>
                                    </td>
                                    <td class="text-center align-middle">
                                        {{-- <div class="form-group form-check">
                                            <input type="checkbox" v-model="list_chon" v-bind:value="value.id" class="form-check-input" v-on:change="updatePhanLich($event)">
                                        </div> --}}
                                        <i v-if="value.ngay_lam" class="fa-solid fa-square-check text-success fa-2x" v-on:click="updatePhanLich(value, 1)"></i>
                                        <i v-else class="fa-solid fa-square-check text-danger fa-2x" v-on:click="updatePhanLich(value, 0)"></i>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                    {{-- <template v-for="(value, index) in list_nhan_vien" >
                        <div class="col-lg-4" v-if="value.id_phong_ban == id_phong_ban">
                            <div class="form-group form-check">
                                <input type="checkbox" v-model="list_chon" v-bind:value="value.id" class="form-check-input" v-bind:id="'nhanvien' + value.id">
                                <label class="form-check-label" v-bind:for="'nhanvien' + value.id">@{{ value.ho_ten }} - @{{ value.ten_chuc_vu }}</label>
                            </div>
                        </div>
                    </template> --}}
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            list_ca_lam      : [],
            list_phong_ban   : [],
            list_nhan_vien   : [],
            id_phong_ban     : 0,
            list_chon        : [],
            list             : [],
            list_ngay        : [],
            object_chon      : {
                'id_ca' : 0,
                'thu'   : 0,
            },
            ngay_lam         : ""
        },
        created() {
            this.getDataCaLam();
            this.getData();
            this.getDataPhongBan();
        },
        methods: {
            getDataCaLam() {
                axios
                    .get('/ca-lam/data')
                    .then((res) => {
                        this.list_ca_lam = res.data.data;
                    })
            },
            getData() {
                var payload = {
                    'ngay_dau'   : $("#ngay_dau").val(),
                    'ngay_cuoi'  : $("#ngay_cuoi").val()
                }
                axios
                    .post('/cham-cong/data-phan-lich', payload)
                    .then((res) => {
                        this.list       = res.data.data;
                        this.list_ngay  = res.data.data_ngay;
                    })
            },

            getDataPhongBan() {
                axios
                    .get('/phong-ban/data')
                    .then((res) => {
                        this.list_phong_ban = res.data.data;
                    })
            },

            getDataNhanVien() {
                this.object_chon.id_phong_ban = this.id_phong_ban;
                axios
                    .post('/cham-cong/data-nhan-vien', this.object_chon)
                    .then((res) => {
                        this.list_nhan_vien = res.data.data;
                        this.changeListChon();
                    })
            },


            changeListChon() {
                var array          = [];
                this.list_chon     = [];
                var id_ca          = this.object_chon.id_ca;
                var ngay_lam       = this.object_chon.ngay_lam;
                var id_phong_ban   = this.id_phong_ban;
                this.list.forEach(function (value, index) {
                    if (value.id_ca == id_ca && value.id_phong_ban == id_phong_ban && value.ngay_lam == ngay_lam) {
                        if(array.indexOf(value.id_nhan_vien == false)) {
                            array.push(value.id_nhan_vien)
                        }
                    }
                });
                this.list_chon = array;
            },

            chamCong(value) {
                this.object_chon.id_nhan_vien = value.id;
                this.object_chon.id_phong_ban = this.id_phong_ban;
                axios
                    .post('/cham-cong/cham-cong-nhan-vien', this.object_chon)
                    .then((res) => {
                        this.getDataNhanVien();
                        displaySuccess(res);
                    })
            },

            updatePhanLich(value, type) {
                var payload = {
                    'id_nhan_vien'  : value.id,
                    'id_phong_ban'  : this.id_phong_ban,
                    'type'          : type,
                    'id_ca'         :  this.object_chon.id_ca,
                    'ngay_lam'      :  this.object_chon.ngay_lam,
                }
                axios
                    .post('/phan-lich-lam/update-cham-cong', payload)
                    .then((res) => {
                        this.getDataNhanVien();
                        displaySuccess(res);
                        this.changeListChon();
                    })
            }
        },
    });
</script>
@endsection
