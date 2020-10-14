<div class="card card-custom">
    <div class="card-body">
        <div id="chartdiv" class="chartdivs"></div>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">
                            provinsi
                        </th>
                        <th colspan="2">
                            penyuluh agama islam
                        </th>
                    </tr>
                    <tr>
                        <th>
                            jumlah
                        </th>
                        <th>
                            online
                        </th>
                    </tr>
                </thead>
                <tfoot>
                    <tr class="text-center">
                        <th class="text-center">JUMLAH</th>
                        <th class="text-center"></th>
                        <th class="text-center"></th>
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
            "scrollY": "400px",
            "ajax": {
                dataSrc: '',
                method: "GET",
                async: false,
                url: "https://simas.kemenag.go.id/rudabi/datapi/epay?KEY=BOBA"
            },
            columns: [
                {
                    data: null,
                    render: function (data) {
                        var a, b, c;
                        a = data.provinsi_kode;
                        b = data.provinsi_nama;
                        c = b.replace(' ', '_');
                        return '<a href="<?= base_url('PAI/Epai/Detail/'); ?>' + a + "/" + c + '">' + b + '</a>';
                    }
                },
                {data: "jumlah_penyuluh", className: "text-center sum_penyuluh"},
                {data: "jumlah_penyuluh_online", className: "text-center sum_on"}
            ],
            footerCallback: function () {
                var api = this.api();
                var numFormat = $.fn.dataTable.render.number('\.', '', 0, '').display;
                api.columns('.sum_penyuluh', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });
                api.columns('.sum_on', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });
            }
        });
    };
    am4core.ready(function () {

        am4core.useTheme(am4themes_animated);

        var chart = am4core.create("chartdiv", am4charts.XYChart);
        chart.exporting.menu = new am4core.ExportMenu();
        chart.dataSource.url = "https://simas.kemenag.go.id/rudabi/datapi/epay?KEY=BOBA";
        chart.yAxes.push(new am4charts.ValueAxis());
        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "provinsi_nama";
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.minGridDistance = 30;
        categoryAxis.renderer.labels.template.rotation = 270;

        var series = chart.series.push(new am4charts.ColumnSeries());
        series.dataFields.valueY = "jumlah_penyuluh";
        series.dataFields.categoryX = "provinsi_nama";
        series.clustered = false;
        series.tooltipText = "Total Penyuluh {categoryX} : [bold]{valueY}[/]";

        var series2 = chart.series.push(new am4charts.ColumnSeries());
        series2.dataFields.valueY = "jumlah_penyuluh_online";
        series2.dataFields.categoryX = "provinsi_nama";
        series2.clustered = false;
        series2.columns.template.width = am4core.percent(50);
        series2.tooltipText = "Penyuluh Online {categoryX} : [bold]{valueY}[/]";

        chart.cursor = new am4charts.XYCursor();
        chart.cursor.lineX.disabled = true;
        chart.cursor.lineY.disabled = true;

    });
</script>