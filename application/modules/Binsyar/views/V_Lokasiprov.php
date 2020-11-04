<?php $a = json_decode($data); ?>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Data Hisab Lokasi Provinsi <?php echo $param[1]; ?></h5>
        </div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <div class="text-uppercase">
                <a href="<?= base_url('Binsyar/Lokasi/index/'); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">kota/kabupaten</th>
                        <th rowspan="2">lokasi</th>
                        <th colspan="4">bujur</th>
                        <th colspan="4">lintang</th>
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
                <tbody>
                    <?php foreach ($a as $b) { ?>
                        <tr>
                            <td><?php echo $b->city_title; ?></td>
                            <td><?php echo $b->lokasi_lokasi; ?></td>
                            <td class="text-center"><?php echo $b->lokasi_bujur_deg; ?></td>
                            <td class="text-center"><?php echo $b->lokasi_bujur_arah; ?></td>
                            <td class="text-center"><?php echo $b->lokasi_bujur_jam; ?></td>
                            <td class="text-center"><?php echo $b->lokasi_bujur_menit; ?></td>
                            <td class="text-center"><?php echo $b->lokasi_lintang_deg; ?></td>
                            <td class="text-center"><?php echo $b->lokasi_lintang_arah; ?></td>
                            <td class="text-center"><?php echo $b->lokasi_lintang_jam; ?></td>
                            <td class="text-center"><?php echo $b->lokasi_lintang_menit; ?></td>
                            <td><?php echo $b->lokasi_alamat; ?></td>
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