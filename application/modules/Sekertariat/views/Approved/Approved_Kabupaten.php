<?php
$totnilai_dipa = 0;
$approved = json_decode($data);
?>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Data <?= $param[3] ?> Tahun <?= $param[0]; ?></h5>
        </div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <?php $url = str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $approved[0]->propinsi_nama . '&b=' . $param[0] . '&c=' . $param[1])); ?>
            <a href="<?= base_url('Sekertariat/Approved/Provinsi?key=' . $url . ''); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>kua</th>
                        <th>alamat</th>
                        <th>usulan</th>
                        <th>dipa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($approved as $value) { ?>
                        <tr>
                            <td>
                                <?= $value->usul_nama_kua; ?>
                            </td>
                            <td class="text-center text-wrap">
                                <?= $value->usul_alamat_kua; ?>
                            </td>
                            <td class="text-center"><?= $value->usul_status_tanah; ?></td>
                            <td class="text-center">
                                <?php
                                $nilai_dipa = str_replace(',', '', $value->nilai_dipa);
                                $totnilai_dipa += $nilai_dipa;
                                echo $value->nilai_dipa;
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th colspan="4">Total Nilai Dipa Rp. <?= number_format($totnilai_dipa); ?></th>
                    </tr>
                </tfoot>
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
            ]
        });
    };
</script>