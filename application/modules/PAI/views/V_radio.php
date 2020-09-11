<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Data Radio Islam tahun <?= date('Y'); ?></h5>
        </div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <div class="text-uppercase">
                data Radio Islam per provinsi
            </div>
        </div>
    </div>
    <div class="card-body">
        <div id="jumlah_radio" class="text-center"></div>
        <div id="chartdiv" class="chartdivs"></div>
        <hr style="margin:5% 0px;">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead class="text-uppercase text-center">
                    <tr>
                        <th rowspan="2">provinsi</th>
                        <th rowspan="2">jumlah</th>
                        <th colspan="2">topologi</th>
                        <th colspan="4">geografi</th>
                    </tr>
                    <tr>
                        <th>daratan</th>
                        <th>lautan</th>
                        <th>kota</th>
                        <th>desa</th>
                        <th>pelosok</th>
                        <th>terisolir</th>
                    </tr>
                </thead>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>jumlah</th>
                        <th></th><th></th><th></th><th></th><th></th><th></th><th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
        var url = "https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/radio";
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
                        a = data.province_id;
                        b = data.province_title;
                        c = b.replace(' ', '_');
                        return '<a href="<?= base_url('PAI/Radio_Islam/Provinsi/'); ?>' + a + "/" + c + '">' + b + '</a>';
                    }
                },
                {data: "jum_radio", className: "text-center sum_ra"},
                {data: "topo_daratan", className: "text-center sum_dar"},
                {data: "topo_lautan", className: "text-center sum_laut"},
                {data: "geo_kota", className: "text-center sum_kot"},
                {data: "geo_desa", className: "text-center sum_desa"},
                {data: "geo_pelosok", className: "text-center sum_pel"},
                {data: "geo_pelosok_terisolir", className: "text-center sum_ter"}
            ],
            footerCallback: function () {
                var api = this.api();
                var numFormat = $.fn.dataTable.render.number('\.', '', 0, '').display;
                api.columns(['.sum_ra', '.sum_dar', '.sum_laut', '.sum_kot', '.sum_desa', '.sum_pel', '.sum_ter'], {page: 'all'}).every(function () {
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
            valueAxis.title.text = "Jumlah Radio Islam";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.dataFields.valueY = "jum_radio";
            series.dataFields.categoryX = "province_title";
            series.clustered = false;
            series.tooltipText = "Jumlah Radio Islam di {categoryX}: [bold]{valueY}[/]";
            var hoverState = series.columns.template.column.states.create("hover");
            hoverState.properties.cornerRadiusTopLeft = 0;
            hoverState.properties.cornerRadiusTopRight = 0;
            hoverState.properties.fillOpacity = 1;
            series.columns.template.adapter.add("fill", function (fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            });
            chart.cursor = new am4charts.XYCursor();
        });
        var jumlah_radio = document.getElementsByClassName('sum_ra')[2].innerText;
        $('input[name=jumtxt]').val(jumlah_radio);
        document.getElementById('jumlah_radio').innerHTML = "<b>Jumlah Radio Islam " + jumlah_radio + "</b>";
    };
</script>
<input type="hidden" name="jumtxt"/>