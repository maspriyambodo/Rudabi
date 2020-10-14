<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-uppercase">data Majelis Taklim per provinsi</h3>
        </div>
    </div>
    <div class="card-body">
        <div id="chartdiv" class="chartdivs"></div>
        <div class="clear" style="margin:5% 0px;"></div>
        <div class="table-responsive">
            <table id="t_majelis" class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-uppercase text-center">
                    <tr>
                        <th rowspan="2">
                            provinsi
                        </th>
                        <th colspan="2">
                            jumlah
                        </th>
                        <th colspan="2">
                            pengurus
                        </th>
                    </tr>
                    <tr>
                        <th>
                            majelis
                        </th>
                        <th>
                            pengurus
                        </th>
                        <th>
                            laki-laki
                        </th>
                        <th>
                            perempuan
                        </th>
                    </tr>
                </thead>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>
                            jumlah
                        </th>
                        <th id="sum_maj">
                            
                        </th>
                        <th>
                            
                        </th>
                        <th>
                            
                        </th>
                        <th>
                            
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
    var url = "https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/majelistaklim?KEY=BOBA";
    window.onload = function () {
        $('#t_majelis').dataTable({
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
                        a = data.province_id;
                        b = data.province_title;
                        c = b.replace(' ', '_');
                        return '<a href="<?= base_url('PAI/Majelis/Provinsi/'); ?>' + a + "/" + c + '">' + b + '</a>';
                    }
                },
                {data: "jumlah_majelis", className: "text-center sum_maj"},
                {data: "jumlah_pengurus", className: "text-center sum_peng"},
                {data: "pengurus_laki", className: "text-center sum_laki"},
                {data: "pengurus_perempuan", className: "text-center sum_per"}
            ],
            footerCallback: function () {
                var api = this.api();
                var numFormat = $.fn.dataTable.render.number( '\.', '', 0, '' ).display;
                api.columns('.sum_maj', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });
                api.columns('.sum_peng', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });
                api.columns('.sum_laki', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });
                api.columns('.sum_per', {page: 'current'}).every(function () {
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
        chart.scrollbarX = new am4core.Scrollbar();
        chart.dataSource.url = url;
        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.title.fontWeight = 800;
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
        valueAxis.title.text = "Jumlah Majelis Taklim";
        valueAxis.title.fontWeight = 800;

        var series = chart.series.push(new am4charts.ColumnSeries());
        series.dataFields.valueY = "jumlah_majelis";
        series.dataFields.categoryX = "province_title";
        series.clustered = false;
        series.tooltipText = "Jumlah Majelis Taklim di {categoryX}: [bold]{valueY}[/]";
        var series2 = chart.series.push(new am4charts.ColumnSeries());
        series2.dataFields.valueY = "jumlah_pengurus";
        series2.dataFields.categoryX = "province_title";
        series2.clustered = false;
        series2.columns.template.width = am4core.percent(50);
        series2.tooltipText = "Jumlah Pengurus di {categoryX}: [bold]{valueY}[/]";
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