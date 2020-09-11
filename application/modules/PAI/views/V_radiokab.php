<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-uppercase">data Radio Islam Kabupaten {kabupaten}</h5>
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
                        <th colspan="3">radio</th>
                        <th rowspan="2">alamat</th>
                        <th rowspan="2">izin</th>
                        <th colspan="3">status</th>
                        <th rowspan="2">sertifikat</th>
                        <th rowspan="2">topography</th>
                        <th rowspan="2">geografi</th>
                        <th colspan="2">pengurus</th>
                        <th rowspan="2">jangkauan</th>
                        <th rowspan="2">waktu</th>
                        <th rowspan="2">sejarah</th>
                        <th rowspan="2">visi<br>&<br>Misi</th>
                        <th rowspan="2">penyiar</th>
                        <th rowspan="2">siaran</th>
                        <th rowspan="2">pukul</th>
                        <th rowspan="2">favorite</th>
                        <th rowspan="2">jam</th>
                        <th rowspan="2">afiliasi</th>
                    </tr>
                    <tr>
                        <th>nama</th>
                        <th>ketua</th>
                        <th>berdiri</th>
                        <th>tanah</th>
                        <th>lt</th>
                        <th>lb</th>
                        <th>laki-laki</th>
                        <th>perempuan</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
        var url = "https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/radio?city_id=<?= $id; ?>";
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
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a = data.radio_nama;
                        if (a === null || a === '') {
                            a = 'TIDAK ADA DATA';
                        } else {
                            a = data.radio_nama;
                        }
                        return a;
                    }
                },
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a = data.radio_ketua;
                        if (a === null || a === '') {
                            a = 'TIDAK ADA DATA';
                        } else {
                            a = data.radio_ketua;
                        }
                        return a;
                    }
                },
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a = data.radio_thn_berdiri;
                        if (a === null || a === '') {
                            a = 'TIDAK ADA DATA';
                        } else {
                            a = data.radio_thn_berdiri;
                        }
                        return a;
                    }
                },
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a = data.radio_alamat;
                        if (a === null || a === '') {
                            a = 'TIDAK ADA DATA';
                        } else {
                            a = data.radio_alamat;
                        }
                        return a;
                    }
                },
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a = data.radio_izin_opr;
                        if (a === null || a === '') {
                            a = 'TIDAK ADA DATA';
                        } else {
                            a = data.radio_izin_opr;
                        }
                        return a;
                    }
                },
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a = data.radio_status_tanah;
                        if (a === null || a === '') {
                            a = 'TIDAK ADA DATA';
                        } else {
                            a = data.radio_status_tanah;
                        }
                        return a;
                    }
                },
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a = data.radio_luas_tanah;
                        if (a === null || a === '') {
                            a = 'TIDAK ADA DATA';
                        } else {
                            a = data.radio_luas_tanah;
                        }
                        return a;
                    }
                },
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a = data.radio_luas_bangunan;
                        if (a === null || a === '') {
                            a = 'TIDAK ADA DATA';
                        } else {
                            a = data.radio_luas_bangunan;
                        }
                        return a;
                    }
                },
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a = data.radio_no_sertifikat;
                        if (a === null || a === '') {
                            a = 'TIDAK ADA DATA';
                        } else {
                            a = data.radio_no_sertifikat;
                        }
                        return a;
                    }
                },
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a = data.radio_topography;
                        if (a === null || a === '') {
                            a = 'TIDAK ADA DATA';
                        } else {
                            a = data.radio_topography;
                        }
                        return a;
                    }
                },
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a = data.radio_geography;
                        if (a === null || a === '') {
                            a = 'TIDAK ADA DATA';
                        } else {
                            a = data.radio_geography;
                        }
                        return a;
                    }
                },
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a = data.radio_pengurus_laki;
                        if (a === null || a === '') {
                            a = 'TIDAK ADA DATA';
                        } else {
                            a = data.radio_pengurus_laki;
                        }
                        return a;
                    }
                },
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a = data.radio_pengurus_perempuan;
                        if (a === null || a === '') {
                            a = 'TIDAK ADA DATA';
                        } else {
                            a = data.radio_pengurus_perempuan;
                        }
                        return a;
                    }
                },
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a = data.radio_jangkauan;
                        if (a === null || a === '') {
                            a = 'TIDAK ADA DATA';
                        } else {
                            a = data.radio_jangkauan;
                        }
                        return a;
                    }
                },
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a = data.radio_waktu;
                        if (a === null || a === '') {
                            a = 'TIDAK ADA DATA';
                        } else {
                            a = data.radio_waktu;
                        }
                        return a;
                    }
                },
                {
                    data: null, className: "text-wrap",
                    render: function (data) {
                        var a = data.radio_sejarah;
                        if (a === null || a === '') {
                            a = 'TIDAK ADA DATA';
                        } else {
                            a = data.radio_sejarah;
                        }
                        return a;
                    }
                },
                {
                    data: null, className: "text-center text-wrap",
                    render: function (data) {
                        var a, b;
                        a = data.radio_visi;
                        b = data.radio_misi;
                        if (a === null || a === '') {
                            a = 'TIDAK ADA DATA';
                        } else if (b === null || b === '') {
                            b = 'TIDAK ADA DATA';
                        }
                        var visi, misi;
                        visi = "<b>Visi</b><br>" + a + "<br>";
                        misi = "<b>Misi</b><br>" + b;
                        return visi + misi;
                    }
                },
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a = data.radio_penyiar1;
                        if (a === null || a === '') {
                            a = 'TIDAK ADA DATA';
                        } else {
                            a = data.radio_penyiar1;
                        }
                        return a;
                    }
                },
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a = data.radio_siaran1;
                        if (a === null || a === '') {
                            a = 'TIDAK ADA DATA';
                        } else {
                            a = data.radio_siaran1;
                        }
                        return a;
                    }
                },
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a = data.radio_pukul1;
                        if (a === null || a === '') {
                            a = 'TIDAK ADA DATA';
                        } else {
                            a = data.radio_pukul1;
                        }
                        return a;
                    }
                },
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a = data.radio_favorit1;
                        if (a === null || a === '') {
                            a = 'TIDAK ADA DATA';
                        } else {
                            a = data.radio_favorit1;
                        }
                        return a;
                    }
                },
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a = data.radio_jam1;
                        if (a === null || a === '') {
                            a = 'TIDAK ADA DATA';
                        } else {
                            a = data.radio_jam1;
                        }
                        return a;
                    }
                },
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a = data.radio_afiliasi;
                        if (a === null || a === '') {
                            a = 'TIDAK ADA DATA';
                        } else {
                            a = data.radio_afiliasi;
                        }
                        return a;
                    }
                }
            ]
        });
    };
</script>