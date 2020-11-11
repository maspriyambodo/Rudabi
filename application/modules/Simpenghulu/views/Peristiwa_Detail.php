<?php $a = json_decode($data); ?>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Peristiwa Nikah <?= $param[1]; ?></h5>
        </div>
    </div>
</div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            <a href="<?= base_url('Simpenghulu/Peristiwa/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[2] . '&b=' . $param[3]))); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                        <th colspan="3">mempelai pria</th>
                        <th colspan="3">mempelai wanita</th>
                        <th rowspan="2">tanggal<br>pernikahan</th>
                        <th rowspan="2">lokasi<br>kua</th>
                        <th rowspan="2">lokasi<br>pernikahan</th>
                        <th rowspan="2">wali nasab</th>
                        <th rowspan="2">wali hakim</th>
                        <th rowspan="2">no akta</th>
                        <th rowspan="2">status</th>
                    </tr>
                    <tr>
                        <th>nama</th>
                        <th>pendidikan</th>
                        <th>usia</th>
                        <th>nama</th>
                        <th>pendidikan</th>
                        <th>usia</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($a as $b) { ?>
                        <tr>
                            <td><?= $b->nikah_nama_pria; ?></td>
                            <td class="text-center"><?= $b->nikah_pddk_pria; ?></td>
                            <td class="text-center"><?= $b->nikah_usia_pria; ?></td>
                            <td><?= $b->nikah_nama_wanita; ?></td>
                            <td class="text-center"><?= $b->nikah_pddk_wanita; ?></td>
                            <td class="text-center"><?= $b->nikah_usia_wanita; ?></td>
                            <td class="text-center"><?= $b->nikah_tanggal; ?></td>
                            <td><?= $b->kua_title; ?></td>
                            <td class="text-center"><?= $b->nikah_tempat; ?></td>
                            <td><?= $b->nikah_wali_nasab; ?></td>
                            <td><?= $b->nikah_wali_hakim; ?></td>
                            <td><?= $b->nikah_no_akte; ?></td>
                            <td><?= $b->status; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
        var data = {
            "nikah_nama_pria": "Al Halimi",
            "nikah_pddk_pria": "SMA",
            "nikah_usia_pria": "21",
            "nikah_nama_wanita": "Dewi",
            "nikah_pddk_wanita": "SMP",
            "nikah_usia_wanita": "21",
            "nikah_tanggal": "2018-11-16",
            "kua_title": "Pasie Raju",
            "nikah_tempat": "KANTOR",
            "nikah_wali_nasab": "Mak Asem",
            "nikah_wali_hakim": "-",
            "nikah_no_akte": "0177/03/XI/2018",
            "status": "terlaksana"
        };
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
                {extend: 'print', footer: true},
                {extend: 'copyHtml5', footer: true},
                {extend: 'excelHtml5', footer: true},
                {extend: 'csvHtml5', footer: true},
                {extend: 'pdfHtml5', footer: true}
            ]
        });
    };
</script>