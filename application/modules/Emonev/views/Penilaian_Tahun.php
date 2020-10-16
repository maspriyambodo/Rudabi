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
                    <th>provinsi</th>
                    <th>kode<br>provinsi</th>
                    <th>data<br>penilai</th>
                    <th>data<br>validasi</th>
                    <th>data<br>non-validasi</th>
                    <th>data<br>penghulu</th>
                    <th>data<br>pegawai</th>
                    <th>data<br>penduduk</th>
                    <th>data<br>muslim</th>
                    <th>data<br>nikah</th>
                    <th>data<br>luas tanah</th>
                    <th>performa 1</th>
                    <th>performa 2</th>
                    <th>performa 3</th>
                    <th>performa 4</th>
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
                        <td>
                            <?= '<a href="' . base_url('Emonev/Penilaian/Kabupaten?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $value->kodekua . '&c=' . $value->propinsi))) . '">' . $value->propinsi . '</a>' ?>
                        </td>
                        <td class="text-center">
                            <?= $value->kodekua; ?>
                        </td>
                        <td class="text-center">
                            <?= $value->dt_penilai; ?>
                        </td>
                        <td class="text-center">
                            <?= $value->dt_validasi; ?>
                        </td>
                        <td class="text-center">
                            <?= $value->dt_nonvalidasi; ?>
                        </td>
                        <td class="text-center">
                            <?= $value->dt_penghulu; ?>
                        </td>
                        <td class="text-center">
                            <?= $value->dt_pegawai; ?>
                        </td>
                        <td class="text-center">
                            <?= $value->dt_penduduk; ?>
                        </td>
                        <td class="text-center">
                            <?= $value->dt_muslim; ?>
                        </td>
                        <td class="text-center">
                            <?= $value->dt_nikah; ?>
                        </td>
                        <td class="text-center">
                            <?= $value->dt_luastanah; ?>
                        </td>
                        <td class="text-center">
                            <?= number_format($value->dt_performa1); ?>
                        </td>
                        <td class="text-center">
                            <?= number_format($value->dt_performa2); ?>
                        </td>
                        <td class="text-center">
                            <?= number_format($value->dt_performa3); ?>
                        </td>
                        <td class="text-center">
                            <?= number_format($value->dt_performa4); ?>
                        </td>
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