<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-uppercase">data LPTQ Kabupaten {kabupaten}</h5>
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
                        <th colspan="3">LPTQ</th>
                        <th rowspan="2">izin</th>
                        <th rowspan="2">alamat</th>
                        <th rowspan="2">afiliasi</th>
                        <th rowspan="2">transportasi</th>
                        <th rowspan="2">topografi</th>
                        <th rowspan="2">geografi</th>
                        <th rowspan="2">status<br>tanah</th>
                        <th rowspan="2">nomor<br>sertifikat</th>
                        <th rowspan="2">lt</th>
                        <th rowspan="2">lb</th>
                        <th colspan="2">pengurus</th>
                    </tr>
                    <tr>
                        <th>nama</th>
                        <th>ketua</th>
                        <th>tahun</th>
                        <th>pria</th>
                        <th>wanita</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
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
                url: "https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/lsmislam?city_id=<?= $id; ?>"
            },
            columns: [
                {data: "lsm_islam_nama"},
                {data: "lsm_islam_nama_ketua", className: "text-center"},
                {data: "lsm_islam_thn_berdiri", className: "text-center"},
                {data: "lsm_islam_izin_opr", className: "text-center"},
                {data: "lsm_islam_alamat", className: "text-center"},
                {data: "lsm_islam_afiliasi", className: "text-center"},
                {data: "lsm_islam_transportasi", className: "text-center"},
                {data: "lsm_islam_topography", className: "text-center"},
                {data: "lsm_islam_geography", className: "text-center"},
                {data: "lsm_islam_status_tanah", className: "text-center"},
                {data: "lsm_islam_no_sertifikat", className: "text-center"},
                {data: "lsm_islam_luas_tanah", className: "text-center"},
                {data: "lsm_islam_luas_bangunan", className: "text-center"},
                {data: "lsm_islam_pengurus_pria", className: "text-center"},
                {data: "lsm_islam_pengurus_wanita", className: "text-center"}
            ]
        });
    };
</script>