<?php
$pegawai = json_decode($data);
?>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Data Pegawai <?= $param[0]; ?></h5>
        </div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            DETAIL DATA PEGAWAI
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>nama</th>
                        <th>jenis<br>kelamin</th>
                        <th>agama</th>
                        <th>orang<br>tua</th>
                        <th>orang<br>tua</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pegawai as $pegawai) { ?>
                        <tr>
                            <td>
                                <?php
                                $url = str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $pegawai->peg_id . '&b=' . $pegawai->nama));
                                echo '<a href="' . base_url('Sekertariat/Sicakep/Pegawai/Detail?key=' . $url) . '">' . $pegawai->nama . '</a>';
                                ?>
                            </td>
                            <td class="text-center">
                                <!--=========================================-->
                                lanjut disini
                                <!--=========================================-->
                            </td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
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