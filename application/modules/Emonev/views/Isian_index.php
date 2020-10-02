<?php
$a = json_decode($urung_input);
$b = $a[1]->jumlah;
$c = json_decode($rekap);
$d = 0;
?>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Rekapitulasi Isian KUA</h5>
        </div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-body">
        <div class="text-center">
            <b><u id="title_chartdiv"></u></b>
        </div>
        <div id="chartdiv" style="width:100%;height:500px;"></div>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            Detail Rekap Data Isian
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>no</th>
                        <th>tahun/status</th>
                        <th>jumlah</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td></td>
                        <td>Belum Input Data</td>
                        <td><?= number_format($b); ?></td>
                    </tr>
                    <?php foreach ($c as $value) { ?>
                        <tr>
                            <td>
                                <?php
                                static $id = 1;
                                echo $id++;
                                ?>
                            </td>
                            <td>
                                Tahun <?= $value->tahun; ?>
                            </td>
                            <td>
                                <?php
                                $d += $value->jumlah;
                                echo number_format($value->jumlah);
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th colspan="3">Total Data KUA: <?= number_format($d + $b); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<input type="hidden" name="title_chartdiv" value="<?= number_format($d + $b); ?>"/>
<script>
    window.onload = function () {
        document.getElementById('title_chartdiv').innerText = "Total Rekap Isian Data KUA: " + $('input[name=title_chartdiv]').val();
        $('table').dataTable({
            "ServerSide": true,
            "searching": false,
            "order": [[0, "asc"]],
            "paging": true,
            "ordering": true,
            "info": true,
            "processing": true,
            "deferRender": true,
            "scrollCollapse": true,
            "scrollX": true,
            "scrollY": "400px",
            dom: `<'row'<'col-sm-6 text-left'l><'col-sm-6 text-right'B>>
<'row'<'col-sm-12'tr>>
<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'p>>`,
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
            chart.data = <?= $rekap; ?>;
            var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
            dateAxis.renderer.grid.template.location = 0;
            dateAxis.renderer.minGridDistance = 50;

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.logarithmic = true;
            valueAxis.renderer.minGridDistance = 20;
            var series = chart.series.push(new am4charts.LineSeries());
            series.dataFields.valueY = "jumlah";
            series.dataFields.dateX = "tahun";
            series.tensionX = 0.8;
            series.strokeWidth = 3;

            var bullet = series.bullets.push(new am4charts.CircleBullet());
            bullet.circle.fill = am4core.color("#fff");
            bullet.circle.strokeWidth = 3;
            chart.cursor = new am4charts.XYCursor();
            chart.cursor.fullWidthLineX = true;
            chart.cursor.xAxis = dateAxis;
            chart.cursor.lineX.strokeWidth = 0;
            chart.cursor.lineX.fill = am4core.color("#000");
            chart.cursor.lineX.fillOpacity = 0.1;
            chart.scrollbarX = new am4core.Scrollbar();
            let range = valueAxis.axisRanges.create();
            range.value = <?= $b; ?>;
            range.grid.stroke = am4core.color("#396478");
            range.grid.strokeWidth = 1;
            range.grid.strokeOpacity = 1;
            range.grid.strokeDasharray = "3,3";
            range.label.inside = true;
            range.label.text = "Belum Input: [bold]<?= $b; ?> data[/]";
            range.label.fill = range.grid.stroke;
            range.label.verticalCenter = "bottom";
        });
    };
</script>