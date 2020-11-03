<?php $a = json_decode($data); ?>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Detail Kecamatan <?php echo $param[5]; ?></h5>
        </div>
    </div>
</div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Detail Data Tanaf Wakaf
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">Kelurahan</th>
                        <th rowspan="2">luas</th>
                        <th rowspan="2">penggunaan</th>
                        <th rowspan="2">wakif</th>
                        <th rowspan="2">nadzir</th>
                        <th colspan="2">sertifikat</th>
                        <th rowspan="2">Akta Ikrar Wakaf</th>
                    </tr>
                    <tr>
                        <th>nomor</th>
                        <th>tanggal</th>
                        <th>nomor</th>
                        <th>tanggal</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php foreach ($a as $b) { ?>
                        <tr>
                            <td style="text-align:left !important;"><?php echo $b->Lokasi_Kel; ?></td>
                            <td><?php echo number_format($b->Luas / 10000, 2, ',', '.'); ?></td><!-- m&sup2; -->
                            <td><?php echo $b->Penggunaan; ?></td>
                            <td style="text-align:left !important;"><?php echo $b->Wakif; ?></td>
                            <td style="text-align:left !important;"><?php echo $b->Nadzir; ?></td>
                            <td><?php echo $b->S_No; ?></td>
                            <td><?php echo $b->S_Tgl; ?></td>
                            <td><?php echo $b->AIW_No; ?></td>
                            <td><?php echo $b->AIW_Tgl; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
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
            "processing": false,
            "deferRender": true,
            "scrollCollapse": true,
            "scrollX": true,
            "scrollY": "400px",
            fixedColumns: {
                leftColumns: 2
            },
            dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
                <'row'<'col-sm-12'tr>>
                <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
            buttons: [
                'print',
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
    };
</script>