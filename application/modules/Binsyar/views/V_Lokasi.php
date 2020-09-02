<style>
    #chartdiv{
        width:100%;
        height:650px;
    }
</style>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Data Hisab Lokasi tahun <?= date('Y'); ?></h5>
        </div>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <div class="text-uppercase">
                data Hisab Lokasi per provinsi
            </div>
        </div>
    </div>
    <div class="card-body">
        <div id="jumlah_hisab" class="text-center"></div>
        <div id="chartdiv"></div>
        <hr style="margin:5%;">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>provinsi</th>
                        <th>jumlah</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th colspan="3"></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
        var url = "https://simas.kemenag.go.id/rudabi/datapi/siihat/hisablokasi";
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
                {data: "province_title"},
                {data: "jum_lokasi", className: "text-center jum_lokasi"},
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a, b, c;
                        a = data.lokasi_provinsi;
                        b = data.province_title;
                        c = b.replace(' ', '_');
                        return '<a href="<?= base_url('Binsyar/Lokasi/Provinsi/'); ?>' + a + "/" + c + '" class="btn btn-icon btn-default btn-xs" title="Detail Prov ' + b + '"><i class="fas fa-eye"></i></a>';
                    }
                }
            ],
            footerCallback: function () {
                var api = this.api();
                var numFormat = $.fn.dataTable.render.number('\.', '', 0, '').display;
                api.columns('.jum_lokasi', {page: 'all'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html("Jumlah Hisab Lokasi " + "<span id='tot_ahli'>" + numFormat(sum) + "</span>");
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
            categoryAxis.title.text = 'Hisab Lokasi';
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
            valueAxis.title.text = "Jumlah Hisab Lokasi";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.dataFields.valueY = "jum_lokasi";
            series.dataFields.categoryX = "province_title";
            series.clustered = false;
            series.tooltipText = "Jumlah {categoryX}: [bold]{valueY}[/]";
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
    };
</script>