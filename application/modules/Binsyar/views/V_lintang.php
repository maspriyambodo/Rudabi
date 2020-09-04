<style>
    .amcharts-amexport-menu-level-0.amcharts-amexport-top {
        top: -20px;
        bottom: auto;
    }
    #chartdiv{
        width:100%;
        height:650px;
    }
</style>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Data Lintang Kota tahun <?= date('Y'); ?></h5>
        </div>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <div class="text-uppercase">
                data Lintang Kota per provinsi
            </div>
        </div>
    </div>
    <div class="card-body">
        <div id="jumlah_lintang" class="text-center"></div>
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
                <tfoot class="text-center">
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
        var url = "https://simas.kemenag.go.id/rudabi/datapi/siihat/datalintang";
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
            dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
                        <'row'<'col-sm-12'tr>>
                        <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,

            buttons: [
                'print',
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                {
                    extend: 'pdfHtml5',
                    customize: function (doc) {
                        doc.styles.title = {
                            display: 'none'
                        };
                    },
                    exportOptions: {
                        columns: [0, 1]
                    }
                }
            ],
            "ajax": {
                dataSrc: '',
                method: "GET",
                async: false,
                url: url
            },
            columns: [
                {data: "province_title"},
                {data: "jum_lintang", className: "text-center jum_lintang"},
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a, b, c;
                        a = data.nama_propinsi;
                        b = data.province_title;
                        c = b.replace(' ', '_');
                        return '<a href="<?= base_url('Binsyar/Lintang/Provinsi/'); ?>' + a + "/" + c + '" class="btn btn-icon btn-default btn-xs" title="Detail Prov ' + b + '"><i class="fas fa-eye"></i></a>';
                    }
                }
            ],
            footerCallback: function () {
                var api = this.api();
                var numFormat = $.fn.dataTable.render.number('\.', '', 0, '').display;
                api.columns('.jum_lintang', {page: 'all'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html("Jumlah Data Lintang Kota " + "<span id='tot_lintang'>" + numFormat(sum) + "</span>");
                });
            }
        });
        var tot_lintang;
        tot_lintang = document.getElementById('tot_lintang').innerText;
        document.getElementById('jumlah_lintang').innerHTML = "Jumlah Data Lintang Kota: " + tot_lintang;
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.exporting.menu = new am4core.ExportMenu();
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
            valueAxis.title.text = "Jumlah Lintang Kota";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.dataFields.valueY = "jum_lintang";
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