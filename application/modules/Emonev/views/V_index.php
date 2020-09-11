<div class="card card-custom">
    <div class="card-body">
        <div id="chartdiv" class="chartdivs"></div>
    </div>
</div>
<div class="clear" style="margin:5% 0px"></div>
<div class="card card-custom">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>Provinsi</th>
                        <th>Jumlah KUA</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>
                            Jumlah
                        </th>
                        <th></th>
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
                url: "https://simas.kemenag.go.id/rudabi/datapi/monev"
            },
            columns: [
                {
                    data: null, render: function (data) {
                        var a, b, c;
                        a = data.kodekua;
                        b = data.propinsi;
                        c = b.replace(' ', '_');
                        return '<a href="<?= base_url('Emonev/Detail/'); ?>' + a + '/' + c + '">' + b + '</a>';
                    }
                },
                {data: "jumlah_kua", className: "text-center sum_sum"}
            ],
            footerCallback: function () {
                var api = this.api();
                var numFormat = $.fn.dataTable.render.number( '\.', '', 0, '' ).display;
                api.columns('.sum_sum', {page: 'current'}).every(function () {
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

        chart.dataSource.url = "https://simas.kemenag.go.id/rudabi/datapi/monev";

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
    });
</script>