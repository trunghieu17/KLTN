@extends('share.master')
@section('title')
    Quản Lý Lương Nhân Viên
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
                                <label>Ngày Đầu</label>
                                <input type="date" id="ngay_dau" class="form-control" value="{{ $ngay_dau }}" v-on:change="getData()">
                            </fieldset>
                        </div>
                        <div class="col">
                            <fieldset class="form-group">
                                <label>Ngày Cuối</label>
                                <input type="date" id="ngay_cuoi" class="form-control" value="{{ $ngay_cuoi }}" v-on:change="getData()">
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            Bảng Lương Nhân Viên
                        </div>
                        <div class="col-lg-6 text-right">
                            <b>Tổng Tiền: <i id="tong_tien" class="text-danger"></i></b>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered tbData">
                            <thead>
                                <tr class="text-center align-middle">
                                    <th>#</th>
                                    <th>Mã Nhân Viên</th>
                                    <th>Tên Nhân Viên</th>
                                    <th>Loại Nhân Viên</th>
                                    <th>Chức Vụ</th>
                                    <th>Phòng Ban</th>
                                    <th>Lương Cơ Bản/Ca</th>
                                    <th>Tổng Ca Đăng Kí</th>
                                    <th>Tổng Ca Làm</th>
                                    <th>Tổng Ca Nghỉ</th>
                                    <th>Tổng Thưởng</th>
                                    <th>Tổng Phạt</th>
                                    <th>Thành Lương</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(value, index) in list">
                                    <tr class="text-nowrap">
                                        <th class="text-center align-middle">@{{ index + 1 }}</th>
                                        <td class="text-center align-middle">@{{ value.code }}</td>
                                        <td class="text-left align-middle">@{{ value.ho_ten }}</td>
                                        <td class="align-middle">@{{ value.ten_loai_nhan_vien }}</td>
                                        <td class="align-middle">@{{ value.ten_chuc_vu }}</td>
                                        <td class="align-middle">@{{ value.ten_phong_ban }}</td>
                                        <td class="text-right align-middle">@{{ formatTien(value.luong_co_ban) }}</td>
                                        <td class="text-center align-middle">@{{ (value.tong_di_lam * 1) + (value.tong_nghi * 1) }}</td>
                                        <td class="text-right align-middle">@{{ value.tong_di_lam }}</td>
                                        <td class="text-right align-middle">@{{ value.tong_nghi }}</td>
                                        <td class="text-right align-middle">@{{ value.tong_thuong }}</td>
                                        <td class="text-right align-middle">@{{ value.tong_phat }}</td>
                                        <td class="text-right align-middle">@{{ formatTien((value.tong_di_lam * value.luong_co_ban) + (value.tong_thuong * 1) - (value.tong_phat * 1))}}</td>
                                    </tr>
                                </template>
                            </tbody>
                            <tfoot id="footer_tb">

                            </tfoot>
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
        el      : "#app",
        data    : {
            list        : []
        },
        created() {
            this.loadData();
        },
        methods: {
            formatTien(number) {
                return formatTien(number)
            },
            loadData() {
                var payload = {
                    'ngay_dau'   : $("#ngay_dau").val(),
                    'ngay_cuoi'  : $("#ngay_cuoi").val()
                }
                axios
                    .post('/luong/data', payload)
                    .then((res) => {
                        this.list = res.data.data;
                    })
                    .finally((res) => {
                        $('.tbData').DataTable({
                            initComplete: function (settings, json) {
                                $(".tbData").wrap("<div style='overflow:auto;width:100%;position:relative;'></div>");
                            },
                            "footerCallback": function (row, data, start, end, display) {
                                var totalAmount = 0;
                                var totalCol    = 0;
                                var api = this.api();
                                for (var i = 0; i < data.length; i++) {
                                    originalString = data[i][12];
                                    let numericString = originalString.replace(/[^0-9]/g, '');
                                    let number = parseInt(numericString, 10);
                                    totalAmount += number;
                                }
                                $("#tong_tien").html(formatTien(totalAmount));

                                api.column(12, {page:'current'}).data().each(function (value, index) {
                                    let numericString = value.replace(/[^0-9]/g, '');
                                    let number = parseInt(numericString, 10) || 0;
                                    totalCol += number;
                                });
                                console.log(totalCol);
                                var numCols = api.columns().nodes().length;
                                var footerHtml = '<tr>';
                                for (var i = 0; i < numCols; i++) {
                                    if (i == numCols - 2) {
                                        footerHtml += '<td>Tổng cộng:</td>';
                                    } else if (i == numCols - 1) {
                                        footerHtml += `<td>${totalCol.toLocaleString()} ₫</td>`;
                                    } else {
                                        footerHtml += '<td></td>';
                                    }
                                }
                                footerHtml += '</tr>';
                                $("#footer_tb").html(footerHtml)
                            }
                        });
                    });
            }
        },
    });
</script>
@endsection
