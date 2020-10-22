<?php
$a = json_decode($data);
$c = 0; // dt_nikah
$d = 0; // pddk_sd_pria
$e = 0; // pddk_smp_pria
$f = 0; // pddk_sma_pria
$g = 0; // pddk_s1_pria
$h = 0; // pddk_s2_pria
$i = 0; // pddk_s3_pria
$j = 0; // pddk_sd_wanita
$k = 0; // pddk_smp_wanita
$l = 0; // pddk_sma_wanita
$m = 0; // pddk_s1_wanita
$n = 0; // pddk_s2_wanita
$o = 0; // pddk_s3_wanita
?>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Rekapitulasi Data Peristiwa Nikah</h5>
        </div>
    </div>
</div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Data Peristiwa Nikah Per provinsi
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
<div class="clearfix" style="margin:5%;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Detail Data Peristiwa Nikah
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive" style="width:100%;">
            <table class="table table-bordered table-hover table-striped">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">no</th>
                        <th rowspan="2">provinsi</th>
                        <th rowspan="2">jumlah</th>
                        <th colspan="2">rata-rata usia</th>
                        <th colspan="6">pendidikan pria</th>
                        <th colspan="6">pendidikan wanita</th>
                        <th colspan="2">lokasi nikah</th>
                        <th colspan="2">peristiwa</th>
                    </tr>
                    <tr>
                        <th>pria</th>
                        <th>wanita</th>
                        <th>sd</th>
                        <th>smp</th>
                        <th>sma</th>
                        <th>s1</th>
                        <th>s2</th>
                        <th>s3</th>
                        <th>sd</th>
                        <th>smp</th>
                        <th>sma</th>
                        <th>s1</th>
                        <th>s2</th>
                        <th>s3</th>
                        <th>kua</th>
                        <th>non kua</th>
                        <th>terlaksana</th>
                        <th>tidak terlaksana</th>
                    </tr>
                </thead>
                <tbody class="text-center text-uppercase">
                    <?php
                    foreach ($a as $b) {
                        $c += $b->dt_nikah; // dt_nikah
                        $d += $b->pddk_sd_pria; // pddk_sd_pria
                        $e += $b->pddk_smp_pria; // pddk_smp_pria
                        $f += $b->pddk_sma_pria; // pddk_sma_pria
                        $g += $b->pddk_s1_pria; // pddk_s1_pria
                        $h += $b->pddk_s2_pria; // pddk_s2_pria
                        $i += $b->pddk_s3_pria; // pddk_s3_pria
                        $j += $b->pddk_sd_wanita; // pddk_sd_wanita
                        $k += $b->pddk_smp_wanita; // pddk_smp_wanita
                        $l += $b->pddk_sma_wanita; // pddk_sma_wanita
                        $m += $b->pddk_s1_wanita; // pddk_s1_wanita
                        $n += $b->pddk_s2_wanita; // pddk_s2_wanita
                        $o += $b->pddk_s3_wanita; // pddk_s3_wanita
                        ?>
                        <tr>
                            <td>
                                <?php
                                static $id = 1;
                                echo $id++;
                                ?>
                            </td>
                            <td><?= $b->province_title; ?></td>
                            <td><?= number_format($b->dt_nikah); ?></td>
                            <td><?= $b->rt_usia_pria; ?></td>
                            <td><?= $b->rt_usia_wanita; ?></td><!-- disini -->
                            <td>sd</td>
                            <td>smp</td>
                            <td>sma</td>
                            <td>s1</td>
                            <td>s2</td>
                            <td>s3</td>
                            <td>sd</td>
                            <td>smp</td>
                            <td>sma</td>
                            <td>s1</td>
                            <td>s2</td>
                            <td>s3</td>
                            <td>kua</td>
                            <td>non kua</td>
                            <td>terlaksana</td>
                            <td>tidak terlaksana</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
        am4core.ready(function () {
            am4core.useTheme(am4themes_frozen);
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.data = <?= $data; ?>;
            chart.exporting.menu = new am4core.ExportMenu();
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.title.fontWeight = 800;
            categoryAxis.title.text = 'Daerah Tingkat Provinsi';
            categoryAxis.dataFields.category = "province_title";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;
            valueAxis.title.text = "Jumlah Peristiwa Nikah";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "dt_nikah";
            series.dataFields.categoryX = "province_title";
            series.tooltipText = "Jumlah Peristiwa Nikah Provinsi {province_title}: [bold]{valueY}[/]";
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
            am4core.useTheme(am4themes_frozen);
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv_a", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0;
            chart.legend = new am4charts.Legend();
            chart.data = [
                {
                    country: "Total KUA",
                    litres: $('input[name=kua]').val()
                },
                {
                    country: "Total Peristiwa Nikah",
                    litres: $('input[name=nikah]').val()
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