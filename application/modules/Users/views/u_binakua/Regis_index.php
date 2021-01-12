<?php
$jum = 0;
$jml = 0;
$reg = json_decode($data);
$regiskua = json_decode($regkua);
$totregkua = 0;
?>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Rekapitulasi Registrasi Akun</h5>
        </div>
    </div>
</div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Data Registrasi Akun - Kantor Kemenag
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
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Data Registrasi Akun - Kantor Kemenag
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
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Detail Registrasi Akun - Kantor Kemenag
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
                        <th>no</th>
                        <th>kategori</th>
                        <th>jumlah</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reg as $value) { ?>
                        <tr>
                            <td class="text-center">
                                <?php
                                static $id = 1;
                                echo $id++;
                                ?>
                            </td>
                            <td><?= $value->kategori; ?></td>
                            <td class="text-center">
                                <?php
                                $jum += $value->jum;
                                echo $value->jum;
                                ?>
                            </td>
                            <td class="text-center">
                                <a href="<?= base_url('Users/BKKS/Registrasi/Status?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $value->status . '&b=' . $value->kategori))); ?>" class="btn btn-icon btn-success btn-xs" title="Detail <?= $value->kategori ?>"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th colspan="4">Total Registrasi Kantor Kemenag: <?= $jum; ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Data Registrasi Akun - KUA
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="text-center">
            <b><u id="title_kua"></u></b>
        </div>
        <div id="chartdiv_b" class="chartdivs"></div>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Data Registrasi Akun - KUA
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div id="chartdiv_c" class="chartdivs"></div>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Detail Registrasi Akun - KUA
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
                        <th>no</th>
                        <th>kategori</th>
                        <th>jumlah</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($regiskua as $dt_regkua) { ?>
                        <tr>
                            <td class="text-center">
                                <?php
                                static $id = 1;
                                echo $id++;
                                ?>
                            </td>
                            <td><?= $dt_regkua->keterangan; ?></td>
                            <td class="text-center">
                                <?php
                                $jml += $dt_regkua->jml;
                                echo $dt_regkua->jml;
                                ?>
                            </td>
                            <td class="text-center">
                                <a href="<?= base_url('Emonev/Registrasi/Statuskua?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $dt_regkua->status . '&b=' . $dt_regkua->keterangan))); ?>" class="btn btn-icon btn-success btn-xs" title="Detail <?= $dt_regkua->keterangan; ?>"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th colspan="4">total registrasi KUA: <?= number_format($jml); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<input type="hidden" name="jum" readonly="" value="<?= $jum; ?>"/>
<input type="hidden" name="jumkua" readonly="" value="<?= number_format($jml); ?>"/>
<script>
    window.onload = function () {
        var a, b;
        a = $('input[name=jum]').val();
        b = $('input[name=jumkua]').val();
        document.getElementById('title_chartdiv').innerText = "Total Data Registrasi Kankemenag: " + a;
        document.getElementById('title_kua').innerText = "Total Data Registrasi KUA: " + b;
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
                {extend: 'print', footer: true},
                {extend: 'copyHtml5', footer: true},
                {extend: 'excelHtml5', footer: true},
                {extend: 'csvHtml5', footer: true},
                {extend: 'pdfHtml5', footer: true}
            ]
        });
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.exporting.menu = new am4core.ExportMenu();
            chart.data = <?= $data; ?>;
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "kategori";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;
            categoryAxis.title.text = 'Kategori Registrasi Kankemenag';
            categoryAxis.title.fontWeight = 800;

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;
            valueAxis.title.text = "Jumlah Pengguna";
            valueAxis.title.fontWeight = 800;

            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "jum";
            series.dataFields.categoryX = "kategori";
            series.tooltipText = "Jumlah Pengguna: {kategori} [{categoryX}: bold]{valueY}[/]";
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

            chart.data = <?= $data; ?>;

            chart.innerRadius = 100;

            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "jum";
            series.dataFields.category = "kategori";

        });
        am4core.ready(function () {

            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv_c", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0;

            chart.legend = new am4charts.Legend();

            chart.data = <?= $regkua; ?>;

            chart.innerRadius = 100;

            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "jml";
            series.dataFields.category = "keterangan";

        });
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv_b", am4charts.XYChart);
            chart.exporting.menu = new am4core.ExportMenu();
            chart.data = <?= $regkua; ?>;
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "keterangan";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;
            categoryAxis.title.text = 'Kategori Registrasi KUA';
            categoryAxis.title.fontWeight = 800;

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;
            valueAxis.title.text = "Jumlah Pengguna";
            valueAxis.title.fontWeight = 800;

            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "jml";
            series.dataFields.categoryX = "keterangan";
            series.tooltipText = "Jumlah Pengguna: {keterangan} [{categoryX}: bold]{valueY}[/]";
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