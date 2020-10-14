<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-capitalize">data tenaga ahli provinsi {provinsi}</h5>
        </div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?= base_url('Binsyar/Ahli/index/'); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">nama</th>
                        <th colspan="3">lahir</th>
                        <th rowspan="2">telepon</th>
                        <th rowspan="2">alamat</th>
                    </tr>
                    <tr>
                        <th>tempat</th>
                        <th>tanggal</th>
                        <th>usia</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
        var url = "https://simas.kemenag.go.id/rudabi/datapi/siihat/tenagaahli?KEY=BOBA&tenaga_provinsi=<?= $id; ?>";
        $('table').dataTable({
            "ServerSide": true,
            "order": [[0, "asc"]],
            "paging": true,
            "ordering": true,
            "info": true,
            "processing": true,
            "deferRender": true,
            "scrollCollapse": true,
            "scrollX": true,
            "scrollY": "400px",
            "ajax": {
                dataSrc: '',
                method: "GET",
                async: false,
                url: url
            },
            columns: [
                {data: "tenaga_nama"},
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a, b;
                        a = data.tenaga_tempat_lahir;
                        if (a === '' || a === null || a === '-') {
                            b = 'TIDAK ADA DATA';
                        } else {
                            b = a;
                        }
                        return b;
                    }
                },
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a, b;
                        a = data.tenaga_tanggal_lahir;
                        if (a === '' || a === null || a === '-') {
                            b = 'TIDAK ADA DATA';
                        } else {
                            b = a;
                        }
                        return b;
                    }
                },
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a, b;
                        a = data.tenaga_tanggal_lahir;
                        if (a === '' || a === null || a === '-') {
                            b = 'TIDAK ADA DATA';
                        } else {
                            b = moment().diff(moment(a, 'YYYY-MM-DD'), 'years');
                        }
                        return b;
                    }
                }, {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a, b;
                        a = data.tenaga_telp;
                        if (a === '' || a === null || a === '-') {
                            b = 'TIDAK ADA DATA';
                        } else {
                            b = a;
                        }
                        return b;
                    }
                }, {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a, b;
                        a = data.tenaga_alamat;
                        if (a === '' || a === null || a === '-') {
                            b = 'TIDAK ADA DATA';
                        } else {
                            b = a;
                        }
                        return b;
                    }
                }
            ]
        });
    };
</script>