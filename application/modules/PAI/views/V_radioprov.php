<style type="text/css">
    #chartdiv,#chartdiv_b{
        width:100%;
        height:650px;
    }
</style>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Data Radio Islam provinsi {provinsi}</h5>
        </div>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?= base_url('PAI/Radio_Islam/index/'); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <div id="jumlah_radio" class="text-center"></div>
        <div id="chartdiv"></div>
        <hr style="margin:5% 0px;">
        <div class="text-center">
            <b>Data Luas Tanah & Luas Bangunan</b>
        </div>
        <div id="chartdiv_b"></div>
        <hr style="margin:5% 0px;">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">kota/kabupaten</th>
                        <th rowspan="2">jumlah</th>
                        <th colspan="4">status milik</th>
                        <th rowspan="2">lt</th>
                        <th rowspan="2">lb</th>
                        <th colspan="2">pengurus</th>
                    </tr>
                    <tr>
                        <th>sekolah</th>
                        <th>wakaf</th>
                        <th>yayasan</th>
                        <th>pemerintah</th>
                        <th>laki-laki</th>
                        <th>perempuan</th>
                    </tr>
                </thead>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>jumlah</th>
                        <th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
        var url = "https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/radio?province_id=<?= $id; ?>";
        $('table').dataTable({
            "ServerSide": true,
            "order": [[0, "asc"]],
            "paging": true,
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
                        return '<a href="<?= base_url('PAI/Radio_Islam/Kabupaten/'); ?>' + a + "/" + c + '">' + b + '</a>';
                    }
                },
                {data: "jum_radio", className: "text-center sum_rad"},
                {data: "milik_sekolah", className: "text-center sum_sek"},
                {data: "milik_wakaf", className: "text-center sum_wak"},
                {data: "milik_yayasan", className: "text-center sum_yay"},
                {data: "milik_pemerintah", className: "text-center sum_pem"},
                {
                    data: null, className: "text-center sum_tan",
                    render: function (data) {
                        var lt = data.luas_tanah;
                        return lt.replace('-', '');
                    }
                },
                {
                    data: null, className: "text-center sum_bang",
                    render: function (data) {
                        var lb = data.luas_bangunan;
                        return lb.replace('-', '');
                    }
                },
                {data: "pengurus_laki", className: "text-center sum_laki"},
                {data: "pengurus_perempuan", className: "text-center sum_per"}
            ],
            footerCallback: function () {
                var api = this.api();
                var numFormat = $.fn.dataTable.render.number('\.', '', 0, '').display;
                api.columns(['.sum_rad', '.sum_sek', '.sum_wak', '.sum_yay', '.sum_pem', '.sum_tan', '.sum_bang', '.sum_laki', '.sum_per'], {page: 'all'}).every(function () {
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
            valueAxis.title.text = "Jumlah Radio Islam";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.dataFields.valueY = "jum_radio";
            series.dataFields.categoryX = "city_title";
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
        var jumlah_radio = document.getElementsByClassName('sum_rad')[2].innerText;
        $('input[name=jumtxt]').val(jumlah_radio);
        document.getElementById('jumlah_radio').innerHTML = "<b>Jumlah Radio Islam " + jumlah_radio + "</b>";
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv_b", am4charts.XYChart);
            chart.dataSource.url = url;
            var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "city_title";
            categoryAxis.numberFormatter.numberFormat = "#";
            categoryAxis.renderer.inversed = true;
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.cellStartLocation = 0.1;
            categoryAxis.renderer.cellEndLocation = 0.9;

            var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.opposite = true;
            function createSeries(field, name) {
                var series = chart.series.push(new am4charts.ColumnSeries());
                series.dataFields.valueX = field;
                series.dataFields.categoryY = "city_title";
                series.name = name;
                series.columns.template.tooltipText = "{name}: [bold]{valueX}[/]";
                series.columns.template.height = am4core.percent(100);
                series.sequencedInterpolation = true;

                var valueLabel = series.bullets.push(new am4charts.LabelBullet());
                valueLabel.label.text = "{valueX}";
                valueLabel.label.horizontalCenter = "left";
                valueLabel.label.dx = 10;
                valueLabel.label.hideOversized = false;
                valueLabel.label.truncate = false;

                var categoryLabel = series.bullets.push(new am4charts.LabelBullet());
                categoryLabel.label.text = "{name}";
                categoryLabel.label.horizontalCenter = "right";
                categoryLabel.label.dx = -10;
                categoryLabel.label.fill = am4core.color("#fff");
                categoryLabel.label.hideOversized = false;
                categoryLabel.label.truncate = false;
            }

            createSeries("luas_tanah", "Luas Tanah");
            createSeries("luas_bangunan", "Luas Bangunan");

        });
    };
</script>