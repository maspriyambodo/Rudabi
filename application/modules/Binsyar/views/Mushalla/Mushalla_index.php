<?php
$a = json_decode($data);
$c = 0; //dt_mushalla
$d = 0; //dt_tanah
$e = 0; //dt_bangunan
$f = 0; //dt_jamaah
$g = 0; //dt_pengurus
$h = 0; //dt_imam
$i = 0; //dt_khatib
$j = 0; //dt_muazin
$k = 0; //dt_remaja
$l = 0; //tipo_perumahan
$m = 0; //tipo_publik
$n = 0; //tipo_perkantoran
$o = 0; //tipo_pendidikan
?>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Data Mushalla</h5>
        </div>
    </div>
</div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Data Mushalla per Provinsi
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
            Jenis Tipologi Mushalla
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
            Detail Data Mushalla
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
                        <th rowspan="2">jumlah mushalla</th>
                        <th rowspan="2">luas tanah</th>
                        <th rowspan="2">luas bangunan</th>
                        <th rowspan="2">jamaah</th>
                        <th rowspan="2">pengurus</th>
                        <th rowspan="2">imam</th>
                        <th rowspan="2">khatib</th>
                        <th rowspan="2">muazin</th>
                        <th rowspan="2">remaja</th>
                        <th colspan="4">tipologi mushalla</th>
                    </tr>
                    <tr>
                        <th>perumahan</th>
                        <th>publik</th>
                        <th>perkantoran</th>
                        <th>pendidikan</th>
                    </tr>
                </thead>
                <tbody class="text-center text-uppercase">
                    <?php
                    foreach ($a as $b) {
                        $c += str_replace(',', '', $b->dt_mushalla); //dt_mushalla
                        $d += str_replace(',', '', $b->dt_tanah); //dt_tanah
                        $e += str_replace(',', '', $b->dt_bangunan); //dt_bangunan
                        $f += str_replace(',', '', $b->dt_jamaah); //dt_jamaah
                        $g += str_replace(',', '', $b->dt_pengurus); //dt_pengurus
                        $h += str_replace(',', '', $b->dt_imam); //dt_imam
                        $i += str_replace(',', '', $b->dt_khatib); //dt_khatib
                        $j += str_replace(',', '', $b->dt_muazin); //dt_muazin
                        $k += str_replace(',', '', $b->dt_remaja); //dt_remaja
                        $l += $b->tipo_perumahan; //tipo_perumahan
                        $m += $b->tipo_publik; //tipo_publik
                        $n += $b->tipo_perkantoran; //tipo_perkantoran
                        $o += $b->tipo_pendidikan; //tipo_pendidikan
                        ?>
                        <tr>
                            <td style="text-align:left !important;">
                                <?= '<a href="' . base_url('Binsyar/Mushalla/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $b->provinsi_id . '&b=' . $b->provinsi_name))) . '" title="Detail Provinsi ' . $b->provinsi_name . '">' . $b->provinsi_name . '</a>' ?>
                            </td>
                            <td><?= $b->dt_mushalla; ?></td>
                            <td><?= $b->dt_tanah; ?></td>
                            <td><?= $b->dt_bangunan; ?></td>
                            <td><?= $b->dt_jamaah; ?></td>
                            <td><?= $b->dt_pengurus; ?></td>
                            <td><?= $b->dt_imam; ?></td>
                            <td><?= $b->dt_khatib; ?></td>
                            <td><?= $b->dt_muazin; ?></td>
                            <td><?= $b->dt_remaja; ?></td>
                            <td><?= $b->tipo_perumahan; ?></td>
                            <td><?= $b->tipo_publik; ?></td>
                            <td><?= $b->tipo_perkantoran; ?></td>
                            <td><?= $b->tipo_pendidikan; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>total</th>
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
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<input type="hidden" name="dt_mushalla" readonly="" value="<?= number_format($c); ?>"/>
<input type="hidden" name="dt_tanah" readonly="" value="<?= number_format($d); ?>"/>
<input type="hidden" name="dt_bangunan" readonly="" value="<?= number_format($e); ?>"/>
<input type="hidden" name="dt_jamaah" readonly="" value="<?= number_format($f); ?>"/>
<input type="hidden" name="dt_pengurus" readonly="" value="<?= number_format($g); ?>"/>
<input type="hidden" name="dt_imam" readonly="" value="<?= number_format($h); ?>"/>
<input type="hidden" name="dt_khatib" readonly="" value="<?= number_format($i); ?>"/>
<input type="hidden" name="dt_muazin" readonly="" value="<?= number_format($j); ?>"/>
<input type="hidden" name="dt_remaja" readonly="" value="<?= number_format($k); ?>"/>
<input type="hidden" name="tipo_perumahan" readonly="" value="<?= number_format($l); ?>"/>
<input type="hidden" name="tipo_publik" readonly="" value="<?= number_format($m); ?>"/>
<input type="hidden" name="tipo_perkantoran" readonly="" value="<?= number_format($n); ?>"/>
<input type="hidden" name="tipo_pendidikan" readonly="" value="<?= number_format($o); ?>"/>
<script>
    window.onload = function () {
        var a, b, c, d, e, f, g, h, i, j, k, l, m;
        a = $('input[name="dt_mushalla"]').val();
        b = $('input[name="dt_tanah"]').val();
        c = $('input[name="dt_bangunan"]').val();
        d = $('input[name="dt_jamaah"]').val();
        e = $('input[name="dt_pengurus"]').val();
        f = $('input[name="dt_imam"]').val();
        g = $('input[name="dt_khatib"]').val();
        h = $('input[name="dt_muazin"]').val();
        i = $('input[name="dt_remaja"]').val();
        j = $('input[name="tipo_perumahan"]').val();
        k = $('input[name="tipo_publik"]').val();
        l = $('input[name="tipo_perkantoran"]').val();
        m = $('input[name="tipo_pendidikan"]').val();
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
            valueAxis.title.text = "Jumlah Mushalla";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "dt_mushalla";
            series.dataFields.categoryX = "provinsi_name";
            series.tooltipText = "Jumlah Mushalla Provinsi {provinsi_name}: [bold]{valueY}[/]";
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
                    country: "Mushalla Perumahan",
                    litres: j
                },
                {
                    country: "Mushalla Publik",
                    litres: k
                },
                {
                    country: "Mushalla Perkantoran",
                    litres: l
                },
                {
                    country: "Mushalla Pendidikan",
                    litres: m
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