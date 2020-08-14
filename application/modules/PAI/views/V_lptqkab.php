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
                            lembaga pembinaan tilawatil quran
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
        var url = "https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/dakwah?city_id=<?= $id; ?>";
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
                leftColumns: 3,
                heightMatch: 'none'
            },
            columns: [
                {data: "lembaga_nama", className: "namatxt"},
                {data: "lembaga_ketua"},
                {data: "lembaga_thn_berdiri"},
                {data: "lembaga_alamat"},
                {data: "lembaga_no_akte"},
                {data: "lembaga_izin_opr"},
                {data: "lembaga_topography"},
                {data: "lembaga_geography"},
                {data: "lembaga_transportasi"},
                {data: "lembaga_status_tanah"},
                {data: "lembaga_no_sertifikat"},
                {data: "lembaga_luas_tanah"},
                {data: "lembaga_luas_bangunan"},
                {data: "lembaga_pengurus_laki"},
                {data: "lembaga_pengurus_perempuan"},
                {data: "lembaga_papan"},
                {data: "lembaga_lemari"},
                {data: "lembaga_meja"},
                {data: "lembaga_alas"},
                {data: "lembaga_komputer"},
                {data: "lembaga_plang"},
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var visi, misi;
                        visi = data.lembaga_visi;
                        misi = data.lembaga_misi;
                        return visi + "<br>" + misi;
                    }}
            ]
        });
        table.columns.adjust().draw();
    };
</script>