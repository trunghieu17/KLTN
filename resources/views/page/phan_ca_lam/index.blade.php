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
                                <input type="date" class="form-control" >
                            </fieldset>
                        </div>
                        <div class="col">
                            <fieldset class="form-group">
                                <label for="basicInput">Ngày Cuối</label>
                                <input type="date" class="form-control">
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
                        <select class="form-control">
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
                                        <th>@{{ value.name }}</th>
                                        <template v-for="i in 7">
                                            <td>
                                                @{{ i }}
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
</div>
@endsection
@section('js')
<script>
    new Vue({
        el          : "#app",
        data        : {
            list_ca_lam      : [],
            list_phong_ban   : []
        },
        created() {
            this.getDataCaLam();
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

            getDataPhongBan() {
                axios
                    .get('/phong-ban/data')
                    .then((res) => {
                        this.list_phong_ban = res.data.data;
                    })
            },
        },
    });
</script>
@endsection
