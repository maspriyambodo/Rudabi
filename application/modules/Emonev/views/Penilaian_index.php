<?php
$tahun = json_decode($data);
$tot = 0;
foreach ($tahun as $value) {
    $tot += $value->jumlah;
}
?>
<input type="hidden" name="tot" value="<?= $tot; ?>"/>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Rekapitulasi Penilaian KUA</h5>
        </div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            Penilaian Data KUA per Tahun
        </div>
    </div>
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
            Detail Data Penilaian KUA
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>no</th>
                        <th>tahun penilaian</th>
                        <th>jumlah</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php foreach ($tahun as $dt_tahun) { ?>
                        <tr>
                            <td>
                                <?php
                                static $id = 1;
                                echo $id++;
                                ?>
                            </td>
                            <td>Tahun <?= $dt_tahun->tahun; ?></td>
                            <td><?= number_format($dt_tahun->jumlah); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th colspan="3" style="border-bottom:1px solid #ecf0f3;">total data penilaian kua: <?= number_format($tot); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js" integrity="sha512-USPCA7jmJHlCNRSFwUFq3lAm9SaOjwG8TaB8riqx3i/dAJqhaYilVnaf2eVUH5zjq89BU6YguUuAno+jpRvUqA==" crossorigin="anonymous"></script>
<script>
    window.onload = function () {
        var a;
        a = parseFloat($('input[name=tot]').val());
        document.getElementById('title_chartdiv').innerText = "Total data penilaian KUA " + numeral(a).format('0,0');
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
            chart.paddingRight = 20;
            chart.data = <?= $data; ?>;
            chart.exporting.menu = new am4core.ExportMenu();
            var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
            dateAxis.renderer.grid.template.location = 0;
            dateAxis.renderer.axisFills.template.disabled = true;
            dateAxis.renderer.ticks.template.disabled = true;

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.tooltip.disabled = true;
            valueAxis.renderer.minWidth = 35;
            valueAxis.renderer.axisFills.template.disabled = true;
            valueAxis.renderer.ticks.template.disabled = true;

            var series = chart.series.push(new am4charts.LineSeries());
            series.dataFields.dateX = "tahun";
            series.dataFields.valueY = "jumlah";
            series.strokeWidth = 2;
            series.tooltipText = "Penilaian Tahun: {tahun}, Jumlah: [bold]{valueY}[/] data";
            series.propertyFields.stroke = "color";
            chart.cursor = new am4charts.XYCursor();

            var scrollbarX = new am4core.Scrollbar();
            chart.scrollbarX = scrollbarX;
            dateAxis.keepSelection = true;
        });
    };
</script>