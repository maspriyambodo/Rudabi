<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-uppercase">data lembaga dakwah kota/kabupaten {kabupaten}</h5>
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
                        <th colspan="3">ormas islam</th>
                        <th rowspan="2">afiliasi</th>
                        <th rowspan="2">alamat</th>
                        <th rowspan="2">izin</th>
                        <th rowspan="2">transportasi</th>
                        <th rowspan="2">topologi</th>
                        <th rowspan="2">geografi</th>
                        <th rowspan="2">tanah</th>
                        <th rowspan="2">lt</th>
                        <th rowspan="2">lb</th>
                        <th colspan="2">jumlah pengurus</th>
                        <th colspan="6">sarana &amp; prasarana</th>
                        <th rowspan="2">visi &amp; misi</th>
                    </tr>
                    <tr>
                        <th>
                            nama
                        </th>
                        <th>
                            ketua
                        </th>
                        <th>
                            tmt
                        </th>
                        <th>
                            laki-laki
                        </th>
                        <th>
                            perempuan
                        </th>
                        <th>
                            papan
                        </th>
                        <th>
                            lemari
                        </th>
                        <th>
                            meja
                        </th>
                        <th>
                            alas
                        </th>
                        <th>
                            komputer
                        </th>
                        <th>
                            plang
                        </th>
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
        var url = "https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/ormas?KEY=BOBA&city_id=<?= $id; ?>";
        $('table').dataTable({
            dom: 'Blfrtip',
            buttons: [
                {extend: 'print', footer: true},
                {extend: 'copyHtml5', footer: true},
                {extend: 'excelHtml5', footer: true},
                {extend: 'csvHtml5', footer: true},
                {extend: 'pdfHtml5', footer: true}
            ],
            "ServerSide": true,
            "order": [[0, "asc"]],
            "paging": false,
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
            "fixedColumns": {
                leftColumns: 3
            },
            columns: [
                {data: "ormas_nama", className: "text-wraps"},
                {data: "ormas_ketua", className: "text-center text-wraps"},
                {data: "ormas_thn_berdiri", className: "text-center"},
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a, b;
                        a = data.ormas_afiliasi;
                        if (a == "") {
                            b = "-";
                        } else {
                            b = a;
                        }
                        return b;
                    }
                },
                {data: "ormas_alamat", className: "text-center"},
                {data: "ormas_izin_opr", className: "text-center"},
                {data: "ormas_transportasi", className: "text-center"},
                {data: "ormas_topography", className: "text-center"},
                {data: "ormas_geography", className: "text-center"},
                {data: "ormas_status_tanah", className: "text-center"},
                {data: "ormas_luas_tanah", className: "text-center"},
                {data: "ormas_luas_bangunan", className: "text-center"},
                {data: "ormas_pengurus_laki", className: "text-center"},
                {data: "ormas_pengurus_perempuan", className: "text-center"},
                {data: "ormas_papan", className: "text-center"},
                {data: "ormas_lemari", className: "text-center"},
                {data: "ormas_meja", className: "text-center"},
                {data: "ormas_alas", className: "text-center"},
                {data: "ormas_komputer", className: "text-center"},
                {data: "ormas_plang", className: "text-center"},
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var visi, misi;
                        visi = data.ormas_visi;
                        misi = data.ormas_misi;
                        return visi + "<br>" + misi;
                    }
                }
            ]
        });
    };
</script>