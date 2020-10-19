<?php
$a = json_decode($data);
$c = 0;
$d = 0;
$e = 0;
$f = 0;
$g = 0;
$h = 0;
$i = 0;
$j = 0;
$k = 0;
$l = 0;
$m = 0;
$n = 0;
$o = 0;
$p = 0;
$q = 0;
$r = 0;
$s = 0;
?>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"> Data KUA Provinsi </h5>
        </div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?= base_url('Simpenghulu/KUA/index'); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
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
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="t_kuaprov" class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">kabupaten</th>
                        <th rowspan="2">jumlah<br>kua</th>
                        <th rowspan="2">jumlah<br>penghulu</th>
                        <th colspan="3">golongan</th>
                        <th colspan="9">tingkat</th>
                        <th colspan="4">pendidikan<br>terakhir</th>
                    </tr>
                    <tr>
                        <th>pratama</th>
                        <th>muda</th>
                        <th>madya</th>
                        <th>iii/a</th>
                        <th>iii/b</th>
                        <th>iii/c</th>
                        <th>iii/d</th>
                        <th>iv/a</th>
                        <th>iv/b</th>
                        <th>iv/c</th>
                        <th>iv/d</th>
                        <th>iv/e</th>
                        <th>s1</th>
                        <th>s2</th>
                        <th>s3</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($a as $b) {
                        $c += $b->jumlah_kua;
                        $d += $b->jumlah_penghulu;
                        $e += $b->jumlah_pratama;
                        $f += $b->jumlah_muda;
                        $g += $b->jumlah_madya;
                        $h += $b->jumlah_IIIa;
                        $i += $b->jumlah_IIIb;
                        $j += $b->jumlah_IIIc;
                        $k += $b->jumlah_IIId;
                        $l += $b->jumlah_IVa;
                        $m += $b->jumlah_IVb;
                        $n += $b->jumlah_IVc;
                        $o += $b->jumlah_IVd;
                        $p += $b->jumlah_IVe;
                        $q += $b->jumlah_S1;
                        $r += $b->jumlah_S2;
                        $s += $b->jumlah_S3;
                        ?>
                        <tr class="text-center">
                            <td class="text-right"><?= $b->city_title; ?></td>
                            <td><?= $b->jumlah_kua; ?></td>
                            <td><?= $b->jumlah_penghulu; ?></td>
                            <td><?= $b->jumlah_pratama; ?></td>
                            <td><?= $b->jumlah_muda; ?></td>
                            <td><?= $b->jumlah_madya; ?></td>
                            <td><?= $b->jumlah_IIIa; ?></td>
                            <td><?= $b->jumlah_IIIb; ?></td>
                            <td><?= $b->jumlah_IIIc; ?></td>
                            <td><?= $b->jumlah_IIId; ?></td>
                            <td><?= $b->jumlah_IVa; ?></td>
                            <td><?= $b->jumlah_IVb; ?></td>
                            <td><?= $b->jumlah_IVc; ?></td>
                            <td><?= $b->jumlah_IVd; ?></td>
                            <td><?= $b->jumlah_IVe; ?></td>
                            <td><?= $b->jumlah_S1; ?></td>
                            <td><?= $b->jumlah_S2; ?></td>
                            <td><?= $b->jumlah_S3; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>jumlah</th>
                        <th><?= $c; ?></th>
                        <th><?= $d; ?></th>
                        <th><?= $e; ?></th>
                        <th><?= $f; ?></th>
                        <th><?= $g; ?></th>
                        <th><?= $h; ?></th>
                        <th><?= $i; ?></th>
                        <th><?= $j; ?></th>
                        <th><?= $k; ?></th>
                        <th><?= $l; ?></th>
                        <th><?= $m; ?></th>
                        <th><?= $n; ?></th>
                        <th><?= $o; ?></th>
                        <th><?= $p; ?></th>
                        <th><?= $q; ?></th>
                        <th><?= $r; ?></th>
                        <th><?= $s; ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<input type="hidden" name="jumlah_kua" value="<?= number_format($c); ?>" readonly=""/>
<script>
    window.onload = function () {
        document.getElementById('title_chartdiv').innerText = "Total Data KUA: " + $('input[name="jumlah_kua"]').val();
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
            "fixedColumns": {
                leftColumns: 3
            }
        });
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.data = <?= $data; ?>;
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.title.text = 'Daerah Tingkat Kota';
            categoryAxis.dataFields.category = "city_title";
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
            series.dataFields.valueY = "jumlah_kua";
            series.dataFields.categoryX = "city_title";
            series.clustered = false;
            series.tooltipText = "Jumlah KUA di {categoryX}: [bold]{valueY}[/]";
            var series2 = chart.series.push(new am4charts.ColumnSeries());
            series2.dataFields.valueY = "jumlah_penghulu";
            series2.dataFields.categoryX = "city_title";
            series2.clustered = false;
            series2.columns.template.width = am4core.percent(50);
            series2.tooltipText = "Jumlah Penghulu di {categoryX}: [bold]{valueY}[/]";
            var hoverState = series.columns.template.column.states.create("hover");
            hoverState.properties.cornerRadiusTopLeft = 0;
            hoverState.properties.cornerRadiusTopRight = 0;
            hoverState.properties.fillOpacity = 1;
            series.columns.template.adapter.add("fill", function (fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            });
            chart.cursor = new am4charts.XYCursor();
        });
    };</script>