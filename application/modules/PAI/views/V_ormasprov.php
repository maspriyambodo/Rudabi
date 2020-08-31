<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-uppercase">data lembaga dakwah provinsi {provinsi}</h5>
        </div>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?= base_url('PAI/Ormas/index/'); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <div id="chartdiv" style="width:100%;height:650px;"></div>
        <div class="clear" style="margin:5% 0px;"></div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">kota/kabupaten</th>
                        <th rowspan="2">jumlah<br>ormas islam</th>
                        <th colspan="4">status milik</th>
                        <th rowspan="2">lt</th>
                        <th rowspan="2">lb</th>
                    </tr>
                    <tr>
                        <th>sekolah</th>
                        <th>wakaf</th>
                        <th>yayasan</th>
                        <th>pemerintah</th>
                    </tr>
                </thead>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>total</th>
                        <th></th><th></th><th></th><th></th><th></th><th></th><th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
        var url = "https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/ormas?province_id=<?= $id; ?>";
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.dataSource.url = url;

            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.title.text = 'Daerah Tingkat Kota/Kabupaten';
            categoryAxis.title.fontWeight = 800;
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
            valueAxis.title.text = "Jumlah Ormas Islam";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "jum_ormas";
            series.dataFields.categoryX = "city_title";
            series.tooltipText = "Total Ormas Islam \r\n{city_title}: [{categoryX}: bold]{valueY}[/]";
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
            categoryAxis.sortBySeries = series;
        });
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
                url: url
            },
            columns: [
                {
                    data: null,
                    render: function (data) {
                        var a, b, c;
                        a = data.city_id;
                        b = data.city_title;
                        c = b.replace(' ', '_');
                        return '<a href="<?= base_url('PAI/Ormas/Kabupaten/'); ?>' + a + "/" + c + '">' + b + '</a>';
                    }
                },
                {data: "jum_ormas", className: "text-center sum_orm"},
                {data: "milik_sekolah", className: "text-center sum_sek"},
                {data: "milik_wakaf", className: "text-center sum_wak"},
                {data: "milik_yayasan", className: "text-center sum_yay"},
                {data: "milik_pemerintah", className: "text-center sum_pem"},
                {data: "luas_tanah", className: "text-center sum_lt"},
                {data: "luas_bangunan", className: "text-center sum_lb"}
            ],
            footerCallback: function () {
                var api = this.api();
                var numFormat = $.fn.dataTable.render.number('\.', '', 0, '').display;
                api.columns('.sum_orm', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });
                api.columns('.sum_sek', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });
                api.columns('.sum_wak', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });
                api.columns('.sum_yay', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });
                api.columns('.sum_pem', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });
                api.columns('.sum_lt', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });
                api.columns('.sum_lb', {page: 'current'}).every(function () {
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
</script>