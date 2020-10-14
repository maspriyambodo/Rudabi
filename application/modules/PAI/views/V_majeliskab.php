<style>
    .DTFC_ScrollWrapper{
        height:auto !important;
    }
    th, td { white-space: nowrap; }
    .dataTables_wrapper .dataTable {
        width: 100% !important;
        border-collapse: initial !important;
        border-spacing: 0 !important;
        margin:0 !important;
        border-radius: .42rem;
    }
</style>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"> Data Majelis Taklim Kota / Kabupaten {kabupaten}</h5>
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
            <table id="t_majelis" class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th colspan="3">
                            majelis
                        </th>
                        <th colspan="2">
                            ketua
                        </th>
                        <th colspan="4">
                            status
                        </th>
                        <th colspan="2">
                            pengurus
                        </th>
                        <th colspan="3">
                            jenis
                        </th>
                        <th rowspan="2">
                            kualifikasi
                        </th>
                        <th colspan="2">
                            pengajar
                        </th>
                        <th colspan="4">
                            kegiatan
                        </th>
                        <th colspan="2">
                            jamaah
                        </th>
                        <th rowspan="2">kelompok</th>
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
                            nama
                        </th>
                        <th>
                            pendidikan
                        </th>
                        <th>
                            izin
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
                            laki-laki
                        </th>
                        <th>
                            perempuan
                        </th>
                        <th>
                            formal
                        </th>
                        <th>
                            informal
                        </th>
                        <th>
                            non-formal
                        </th>
                        <th>
                            laki-laki
                        </th>
                        <th>
                            perempuan
                        </th>
                        <th>
                            jumlah
                        </th>
                        <th>
                            tempat
                        </th>
                        <th>
                            materi
                        </th>
                        <th>
                            alamat
                        </th>
                        <th>
                            profesi
                        </th>
                        <th>
                            suku
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
    var url = "https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/majelistaklim?KEY=BOBA&city_id=<?= $id; ?>";
    window.onload = function () {
        $('#t_majelis').dataTable({
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
                {data: "majelis_nama"},
                {data: "majelis_thn_berdiri", className: "text-center"},
                {data: "majelis_alamat"},
                {data: "majelis_ketua", className: "text-center"},
                {data: "majelis_pend_ketua", className: "text-center"},
                {data: "majelis_izin_opr", className: "text-center"},
                {data: "majelis_status_tanah", className: "text-center"},
                {data: "majelis_luas_tanah", className: "text-center"},
                {data: "majelis_luas_bangunan", className: "text-center"},
                {data: "majelis_pengurus_laki", className: "text-center"},
                {data: "majelis_pengurus_perempuan", className: "text-center"},
                {data: "majelis_formal", className: "text-center"},
                {data: "majelis_informal", className: "text-center"},
                {data: "majelis_non_formal", className: "text-center"},
                {data: "majelis_kualifikasi", className: "text-center"},
                {data: "majelis_pengajar_laki", className: "text-center"},
                {data: "majelis_pengajar_perempuan", className: "text-center"},
                {data: "majelis_vol_kegiatan", className: "text-center"},
                {data: "majelis_tmp_binaan", className: "text-center"},
                {data: "majelis_materi", className: "text-center"},
                {data: "majelis_alamat_binaan", className: "text-center"},
                {data: "majelis_profesi", className: "text-center"},
                {data: "majelis_suku", className: "text-center"},
                {data: "majelis_kelompok", className: "text-center"}
            ]
        });
    };
</script>