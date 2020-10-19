<?php $a = json_decode($data); ?>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"> Data Penyuluh Non-PNS <?= date('Y'); ?> </h5>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <a href="<?= base_url('PAI/Simpenais/index/'); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">
                            nama
                        </th>
                        <th rowspan="2">
                            jenis<br>kelamin
                        </th>
                        <th colspan="2">
                            lahir
                        </th>
                        <th rowspan="2">
                            Status<br>kawin
                        </th>
                        <th rowspan="2">
                            alamat
                        </th>
                    </tr>
                    <tr>
                        <th>
                            tempat
                        </th>
                        <th>
                            tanggal
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($a as $b) { ?>
                        <tr>
                            <td></td>
                            <td class="text-center"><?= $b->penyuluh_nonpns_nama; ?></td>
                            <td class="text-center"><?= $b->penyuluh_nonpns_jenis_kelamin; ?></td>
                            <td class="text-center"><?= $b->penyuluh_nonpns_tempat_lahir; ?></td>
                            <td class="text-center"><?= $b->penyuluh_nonpns_status_kawin; ?></td>
                            <td><?= $b->penyuluh_nonpns_alamat; ?></td>
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
            "processing": true,
            "deferRender": true,
            "scrollCollapse": true,
            "scrollX": true,
            "scrollY": "400px"
        });
    };
</script>