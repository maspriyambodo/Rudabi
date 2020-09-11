<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-uppercase">data Penulis Kabupaten {kabupaten}</h5>
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
                        <th rowspan="2">usia</th>
                        <th rowspan="2">pendidikan</th>
                        <th colspan="2">lahir</th>
                        <th rowspan="2">jenis<br>kelamin</th>
                        <th rowspan="2">etnis</th>
                        <th colspan="4">keluarga</th>
                        <th rowspan="2">alamat</th>
                        <th rowspan="2">gol<br>darah</th>
                        <th colspan="5">ciri-ciri</th>
                    </tr>
                    <tr>
                        <th>tempat</th>
                        <th>tanggal</th>
                        <th>ayah</th>
                        <th>ibu</th>
                        <th>status</th>
                        <th>pasangan</th>
                        <th>tinggi</th>
                        <th>berat</th>
                        <th>rambut</th>
                        <th>muka</th>
                        <th>kulit</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
        var url = "https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/penulis?city_id=<?= $id; ?>";
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
                leftColumns: 3
            },
            "ajax": {
                dataSrc: '',
                method: "GET",
                async: false,
                url: url
            },
            columns: [
                {data: "penulis_nama"},
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var dob = data.penulis_tgl_lahir;
                        var age;
                        if (dob === '' || dob === null) {
                            age = 'TIDAK ADA DATA';
                        } else {
                            age = moment().diff(moment(dob, 'YYYY-MM-DD'), 'years');
                        }
                        return age;
                    }
                },
                {data: "penulis_pendidikan", className: "text-center"},
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var tempat = data.penulis_tempat_lahir;
                        var tmp;
                        if (tempat === '' || tempat === null) {
                            tmp = "TIDAK ADA DATA";
                        } else {
                            tmp = tempat;
                        }
                        return tmp;
                    }
                },
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var tanggal = data.penulis_tgl_lahir;
                        var tgl;
                        if (tanggal === '' || tanggal === null || tanggal === '-') {
                            tgl = "TIDAK ADA DATA";
                        } else {
                            tgl = tanggal;
                        }
                        return tgl;
                    }
                },
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a, b;
                        a = data.penulis_jenis_kelamin;
                        if (a === '' || a === null || a === '-') {
                            b = "TIDAK ADA DATA";
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
                        a = data.penulis_etnis;
                        if (a === '' || a === null || a === '-') {
                            b = "TIDAK ADA DATA";
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
                        a = data.penulis_nama_ayah;
                        if (a === '' || a === null || a === '-') {
                            b = "TIDAK ADA DATA";
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
                        a = data.penulis_nama_ibu;
                        if (a === '' || a === null || a === '-') {
                            b = "TIDAK ADA DATA";
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
                        a = data.penulis_status_kawin;
                        if (a === '' || a === null || a === '-') {
                            b = "TIDAK ADA DATA";
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
                        a = data.penulis_nama_istri_suami;
                        if (a === '' || a === null || a === '-') {
                            b = "TIDAK ADA DATA";
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
                        a = data.penulis_alamat;
                        if (a === '' || a === null || a === '-') {
                            b = "TIDAK ADA DATA";
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
                        a = data.penulis_gol_darah;
                        if (a === '' || a === null || a === '-') {
                            b = "TIDAK ADA DATA";
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
                        a = data.penulis_tinggi;
                        if (a === '' || a === null || a === '-') {
                            b = "TIDAK ADA DATA";
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
                        a = data.penulis_berat;
                        if (a === '' || a === null || a === '-') {
                            b = "TIDAK ADA DATA";
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
                        a = data.penulis_rambut;
                        if (a === '' || a === null || a === '-') {
                            b = "TIDAK ADA DATA";
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
                        a = data.penulis_muka;
                        if (a === '' || a === null || a === '-') {
                            b = "TIDAK ADA DATA";
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
                        a = data.penulis_kulit;
                        if (a === '' || a === null || a === '-') {
                            b = "TIDAK ADA DATA";
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