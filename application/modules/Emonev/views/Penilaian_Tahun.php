<?php $taun = json_decode($data); ?>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Rekapitulasi Penilaian KUA: Tahun <?= $param[0] ?></h5>
        </div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?= base_url('Emonev/Penilaian/index'); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover table-striped" style="width:100%;">
            <thead class="text-center text-uppercase">
                <tr>
                    <th>no</th>
                    <th>kabupaten</th>
                    <th>kode kua</th>
                    <th>nama kua</th>
                    <th>kepala kua</th>
                    <th>tanggal<br>input</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($taun as $value) { ?>

                    <tr>
                        <td class="text-center">
                            <?php
                            static $id = 1;
                            echo $id++;
                            ?>
                        </td>
                        <td><?= $value->kabupaten; ?></td>
                        <td class="text-center"><?= $value->kodekua; ?></td>
                        <td><?= $value->kua; ?></td>
                        <td><?= $value->kepala; ?></td>
                        <td class="text-center"><?= date("d F Y", strtotime($value->tgl)); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
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