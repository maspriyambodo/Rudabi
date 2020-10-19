<?php
$a = json_decode($data);
$c = 0;
?>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"> Data KUA Tahun <?= date('Y'); ?> </h5>
        </div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            Data KUA per Provinsi
        </div>
    </div>
    <div class="card-body">
        <div class="text-center">
            <b><u id="title_chartdiv"></u></b>
        </div>
        <div id="dt_kua" style="width:100%;height:650px;"></div>
    </div>
</div>
<div class="clear" style="margin:5%;"></div>
<div class="card card-custom gutter-b">
    <div class="card-header">
        <div class="card-title">
            Detail Data KUA
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="kt_datatable" style="margin-top: 13px !important">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>no</th>
                        <th>provinsi</th>
                        <th>jumlah<br>kua</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($a as $b) {
                        $c += $b->jumlah_kua;
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
                                <?= $b->jumlah_kua; ?>
                            </td>
                            <td class="text-center">
                                <a href="<?= base_url('Simpenghulu/KUA/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $b->province_id . '&b=' . $b->province_title))); ?>" class="btn btn-icon btn-default btn-xs" title="Detail Provinsi <?= $b->province_title; ?>"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th colspan="4">
                            total data kua: <?= number_format($c); ?>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<input type="hidden" name="tot" readonly="" value="<?= number_format($c); ?>"/>
<script>
    window.onload = function () {
        document.getElementById('title_chartdiv').innerText = "Total Data KUA: " + $('input[name="tot"]').val();
        $('table').dataTable({
            responsive: true,
            "order": [[0, "asc"]],
            "paging": true,
            "ordering": true,
            "info": true,
            "processing": true,
            "deferRender": true,
            "ServerSide": true
        });
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("dt_kua", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.data =<?= $data; ?>;

            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
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
            valueAxis.title.text = "Jumlah KUA";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "jumlah_kua";
            series.dataFields.categoryX = "province_title";
            series.tooltipText = "Total KUA \r\n Provinsi {province_title}: [{categoryX}: bold]{valueY}[/]";
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
    };
</script>