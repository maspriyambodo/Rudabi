<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-uppercase">data lsi kota/kabupaten {kabupaten}</h5>
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
                <thead class="text-uppercase text-center">
                    <tr>
                        <th colspan="4">
                            lembaga seni islam
                        </th>
                        <th rowspan="2">
                            topography
                        </th>
                        <th rowspan="2">
                            geography
                        </th>
                        <th colspan="5">
                            status
                        </th>
                        <th colspan="6">
                            sarana &amp; prasarana
                        </th>
                        <th rowspan="2">
                            visi &amp; misi
                        </th>
                    </tr>
                    <tr>
                        <th>
                            nama
                        </th>
                        <th>
                            tmt
                        </th>
                        <th>
                            alamat
                        </th>
                        <th>
                            transportasi
                        </th>
                        <th>
                            izin
                        </th>
                        <th>
                            no akte
                        </th>
                        <th>
                            tanah
                        </th>
                        <th>
                            lt
                        </th>
                        <th>
                            lb
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
    var url = "https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/lembagaseni?KEY=BOBA&city_id=<?= $id; ?>";
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
            leftColumns: 2
        },
        "ajax": {
            dataSrc: '',
            method: "GET",
            async: false,
            url: url
        },
        columns: [
            {data: "lembaga_seni_nama", className: "text-center"},
            {data: "lembaga_seni_thn_berdiri", className: "text-center"},
            {data: "lembaga_seni_alamat", className: "text-center"},
            {data: "lembaga_seni_transportasi", className: "text-center"},
            {data: "lembaga_seni_topography", className: "text-center"},
            {data: "lembaga_seni_geography", className: "text-center"},
            {data: "lembaga_seni_izin_opr", className: "text-center"},
            {data: "lembaga_seni_no_akte", className: "text-center"},
            {data: "lembaga_seni_status_tanah", className: "text-center"},
            {data: "lembaga_seni_luas_tanah", className: "text-center"},
            {data: "lembaga_seni_luas_bangunan", className: "text-center"},
            {data: "lembaga_seni_papan", className: "text-center"},
            {data: "lembaga_seni_lemari", className: "text-center"},
            {data: "lembaga_seni_meja", className: "text-center"},
            {data: "lembaga_seni_alas", className: "text-center"},
            {data: "lembaga_seni_komputer", className: "text-center"},
            {data: "lembaga_seni_plang", className: "text-center"},
            {
                data: null, className: "text-center",
                render: function (data) {
                    var visi, misi;
                    visi = data.lembaga_seni_visi;
                    misi = data.lembaga_seni_misi;
                    return '<b>VISI</b><br>' + visi + "<br>" + '<b>MISI</b><br>' + misi;
                }
            }
        ]
    });
</script>