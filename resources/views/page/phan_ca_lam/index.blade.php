@extends('page.nhan_vien.index')
@section('title')
    Phân Lịch Làm Cho Nhân Viên Theo Phòng Ban
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
                                    <th>Thứ 2</th>
                                    <th>Thứ 3</th>
                                    <th>Thứ 4</th>
                                    <th>Thứ 5</th>
                                    <th>Thứ 6</th>
                                    <th>Thứ 7</th>
                                    <th>Chủ Nhật</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(value, index) in list_ca_lam">
                                    <tr class="text-left">
                                        <th class="align-middle">@{{ value.name }}</th>
                                        <template v-for="i in 7">
                                            <td class="align-middle" v-on:click="object_chon.id_ca = value.id; object_chon.thu = i; changeListChon()" data-toggle="modal" data-target="#phanLichModal" >
                                                <template v-for="(value_k, index_k) in list">
                                                    <span v-if="value_k.id_ca == value.id && value_k.thu == i && value_k.id_phong_ban == id_phong_ban"><b>@{{ value_k.ho_ten }}</b><br><hr></span>
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
              <h5 class="modal-title" id="exampleModalLabel">Chọn Nhân Viên</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <template v-for="(value, index) in list_nhan_vien" >
                        <div class="col-lg-4" v-if="value.id_phong_ban == id_phong_ban">
                            <div class="form-group form-check">
                                <input type="checkbox" v-model="list_chon" v-bind:value="value.id" class="form-check-input" v-bind:id="'nhanvien' + value.id">
                                <label class="form-check-label" v-bind:for="'nhanvien' + value.id">@{{ value.ho_ten }} - @{{ value.ten_chuc_vu }}</label>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" data-dismiss="modal" v-on:click="xacNhanPhanLich()">Save changes</button>
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
            object_chon      : {
                'id_ca' : 0,
                'thu'   : 0,
            }
        },
        created() {
            this.getDataCaLam();
            this.getData();
            this.getDataPhongBan();
            this.getDataNhanVien();
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
                    .post('/phan-lich-lam/data', payload)
                    .then((res) => {
                        this.list = res.data.data;
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
                axios
                    .get('/nhan-vien/data')
                    .then((res) => {
                        this.list_nhan_vien = res.data.data;
                    })
            },

            xacNhanPhanLich() {
                this.object_chon.list_id_nhan_vien  = this.list_chon;
                this.object_chon.ngay_dau           = $("#ngay_dau").val();
                this.object_chon.ngay_cuoi          = $("#ngay_cuoi").val();
                this.object_chon.id_phong_ban       = this.id_phong_ban;

                axios
                    .post('/phan-lich-lam/phan-lich-thang', this.object_chon)
                    .then((res) => {
                        displaySuccess(res);
                        this.getData();
                    })
            },

            changeListChon() {
                var array          = [];
                this.list_chon     = [];
                var id_ca          = this.object_chon.id_ca;
                var thu            = this.object_chon.thu;
                var id_phong_ban   = this.id_phong_ban;
                this.list.forEach(function (value, index) {
                    if (value.id_ca == id_ca && value.id_phong_ban == id_phong_ban && value.thu == thu) {
                        if(array.indexOf(value.id_nhan_vien == false)) {
                            array.push(value.id_nhan_vien)
                        }
                    }
                });
                this.list_chon = array;
            }
        },
    });
</script>
@endsection
