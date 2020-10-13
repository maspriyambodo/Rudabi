<?php $pensiun = json_decode($data); ?>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Data Mutasi Pegawai Pensiun</h5>
        </div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">provinsi</th>
                        <th colspan="4">golongan i</th>
                        <th colspan="4">golongan ii</th>
                        <th colspan="4">golongan iii</th>
                        <th colspan="5">golongan iv</th>
                        <th rowspan="2">tanpa<br>golongan</th>
                    </tr>
                    <tr>
                        <th>i/a</th>
                        <th>i/b</th>
                        <th>i/c</th>
                        <th>i/d</th>
                        <th>ii/a</th>
                        <th>ii/b</th>
                        <th>ii/c</th>
                        <th>ii/d</th>
                        <th>iii/a</th>
                        <th>iii/b</th>
                        <th>iii/c</th>
                        <th>iii/d</th>
                        <th>iv/a</th>
                        <th>iv/b</th>
                        <th>iv/c</th>
                        <th>iv/d</th>
                        <th>iv/e</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pensiun as $pensiun_r) { ?>
                        <tr>
                            <td>
                                <?php
                                    echo '<a href="' . base_url('Sekertariat/Pensiun/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $pensiun_r->peg_provinsi . '&b=' . $pensiun_r->propinsi_nama))) . '" title="Detail Provinsi ' . $pensiun_r->propinsi_nama . '">' . $pensiun_r->propinsi_nama . '</a>';
                                ?>
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class = "text-center text-uppercase">
                    <tr>
                        <td>jumlah</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
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