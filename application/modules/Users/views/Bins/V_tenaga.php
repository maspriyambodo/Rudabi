<?php
$a = json_decode($data);
$c = 0;
?>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Data Tenaga Ahli tahun <?= date('Y'); ?></h5>
        </div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <div class="text-uppercase">
                data Tenaga Ahli per provinsi
            </div>
        </div>
    </div>
    <div class="card-body">
        <div id="jumlah_hisab" class="text-center"></div>
        <div id="chartdiv" class="chartdivs"></div>
        <hr style="margin:5%;">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>no</th>
                        <th>provinsi</th>
                        <th>jumlah</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($a as $b) {
                        $c += $b->jum_ahli;
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
                                if (!isset($b->province_title)) {
                                    echo '<small class="text-danger">DATA TIDAK VALID</small>';
                                } else {
                                    echo $b->province_title;
                                }
                                ?>
                            </td>
                            <td class="text-center"><?= $b->jum_ahli; ?></td>
                            <td class="text-center">
                                <?php
                                if (!isset($b->province_title)) {
                                    echo '<button type="button" class="btn btn-icon btn-info btn-xs" title="Data tidak valid"><i class="fas fa-info-circle"></i></button>';
                                } else {
                                    echo '<a href="' . base_url('Users/Binsyar/Ahli/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $b->tenaga_provinsi . '&b=' . $b->province_title))) . '" class="btn btn-icon btn-default btn-xs" title="Detail Provinsi ' . $b->province_title . '"><i class="fas fa-eye"></i></a>';
                                }
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th colspan="3">Jumlah Tenaga Ahli <?= number_format($c); ?></th>
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
            "scrollY": "400px"
        });
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.data = <?= $data; ?>;
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
            valueAxis.title.text = "Jumlah Tenaga Ahli";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.dataFields.valueY = "jum_ahli";
            series.dataFields.categoryX = "province_title";
            series.clustered = false;
            series.tooltipText = "Jumlah Tenaga Ahli di {categoryX}: [bold]{valueY}[/]";
            var hoverState = series.columns.template.column.states.create("hover");
            hoverState.properties.cornerRadiusTopLeft = 0;
            hoverState.properties.cornerRadiusTopRight = 0;
            hoverState.properties.fillOpacity = 1;
            series.columns.template.adapter.add("fill", function (fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            });
            var valueLabel = series.bullets.push(new am4charts.LabelBullet());
            valueLabel.label.text = "{valueY}";
            valueLabel.label.fontSize = 10;
            valueLabel.label.verticalCenter = "top";
            chart.cursor = new am4charts.XYCursor();
            categoryAxis.sortBySeries = series;
        });
    };
</script>