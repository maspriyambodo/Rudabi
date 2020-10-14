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
    .text-wrap{
        white-space:normal !important;
        width:400px;
    }
</style>
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
                        <th colspan="4">
                            lembaga dakwah
                        </th>
                        <th rowspan="2">
                            akta
                        </th>
                        <th rowspan="2">
                            izin
                        </th>
                        <th rowspan="2">
                            topografi
                        </th>
                        <th rowspan="2">
                            geografi
                        </th>
                        <th rowspan="2">
                            transportasi
                        </th>
                        <th rowspan="2">
                            tanah
                        </th>
                        <th rowspan="2">
                            sertifikat
                        </th>
                        <th rowspan="2">
                            lt
                        </th>
                        <th rowspan="2">
                            lb
                        </th>
                        <th colspan="2">
                            jumlah pengurus
                        </th>
                        <th colspan="6">
                            sarana &amp; prasarana
                        </th>
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
                            alamat
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
        var url = "https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/dakwah?KEY=BOBA&city_id=<?= $id; ?>";
        var table = $('table').dataTable({
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
                {data: "lembaga_nama", className: "text-wrap"},
                {data: "lembaga_ketua", className: "text-center"},
                {data: "lembaga_thn_berdiri", className: "text-center"},
                {data: "lembaga_alamat", className: "text-center"},
                {data: "lembaga_no_akte", className: "text-center"},
                {data: "lembaga_izin_opr", className: "text-center"},
                {data: "lembaga_topography", className: "text-center"},
                {data: "lembaga_geography", className: "text-center"},
                {data: "lembaga_transportasi", className: "text-center"},
                {data: "lembaga_status_tanah", className: "text-center"},
                {data: "lembaga_no_sertifikat", className: "text-center"},
                {data: "lembaga_luas_tanah", className: "text-center"},
                {data: "lembaga_luas_bangunan", className: "text-center"},
                {data: "lembaga_pengurus_laki", className: "text-center"},
                {data: "lembaga_pengurus_perempuan", className: "text-center"},
                {data: "lembaga_papan", className: "text-center"},
                {data: "lembaga_lemari", className: "text-center"},
                {data: "lembaga_meja", className: "text-center"},
                {data: "lembaga_alas", className: "text-center"},
                {data: "lembaga_komputer", className: "text-center"},
                {data: "lembaga_plang", className: "text-center"},
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var visi, misi;
                        visi = data.lembaga_visi;
                        misi = data.lembaga_misi;
                        return visi + "<br>" + misi;
                    }
                }
            ]
        });
    };
</script>