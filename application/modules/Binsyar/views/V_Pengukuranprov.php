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
    .DTFC_LeftFootWrapper{
        top:16px !important;
    }
    #chartdiv,#chartdiv_b,#chartdiv_c{
        width:100%;height:650px;        
    }
</style>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-uppercase">data Hisab Pengukuran provinsi {provinsi}</h5>
        </div>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?= base_url('Binsyar/Pengukuran/index/'); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-uppercase text-center">
                    <tr>
                        <th rowspan="2">kota/kabupaten</th>
                        <th rowspan="2">tempat</th>
                        <th rowspan="2">lokasi</th>
                        <th colspan="4">lintang</th>
                        <th colspan="4">bujur</th>
                        <th rowspan="2">azimuth I</th>
                        <th rowspan="2">azimuth II</th>
                        <th rowspan="2">azimuth III</th>
                        <th rowspan="2">alamat</th>
                    </tr>
                    <tr>
                        <th>degree</th>
                        <th>arah</th>
                        <th>jam</th>
                        <th>menit</th>
                        <th>degree</th>
                        <th>arah</th>
                        <th>jam</th>
                        <th>menit</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
        var url = "https://simas.kemenag.go.id/rudabi/datapi/siihat/hisabpengukuran?ukur_provinsi=<?= $id; ?>";
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
                {data: "city_title"},
                {data: "ukur_tempat", className: "text-center"},
                {data: "ukur_lokasi", className: "text-center"},
                {data: "ukur_lintang_deg", className: "text-center"},
                {data: "ukur_lintang_arah", className: "text-center"},
                {data: "ukur_lintang_jam", className: "text-center"},
                {data: "ukur_lintang_menit", className: "text-center"},
                {data: "ukur_bujur_deg", className: "text-center"},
                {data: "ukur_bujur_arah", className: "text-center"},
                {data: "ukur_bujur_jam", className: "text-center"},
                {data: "ukur_bujur_menit", className: "text-center"},
                {data: "ukur_azimut_1", className: "text-center"},
                {data: "ukur_azimut_2", className: "text-center"},
                {data: "ukur_azimut_3", className: "text-center"},
                {data: "ukur_alamat", className: "text-center"}
            ]
        });
    };
</script>