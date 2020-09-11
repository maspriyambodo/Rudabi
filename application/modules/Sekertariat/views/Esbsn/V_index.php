<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Data Satker Tahun <?= date("Y"); ?></h5>
        </div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <div class="text-uppercase">
                Jumlah satker per provinsi
            </div>
        </div>
    </div>
    <div class="card-body">
        <div id="chartdiv" class="chartdivs"></div>
        <hr style="margin:5% 0px;">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width: 100%;">
                <thead class="text-uppercase text-center">
                    <tr>
                        <th rowspan="2">provinsi</th>
                        <th rowspan="2">jumlah satker</th>
                        <th colspan="2">nama satker</th>
                        <th colspan="2">kode satker</th>
                    </tr>
                    <tr>
                        <th>valid</th>
                        <th>invalid</th>
                        <th>valid</th>
                        <th>invalid</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $mpsdvm = json_decode($data);
                    foreach ($mpsdvm as $value) {
                        ?>
                        <tr>
                            <td>
                                <?php $url = str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt($value->kab_propinsi_id . '/' . $value->propinsi_nama)); ?>
                                <a href="<?= base_url('Sekertariat/Esbsn/Provinsi/' . $url . ''); ?>"><?= $value->propinsi_nama ?></a>
                            </td>
                            <td class="text-center">
                                <?= $value->jum_kab ?>
                            </td>
                            <td class="text-center"><?= $value->ada_nama_satker ?></td>
                            <td class="text-center"><?= $value->non_nama_satker ?></td>
                            <td class="text-center"><?= $value->ada_kd_satker ?></td>
                            <td class="text-center"><?= $value->non_kd_satker ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
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
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.data = <?= $data; ?>;
            chart.exporting.menu = new am4core.ExportMenu();
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.title.fontWeight = 800;
            categoryAxis.title.text = 'Daerah Tingkat Provinsi';
            categoryAxis.dataFields.category = "propinsi_nama";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 100;
            valueAxis.title.text = "Jumlah Satker";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.dataFields.valueY = "jum_kab";
            series.dataFields.categoryX = "propinsi_nama";
            series.clustered = false;
            series.tooltipText = "Jumlah Satker di {categoryX}: [bold]{valueY}[/]";
            var hoverState = series.columns.template.column.states.create("hover");
            hoverState.properties.cornerRadiusTopLeft = 0;
            hoverState.properties.cornerRadiusTopRight = 0;
            hoverState.properties.fillOpacity = 1;
            series.columns.template.adapter.add("fill", function (fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            });
            chart.cursor = new am4charts.XYCursor();
            categoryAxis.sortBySeries = series;
        });
    };
</script>