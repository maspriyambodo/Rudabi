<?php
$a = json_decode($data);
$c = 0; //dt_masjid
$d = 0; //dt_tanah
$e = 0; //dt_bangunan
$f = 0; //dt_jamaah
$g = 0; //dt_pengurus
$h = 0; //dt_imam
$i = 0; //dt_khatib
$j = 0; //dt_muazin
$k = 0; //dt_remaja
$l = 0; //tipo_negara
$m = 0; //tipo_raya
$n = 0; //tipo_agung
$o = 0; //tipo_besar
$p = 0; //tipo_jami
$q = 0; //tipo_bersejarah
$r = 0; //tipo_publik
$s = 0; //tipo_nasional
$t = 0; //dt_wakaf
$u = 0; //dt_shm
$v = 0; //dt_girik
$w = 0; //dt_bmn
$x = 0; //dt_sewa
$y = 0; //dt_hibah
?>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Sistem Informasi Masjid</h5>
        </div>
    </div>
</div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Data Masjid per Provinsi
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
<div class="clearfix" style="margin:5% 0px;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Data Masjid berdasarkan tipologi
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div id="chartdiv_a" class="chartdivs"></div>
    </div>
</div>
<div class="clearfix" style="margin:5% 0px;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Detail data Masjid
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
                        <th rowspan="2">provinsi</th>
                        <th rowspan="2">jumlah masjid</th>
                        <th rowspan="2">luas tanah</th>
                        <th rowspan="2">luas bangunan</th>
                        <th rowspan="2">jamaah</th>
                        <th rowspan="2">pengurus</th>
                        <th rowspan="2">imam</th>
                        <th rowspan="2">khatib</th>
                        <th rowspan="2">muazin</th>
                        <th rowspan="2">remaja</th>
                        <th colspan="8">tipologi masjid</th>
                    </tr>
                    <tr>
                        <th>negara</th>
                        <th>raya</th>
                        <th>agung</th>
                        <th>besar</th>
                        <th>jami</th>
                        <th>bersejarah</th>
                        <th>publik</th>
                        <th>nasional</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    foreach ($a as $b) {
                        $c += str_replace(',', '', $b->dt_masjid); //dt_masjid
                        $d += str_replace(',', '', $b->dt_tanah); //dt_tanah
                        $e += str_replace(',', '', $b->dt_bangunan); //dt_bangunan
                        $f += str_replace(',', '', $b->dt_jamaah); //dt_jamaah
                        $g += str_replace(',', '', $b->dt_pengurus); //dt_pengurus
                        $h += str_replace(',', '', $b->dt_imam); //dt_imam
                        $i += str_replace(',', '', $b->dt_khatib); //dt_khatib
                        $j += str_replace(',', '', $b->dt_muazin); //dt_muazin
                        $k += str_replace(',', '', $b->dt_remaja); //dt_remaja
                        $l += $b->tipo_negara; //tipo_negara
                        $m += $b->tipo_raya; //tipo_raya
                        $n += $b->tipo_agung; //tipo_agung
                        $o += $b->tipo_besar; //tipo_besar
                        $p += $b->tipo_jami; //tipo_jami
                        $q += $b->tipo_bersejarah; //tipo_bersejarah
                        $r += $b->tipo_publik; //tipo_publik
                        $s += $b->tipo_nasional; //tipo_nasional
                        $t += $b->dt_wakaf; //dt_wakaf
                        $u += $b->dt_shm; //dt_shm
                        $v += $b->dt_girik; //dt_girik
                        $w += $b->dt_bmn; //dt_bmn
                        $x += $b->dt_sewa; //dt_sewa
                        $y += $b->dt_hibah; //dt_hibah
                        ?>
                        <tr>
                            <td style="text-align:left !important;">
                                <?= '<a href="' . base_url('Binsyar/Simas/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $b->provinsi_id . '&b=' . $b->provinsi_name))) . '" title="Detail Provinsi ' . $b->provinsi_name . '">' . $b->provinsi_name . '</a>'; ?>
                            </td>
                            <td><?= $b->dt_masjid; ?></td>
                            <td><?= $b->dt_tanah; ?></td>
                            <td><?= $b->dt_bangunan; ?></td>
                            <td><?= $b->dt_jamaah; ?></td>
                            <td><?= $b->dt_pengurus; ?></td>
                            <td><?= $b->dt_imam; ?></td>
                            <td><?= $b->dt_khatib; ?></td>
                            <td><?= $b->dt_muazin; ?></td>
                            <td><?= $b->dt_remaja; ?></td>
                            <td><?= number_format($b->tipo_negara); ?></td>
                            <td><?= number_format($b->tipo_raya); ?></td>
                            <td><?= number_format($b->tipo_agung); ?></td>
                            <td><?= number_format($b->tipo_besar); ?></td>
                            <td><?= number_format($b->tipo_jami); ?></td>
                            <td><?= number_format($b->tipo_bersejarah); ?></td>
                            <td><?= number_format($b->tipo_publik); ?></td>
                            <td><?= number_format($b->tipo_nasional); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>Total</th>
                        <th><?= number_format($c); ?></th>
                        <th><?= number_format($d); ?></th>
                        <th><?= number_format($e); ?></th>
                        <th><?= number_format($f); ?></th>
                        <th><?= number_format($g); ?></th>
                        <th><?= number_format($h); ?></th>
                        <th><?= number_format($i); ?></th>
                        <th><?= number_format($j); ?></th>
                        <th><?= number_format($k); ?></th>
                        <th><?= number_format($l); ?></th>
                        <th><?= number_format($m); ?></th>
                        <th><?= number_format($n); ?></th>
                        <th><?= number_format($o); ?></th>
                        <th><?= number_format($p); ?></th>
                        <th><?= number_format($q); ?></th>
                        <th><?= number_format($r); ?></th>
                        <th><?= number_format($s); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<input type="hidden" name="dt_masjid" readonly="" value="<?= number_format($c); ?>"/>
<input type="hidden" name="tipo_negara" readonly="" value="<?= number_format($l); ?>"/>
<input type="hidden" name="tipo_raya" readonly="" value="<?= number_format($m); ?>"/>
<input type="hidden" name="tipo_agung" readonly="" value="<?= number_format($n); ?>"/>
<input type="hidden" name="tipo_besar" readonly="" value="<?= number_format($o); ?>"/>
<input type="hidden" name="tipo_jami" readonly="" value="<?= number_format($p); ?>"/>
<input type="hidden" name="tipo_bersejarah" readonly="" value="<?= number_format($q); ?>"/>
<input type="hidden" name="tipo_publik" readonly="" value="<?= number_format($r); ?>"/>
<input type="hidden" name="tipo_nasional" readonly="" value="<?= number_format($s); ?>"/>
<script>
    window.onload = function () {
        var dt_masjid = $('input[name="dt_masjid"]').val();
        var tipo_negara = $('input[name="tipo_negara"]').val();
        var tipo_raya = $('input[name="tipo_raya"]').val();
        var tipo_agung = $('input[name="tipo_agung"]').val();
        var tipo_besar = $('input[name="tipo_besar"]').val();
        var tipo_jami = $('input[name="tipo_jami"]').val();
        var tipo_bersejarah = $('input[name="tipo_bersejarah"]').val();
        var tipo_publik = $('input[name="tipo_publik"]').val();
        var tipo_nasional = $('input[name="tipo_nasional"]').val();
        document.getElementById('title_chartdiv').innerText = "Total Data Masjid: " + dt_masjid;
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.data = <?= $data; ?>;
            chart.exporting.menu = new am4core.ExportMenu();
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.title.fontWeight = 800;
            categoryAxis.title.text = 'Daerah Tingkat Provinsi';
            categoryAxis.dataFields.category = "provinsi_name";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;
            valueAxis.title.text = "Jumlah Masjid";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "dt_masjid";
            series.dataFields.categoryX = "provinsi_name";
            series.tooltipText = "Jumlah Masjid Provinsi {provinsi_name}: [bold]{valueY}[/]";
            series.columns.template.strokeWidth = 0;
            series.tooltip.pointerOrientation = "vertical";
            series.columns.template.column.cornerRadiusTopLeft = 10;
            series.columns.template.column.cornerRadiusTopRight = 10;
            series.columns.template.column.fillOpacity = 0.8;
            var hoverState = series.columns.template.column.states.create("hover");
            hoverState.properties.cornerRadiusTopLeft = 0;
            hoverState.properties.cornerRadiusTopRight = 0;
            hoverState.properties.fillOpacity = 1;
            series.columns.template.adapter.add("fill", function (fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            });
            chart.cursor = new am4charts.XYCursor();
        });
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv_a", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0;

            chart.legend = new am4charts.Legend();

            chart.data = [
                {
                    country: "Masjid Negara",
                    litres: tipo_negara
                },
                {
                    country: "Masjid Jami",
                    litres: tipo_jami
                },
                {
                    country: "Masjid Agung",
                    litres: tipo_agung
                },
                {
                    country: "Masjid Raya",
                    litres: tipo_raya
                },
                {
                    country: "Masjid Besar",
                    litres: tipo_besar
                },
                {
                    country: "Masjid Bersejarah",
                    litres: tipo_bersejarah
                },
                {
                    country: "Masjid Nasional",
                    litres: tipo_nasional
                },
                {
                    country: "Masjid Publik",
                    litres: tipo_publik
                }
            ];

            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "litres";
            series.dataFields.category = "country";

        });
        $('table').dataTable({
            "ServerSide": true,
            "order": [[0, "asc"]],
            "paging": false,
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
                'print',
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
    };
</script>