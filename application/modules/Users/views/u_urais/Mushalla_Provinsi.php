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
?>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Data Mushalla Provinsi <?= $param[1]; ?></h5>
        </div>
    </div>
</div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            <a href="<?= base_url('Users/Binsyar/Mushalla/index/'); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                        <th>kota/kabupaten</th>
                        <th>jumlah mushalla</th>
                        <th>luas tanah</th>
                        <th>luas bangunan</th>
                        <th>jamaah</th>
                        <th>pengurus</th>
                        <th>imam</th>
                        <th>khatib</th>
                        <th>muazin</th>
                        <th>remaja</th>
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
                        ?>
                        <tr>
                            <td style="text-align:left !important;">
                                <?= '<a href="' . base_url('Users/Binsyar/Mushalla/Kabupaten?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1] . '&c=' . $b->kabupaten_id . '&d=' . $b->kabupaten_name))) . '" title="Detail ' . $b->kabupaten_name . '">' . $b->kabupaten_name . '</a>' ?>
                            </td>
                            <td><?= number_format($b->dt_mushalla); ?></td>
                            <td><?= $b->dt_tanah; ?></td>
                            <td><?= $b->dt_bangunan; ?></td>
                            <td><?= number_format($b->dt_jamaah); ?></td>
                            <td><?= number_format($b->dt_pengurus); ?></td>
                            <td><?= number_format($b->dt_imam); ?></td>
                            <td><?= number_format($b->dt_khatib); ?></td>
                            <td><?= number_format($b->dt_muazin); ?></td>
                            <td><?= number_format($b->dt_remaja); ?></td>
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
        document.getElementById('title_chartdiv').innerText = "Total Data Mushalla: " + numeral(a).format('0,0');
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.data = <?= $data; ?>;
            chart.exporting.menu = new am4core.ExportMenu();
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.title.fontWeight = 800;
            categoryAxis.title.text = 'Daerah Tingkat Kota/Kabupaten';
            categoryAxis.dataFields.category = "kabupaten_name";
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
            series.dataFields.categoryX = "kabupaten_name";
            series.tooltipText = "Jumlah Mushalla {kabupaten_name}: [bold]{valueY}[/]";
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
                {extend: 'print', footer: true},
                {extend: 'copyHtml5', footer: true},
                {extend: 'excelHtml5', footer: true},
                {extend: 'csvHtml5', footer: true},
                {extend: 'pdfHtml5', footer: true}
            ]
        });
    };
</script>