<?php
$a = json_decode($data);
$c = 0;
$d = 0;
?>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Data Penyuluh Agama Islam tahun <?= date('Y'); ?></h5>
        </div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-uppercase">data penyuluh agama islam per provinsi</h3>
        </div>
    </div>
    <div class="card-body">
        <div id="chartdiv" class="chartdivs"></div>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-uppercase">data status nikah penyuluh agama islam pns</h3>
        </div>
    </div>
    <div class="card-body">
        <div id="chartdivs" class="chartdivs"></div>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-body">
        <div class="table-responsive">
            <table id="penyuluh" class="table table-bordered table-hover table-striped">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">no</th>
                        <th rowspan="2">
                            provinsi
                        </th>
                        <th colspan="2">
                            penyuluh
                        </th>
                    </tr>
                    <tr>
                        <td>
                            pns
                        </td>
                        <td>
                            non-pns
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($a as $b) {
                        $c += $b->jumlah_pns;
                        $d += $b->jumlah_non_pns;
                        ?>
                        <tr>
                            <td class="text-center">
                                <?php
                                static $id = 1;
                                echo $id++;
                                ?>
                            </td>
                            <td>
                                <?= $b->province_title; ?>
                            </td>
                            <td class="text-center">
                                <?php
                                echo '<a href="' . base_url('PAI/Simpenais/PNS?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $b->province_id . '&b=' . $b->province_title))) . '">' . $b->jumlah_pns . '</a>';
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                echo '<a href="' . base_url('PAI/Simpenais/Nonpns?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $b->penyuluh_nonpns_provinsi . '&b=' . $b->province_title))) . '">' . $b->jumlah_non_pns . '</a>';
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th colspan="2">Total</th>
                        <th><?= number_format($c); ?></th>
                        <th><?= number_format($d); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var b = am4core.create("chartdivs", am4charts.PieChart);
            b.hiddenState.properties.opacity = 0;
            b.data = <?= $statuskawin; ?>;
            b.radius = am4core.percent(70);
            b.innerRadius = am4core.percent(40);
            b.startAngle = 180;
            b.endAngle = 360;
            var a = b.series.push(new am4charts.PieSeries());
            a.dataFields.value = "jumlah";
            a.dataFields.category = "kategori";
            a.slices.template.cornerRadius = 10;
            a.slices.template.innerCornerRadius = 7;
            a.slices.template.draggable = true;
            a.slices.template.inert = true;
            a.alignLabels = false;
            a.hiddenState.properties.startAngle = 90;
            a.hiddenState.properties.endAngle = 90;
            b.legend = new am4charts.Legend();
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
            "scrollY": "400px"
        });
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.data = <?= $simpenaiss; ?>;
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
            valueAxis.renderer.minWidth = 100;
            valueAxis.title.text = "Jumlah";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.dataFields.valueY = "jumlah_non_pns";
            series.dataFields.categoryX = "province_title";
            series.clustered = false;
            series.tooltipText = "Jumlah Penyuluh Non PNS di {categoryX}: [bold]{valueY}[/]";
            var series2 = chart.series.push(new am4charts.ColumnSeries());
            series2.dataFields.valueY = "jumlah_pns";
            series2.dataFields.categoryX = "province_title";
            series2.clustered = false;
            series2.columns.template.width = am4core.percent(50);
            series2.tooltipText = "Jumlah Penyuluh PNS di {categoryX}: [bold]{valueY}[/]";
            var hoverState = series.columns.template.column.states.create("hover");
            hoverState.properties.cornerRadiusTopLeft = 0;
            hoverState.properties.cornerRadiusTopRight = 0;
            hoverState.properties.fillOpacity = 1;
            series.columns.template.adapter.add("fill", function (fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            });
            chart.cursor = new am4charts.XYCursor();
        });
    };
</script>