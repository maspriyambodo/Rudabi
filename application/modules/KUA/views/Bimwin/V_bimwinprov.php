<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-uppercase">data target catin provinsi {provinsi}</h5>
        </div>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?= base_url('KUA/Bimwin/index/'); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-uppercase text-center">
                    <tr>
                        <th rowspan="2">provinsi</th>
                        <th colspan="2">target wilayah</th>
                        <th colspan="2">target anggaran</th>
                    </tr>
                    <tr>
                        <th>jumlah</th>
                        <th>realisasi</th>
                        <th>jumlah</th>
                        <th>realisasi</th>
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
            "paging": false,
            "ordering": true,
            "info": true,
            "processing": true,
            "deferRender": true,
            "scrollCollapse": true,
            "scrollX": true,
            "scrollY": "400px",
            dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
                        <'row'<'col-sm-12'tr>>
                        <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,

            buttons: [
                'print',
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],
            "ajax": {
                dataSrc: '',
                method: "GET",
                async: false,
                url: "https://simas.kemenag.go.id/rudabi/datapi/embimwin/targetcatin2020?id_prop=<?= $id; ?>"
            },
            columns: [
                {data: "nama_lokasi"},
                {data: "target_kabkot", className: "text-center"},
                {data: "realisasi_kabupaten", className: "text-center"},
                {data: "total_anggaran", className: "text-center"},
                {data: "total_realisasi", className: "text-center"}
            ]
        });
    };
</script>