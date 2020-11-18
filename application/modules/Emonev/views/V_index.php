<?php
$kua = json_decode($data);
$kanmenag = json_decode($kankemenag);
$totkanmenag = 0;
$totjumlah_kua = 0;
?>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            Data KUA per Provinsi
        </div>
    </div>
    <div class="card-body">
        <div class="text-center">
            <b id="title_chartdiv"></b>
        </div>
        <div id="chartdiv" class="chartdivs"></div>
    </div>
</div>
<div class="clear" style="margin:5% 0px"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            Detail Data KUA
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>Kode</th>
                        <th>Provinsi</th>
                        <th>Kankemenag</th>
                        <th>Jumlah KUA</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($kua as $key => $kua) { ?>
                        <tr>
                            <td class="text-center"><?= $kua->kodekua; ?></td>
                            <td><?= $kua->propinsi; ?></td>
                            <td class="text-center">
                                <?php
                                $totkanmenag += $kanmenag[$key]->jumlah_kabupaten;
                                echo '<a href="' . base_url('Emonev/Kankemenag?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $kanmenag[$key]->kodekab . '&b=' . $kua->propinsi))) . '">' . $kanmenag[$key]->jumlah_kabupaten . '</a>';
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $totjumlah_kua += $kua->jumlah_kua;
                                echo '<a href="' . base_url('Emonev/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $kua->kodekua . '&b=' . $kua->propinsi))) . '">' . $kua->jumlah_kua . '</a>'
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th colspan="2">total</th>
                        <th><?= number_format($totkanmenag); ?></th>
                        <th><?= number_format($totjumlah_kua); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<input type="hidden" name="totjumlah_kua" value="<?= $totjumlah_kua; ?>"/>
<input type="hidden" name="totkanmenag" value="<?= $totkanmenag; ?>"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js" integrity="sha512-USPCA7jmJHlCNRSFwUFq3lAm9SaOjwG8TaB8riqx3i/dAJqhaYilVnaf2eVUH5zjq89BU6YguUuAno+jpRvUqA==" crossorigin="anonymous"></script>
<script>
    window.onload = function () {
        var a, b;
        a = $('input[name=totjumlah_kua]').val();
        b = numeral(a).format('0,0');
        document.getElementById('title_chartdiv').innerText = "Total KUA " + b;
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
    };
    am4core.ready(function () {
        am4core.useTheme(am4themes_animated);
        var chart = am4core.create("chartdiv", am4charts.XYChart);
        chart.exporting.menu = new am4core.ExportMenu();
        chart.data = <?= $data; ?>;
        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "propinsi";
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.minGridDistance = 30;
        categoryAxis.renderer.labels.template.horizontalCenter = "right";
        categoryAxis.renderer.labels.template.verticalCenter = "middle";
        categoryAxis.renderer.labels.template.rotation = 270;
        categoryAxis.tooltip.disabled = true;
        categoryAxis.renderer.minHeight = 110;
        categoryAxis.title.text = 'Daerah Tingkat Provinsi';
        categoryAxis.title.fontWeight = 800;

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.renderer.minWidth = 50;
        valueAxis.title.text = "Jumlah K U A";
        valueAxis.title.fontWeight = 800;

        var series = chart.series.push(new am4charts.ColumnSeries());
        series.sequencedInterpolation = true;
        series.dataFields.valueY = "jumlah_kua";
        series.dataFields.categoryX = "propinsi";
        series.tooltipText = "Jumlah KUA Provinsi: {propinsi} [{categoryX}: bold]{valueY}[/]";
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
        var valueLabel = series.bullets.push(new am4charts.LabelBullet());
        valueLabel.label.text = "{valueY}";
        valueLabel.label.fontSize = 10;
        valueLabel.label.verticalCenter = "top";
    });
</script>