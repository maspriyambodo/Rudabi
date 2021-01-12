<?php
$penilai = json_decode($data);
$a = 0;
$b = 0;
$c = 0;
$d = 0;
$e = 0;
$f = 0;
$g = 0;
$h = 0;
$i = 0;
$j = 0;
$k = 0;
$l = 0;
$m = 0;
?>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Rekapitulasi Penilaian KUA: Provinsi <?= $param[2] ?></h5>
        </div>
    </div>
</div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            <a href="<?= base_url('Users/BKKS/Penilaian/Tahun?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0]))); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="text-center">
            <b><u id="title_chartdiv"></u></b>
        </div>
        <div id="chartdiv" class="chartdivs"></div>
    </div>
</div>
<div class="clear" style="margin:5%;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Detail Data Penilaian Provinsi <?= $param[2]; ?>
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
                        <th>no</th>
                        <th>kota/kabupaten</th>
                        <th>kode</th>
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
                    <?php
                    foreach ($penilai as $value) {
                        $a += $value->dt_penilai;
                        $b += $value->dt_validasi;
                        $c += $value->dt_nonvalidasi;
                        $d += $value->dt_penghulu;
                        $e += $value->dt_pegawai;
                        $f += $value->dt_penduduk;
                        $g += $value->dt_muslim;
                        $h += $value->dt_nikah;
                        $i += $value->dt_luastanah;
                        $j += $value->dt_performa1;
                        $k += $value->dt_performa2;
                        $l += $value->dt_performa3;
                        $m += $value->dt_performa4;
                        ?>
                        <tr>
                            <td class="text-center">
                                <?php
                                static $id = 1;
                                echo $id++;
                                ?>
                            </td>
                            <td>
                                <?php
                                echo '<a href="' . base_url('Users/BKKS/Penilaian/Detail?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1] . '&c=' . $param[2] . '&d=' . $value->kodekab . '&e=' . $value->kabupaten))) . '">' . $value->kabupaten . '</a>';
                                ?>
                            </td>
                            <td class="text-center"><?= $value->kodekab; ?></td>
                            <td class="text-center"><?= $value->dt_penilai; ?></td>
                            <td class="text-center"><?= $value->dt_validasi; ?></td>
                            <td class="text-center"><?= $value->dt_nonvalidasi; ?></td>
                            <td class="text-center"><?= $value->dt_penghulu; ?></td>
                            <td class="text-center"><?= $value->dt_pegawai; ?></td>
                            <td class="text-center"><?= $value->dt_penduduk; ?></td>
                            <td class="text-center"><?= $value->dt_muslim; ?></td>
                            <td class="text-center"><?= $value->dt_nikah; ?></td>
                            <td class="text-center"><?= $value->dt_luastanah; ?></td>
                            <td class="text-center"><?= number_format($value->dt_performa1); ?></td>
                            <td class="text-center"><?= number_format($value->dt_performa2); ?></td>
                            <td class="text-center"><?= number_format($value->dt_performa3); ?></td>
                            <td class="text-center"><?= number_format($value->dt_performa4); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th colspan="3">jumlah</th>
                        <th><?= $a; ?></th>
                        <th><?= $b; ?></th>
                        <th><?= $c; ?></th>
                        <th><?= $d; ?></th>
                        <th><?= $e; ?></th>
                        <th><?= $f; ?></th>
                        <th><?= $g; ?></th>
                        <th><?= $h; ?></th>
                        <th><?= $i; ?></th>
                        <th><?= number_format($j); ?></th>
                        <th><?= number_format($k); ?></th>
                        <th><?= number_format($l); ?></th>
                        <th><?= number_format($m); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<input type="hidden" name="dt_penilai" readonly="" value="<?= number_format($a); ?>"/>
<script>
    window.onload = function () {
        document.getElementById('title_chartdiv').innerText = "Total Data Tahun <?= $param[0]; ?> Provinsi <?= $param[2]; ?>: " + $('input[name="dt_penilai"]').val();
        am4core.ready(function () {
            am4core.useTheme(am4themes_frozen);
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0;

            chart.legend = new am4charts.Legend();

            chart.data = [
                {
                    country: "Data Validasi",
                    litres: <?= $b; ?>
                },
                {
                    country: "Data Non-Validasi",
                    litres: <?= $c; ?>
                }
            ];

            chart.innerRadius = 100;

            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "litres";
            series.dataFields.category = "country";

        });
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
                {extend: 'print', footer: true},
                {extend: 'copyHtml5', footer: true},
                {extend: 'excelHtml5', footer: true},
                {extend: 'csvHtml5', footer: true},
                {extend: 'pdfHtml5', footer: true}
            ]
        });
    };
</script>