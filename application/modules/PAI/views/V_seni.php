<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-uppercase">Lembaga seni islam tahun <?= date('Y'); ?></h5>
        </div>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <b class="text-uppercase">data lembaga seni per provinsi</b>
        </div>
    </div>
    <div class="card-body">
        <div id="chartdiv" style="width:100%;height:700px;"></div>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width: 100%;">
                <thead class="text-uppercase text-center">
                    <tr>
                        <th rowspan="2">
                            provinsi
                        </th>
                        <th rowspan="2">
                            jumlah lsi
                        </th>
                        <th colspan="2">
                            tipografi
                        </th>
                        <th colspan="4">
                            geografis
                        </th>
                    </tr>
                    <tr>
                        <th>
                            darat
                        </th>
                        <th>
                            laut
                        </th>
                        <th>
                            kota
                        </th>
                        <th>
                            desa
                        </th>
                        <th>
                            pelosok
                        </th>
                        <th>
                            terisolasi
                        </th>
                    </tr>
                </thead>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>jumlah</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
    var url = "https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/lembagaseni";
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
                    a = data.lembaga_seni_provinsi;
                    b = data.province_title;
                    c = b.replace(' ', '_');
                    return '<a href="<?= base_url('PAI/Seni_Islam/Provinsi/'); ?>' + a + "/" + c + '">' + b + '</a>';
                }
            },
            {data: "jum_ls", className: "text-center sum_ls"},
            {data: "topo_kat_darat", className: "text-center sum_topdar"},
            {data: "topo_kat_laut", className: "text-center sum_toplaut"},
            {data: "geo_kat_kota", className: "text-center sum_geokot"},
            {data: "geo_kat_desa", className: "text-center sum_geodes"},
            {data: "geo_kat_pelosok", className: "text-center sum_geopel"},
            {data: "geo_kat_pelosok_teri", className: "text-center sum_geoter"}
        ],
        footerCallback: function () {
            var api = this.api();
            var numFormat = $.fn.dataTable.render.number( '\.', '', 0, '' ).display;
            api.columns('.sum_ls', {page: 'current'}).every(function () {
                var sum = this
                        .data()
                        .reduce(function (a, b) {
                            var x = parseFloat(a) || 0;
                            var y = parseFloat(b) || 0;
                            return x + y;
                        }, 0);
                        
                $(this.footer()).html(numFormat(sum));
            });
            api.columns('.sum_topdar', {page: 'current'}).every(function () {
                var sum = this
                        .data()
                        .reduce(function (a, b) {
                            var x = parseFloat(a) || 0;
                            var y = parseFloat(b) || 0;
                            return x + y;
                        }, 0);
                $(this.footer()).html(numFormat(sum));
            });
            api.columns('.sum_toplaut', {page: 'current'}).every(function () {
                var sum = this
                        .data()
                        .reduce(function (a, b) {
                            var x = parseFloat(a) || 0;
                            var y = parseFloat(b) || 0;
                            return x + y;
                        }, 0);
                $(this.footer()).html(numFormat(sum));
            });
            api.columns('.sum_geokot', {page: 'current'}).every(function () {
                var sum = this
                        .data()
                        .reduce(function (a, b) {
                            var x = parseFloat(a) || 0;
                            var y = parseFloat(b) || 0;
                            return x + y;
                        }, 0);
                $(this.footer()).html(numFormat(sum));
            });
            api.columns('.sum_geodes', {page: 'current'}).every(function () {
                var sum = this
                        .data()
                        .reduce(function (a, b) {
                            var x = parseFloat(a) || 0;
                            var y = parseFloat(b) || 0;
                            return x + y;
                        }, 0);
                $(this.footer()).html(numFormat(sum));
            });
            api.columns('.sum_geopel', {page: 'current'}).every(function () {
                var sum = this
                        .data()
                        .reduce(function (a, b) {
                            var x = parseFloat(a) || 0;
                            var y = parseFloat(b) || 0;
                            return x + y;
                        }, 0);
                $(this.footer()).html(numFormat(sum));
            });
            api.columns('.sum_geoter', {page: 'current'}).every(function () {
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
        valueAxis.title.text = "Jumlah Lembaga Seni Islam";
        valueAxis.title.fontWeight = 800;
        var series = chart.series.push(new am4charts.ColumnSeries());
        series.dataFields.valueY = "jum_ls";
        series.dataFields.categoryX = "province_title";
        series.clustered = false;
        series.tooltipText = "Jumlah Lembaga Seni Islam di {categoryX}: [bold]{valueY}[/]";

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
</script>