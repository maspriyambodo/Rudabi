<?php $approved = json_decode($data); ?>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Data Approved Provinsi {provinsi} Tahun {tahun}</h5>
        </div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <?php $url = str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt($tahun)); ?>
            <a href="<?= base_url('Sekertariat/Approved/index/' . $url . ''); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <div class="text-center">
            <b>Jumlah Data Menurut Kota/Kabupaten</b>
        </div>
        <div id="chartdiv" class="chartdivs"></div>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            Detail Data Approved Usulan
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>kota/kabupaten</th>
                        <th>jumlah<br>data</th>
                        <th>luas<br>tanah</th>
                        <th>penghapusan<br>gedung</th>
                        <th>tanah<br>kosong</th>
                        <th>perluasan<br>bangunan</th>
                        <th>dipa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totjum_kabkot = 0;
                    $totluas_tanah = 0;
                    $totpenghapusan_gedung = 0;
                    $tottanah_kosong = 0;
                    $totperluasan_bangunan = 0;
                    $totnilai_dipa = 0;
                    foreach ($approved as $approved) {
                        ?>
                        <tr>
                            <td>
                                <?= '<a href="' . base_url('Sekertariat/Approved/Kabupaten?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $tahun . '&b=' . $id_provinsi . '&c=' . $approved->usul_kabupaten . '&d=' . $approved->kab_nama . ''))) . '">' . $approved->kab_nama . '</a>'; ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $totjum_kabkot += $approved->jum_kabkot;
                                echo $approved->jum_kabkot;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $luas_tanah = str_replace([',', '.'], ['', ''], $approved->luas_tanah);
                                $totluas_tanah += $luas_tanah;
                                echo $approved->luas_tanah;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $penghapusan_gedung = str_replace([',', '.'], ['', ''], $approved->penghapusan_gedung);
                                $totpenghapusan_gedung += $penghapusan_gedung;
                                echo $approved->penghapusan_gedung;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $tanah_kosong = str_replace([',', '.'], ['', ''], $approved->tanah_kosong);
                                $tottanah_kosong += $tanah_kosong;
                                echo $approved->tanah_kosong;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $perluasan_bangunan = str_replace([',', '.'], ['', ''], $approved->perluasan_bangunan);
                                $totperluasan_bangunan += $perluasan_bangunan;
                                echo $approved->perluasan_bangunan;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $nilai_dipa = str_replace([',', '.'], ['', ''], $approved->nilai_dipa);
                                $totnilai_dipa += $nilai_dipa;
                                echo $approved->nilai_dipa;
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>jumlah</th>
                        <th><?= number_format($totjum_kabkot); ?></th>
                        <th><?= number_format($totluas_tanah); ?></th>
                        <th><?= number_format($totpenghapusan_gedung); ?></th>
                        <th><?= number_format($tottanah_kosong); ?></th>
                        <th><?= number_format($totperluasan_bangunan); ?></th>
                        <th><?= number_format($totnilai_dipa); ?></th>
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
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0;

            chart.legend = new am4charts.Legend();

            chart.data = <?= $data; ?>;

            chart.innerRadius = 100;

            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "jum_kabkot";
            series.dataFields.category = "kab_nama";

        });
    };
</script>