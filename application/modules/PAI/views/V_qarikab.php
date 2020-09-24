<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-uppercase">data Qari Kabupaten {kabupaten}</h5>
        </div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <button type="button" class="btn btn-light btn-shadow-hover" onclick="Back()"><i class="fas fa-arrow-left"></i> Kembali</button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">nama</th>
                        <th colspan="3">lahir</th>
                        <th rowspan="2">ayah</th>
                        <th rowspan="2">ibu</th>
                        <th rowspan="2">pasangan</th>
                        <th rowspan="2">jenis kelamin</th>
                        <th rowspan="2">alamat</th>
                        <th rowspan="2">status</th>
                        <th rowspan="2">pendidikan</th>
                        <th rowspan="2">pekerjaan</th>
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
    function Back() {
        window.history.back();
    }
    window.onload = function () {
        var url = "https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/qari?city_id=<?= $id; ?>";
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
            "fixedColumns": {
                leftColumns: 1
            },
            "ajax": {
                dataSrc: '',
                method: "GET",
                async: false,
                url: url
            },
            columns: [
                {data: "qari_nama"},
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a = data.qari_tempat_lahir;
                        if (a === null || a === '-') {
                            a = 'TIDAK ADA DATA';
                        } else {
                            a = data.qari_tempat_lahir;
                        }
                        return a;
                    }
                },
                {data: "qari_tgl_lahir", className: "text-center"},
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var dob = data.qari_tgl_lahir;
                        var age = moment().diff(moment(dob, 'YYYY-MM-DD'), 'years');
                        return age;
                    }
                },
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a = data.qari_nama_ayah;
                        if (a === null || a === '-') {
                            a = 'TIDAK ADA DATA';
                        } else {
                            a = data.qari_nama_ayah;
                        }
                        return a;
                    }
                },
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a = data.qari_nama_ibu;
                        if (a === null || a === '-') {
                            a = 'TIDAK ADA DATA';
                        } else {
                            a = data.qari_nama_ibu;
                        }
                        return a;
                    }
                },
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a = data.qari_nama_istri_suami;
                        if (a === null || a === '-') {
                            a = 'TIDAK ADA DATA';
                        } else {
                            a = data.qari_nama_istri_suami;
                        }
                        return a;
                    }
                },
                {data: "qari_jenis_kelamin", className: "text-center"},
                {data: "qari_alamat"},
                {data: "qari_status_kawin", className: "text-center"},
                {data: "qari_pendidikan", className: "text-center"},
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a = data.qari_pekerjaan;
                        if (a === null) {
                            return 'TIDAK ADA DATA';
                        } else {
                            return a;
                        }

                    }
                }
            ]
        });
    };
</script>