<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"> Data KUA Tahun <?= date('Y'); ?> </h5>
        </div>
    </div>
</div>
<div class="card card-custom gutter-b">
    <div class="card-body">
        <div id="dt_kua" style="width:100%;height:650px;"></div>
    </div>
    <hr>
    <div class="clear" style="margin:20px 0px;"></div>
    <div class="container-fluid">
        <table class="table table-bordered table-hover" id="kt_datatable" style="margin-top: 13px !important">
            <thead class="text-center text-uppercase">
                <tr>
                    <th>provinsi</th>
                    <th>jumlah<br>kua</th>
                </tr>
            </thead>
            <tfoot class="text-center">
                <tr>
                    <th>Jumlah KUA tahun <?= date('Y'); ?></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
        <div class="clear" style="margin:20px 0px;"></div>
    </div>
</div>
<script>
    window.onload = function () {
        $('table').dataTable({
            responsive: true,
            "order": [[0, "asc"]],
            "paging": true,
            "ordering": true,
            "info": true,
            "processing": true,
            "deferRender": true,
            "ServerSide": true,
            "ajax": {
                method: "GET",
                async: false,
                url: "https://simas.kemenag.go.id/rudabi/datapi/kua",
                dataSrc: ''
            },
            columns: [
                {
                    data: null, "render": function (data) {
                        var provinsi = data.province_id;
                        return '<a href="<?= base_url('Simpenghulu/KUA/Provinsi/'); ?>' + provinsi + '">' + data.province_title + '</a>';
                    }
                },
                {data: "jumlah_kua", className: 'text-center sum'}
            ],
            "footerCallback": function () {
                var api = this.api();

                api.columns('.sum', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(sum);
                });
            }
        });
    };
</script>
<script>
    am4core.ready(function () {
        am4core.useTheme(am4themes_animated);
        var chart = am4core.create("dt_kua", am4charts.XYChart);
        chart.scrollbarX = new am4core.Scrollbar();
        chart.dataSource.url = "https://simas.kemenag.go.id/rudabi/datapi/kua/";

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
</script>