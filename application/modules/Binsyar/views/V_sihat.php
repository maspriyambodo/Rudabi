<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Data Hisab Rukyat tahun <?= date('Y'); ?></h5>
        </div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <div class="text-uppercase">
                data Hisab Rukyat per provinsi
            </div>
        </div>
    </div>
    <div class="card-body">
        <div id="jumlah_hisab" class="text-center"></div>
        <div id="chartdiv" class="chartdivs"></div>
        <hr style="margin:5%;">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>provinsi</th>
                        <th>teropong</th>
                        <th>altimeter</th>
                        <th>theodolit</th>
                        <th>mizwala</th>
                        <th>gps</th>
                        <th>kompas</th>
                        <th>rubu</th>
                        <th>binoculer</th>
                        <th>kalkulator</th>
                        <th>gawang<br>lokasi</th>
                    </tr>
                </thead>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>jumlah</th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
        var url = "https://simas.kemenag.go.id/rudabi/datapi/siihat/alat2020?KEY=BOBA";
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
                        a = data.alat_provinsi;
                        b = data.province_title;
                        c = b.replace(' ', '_');
                        return '<a href="<?= base_url('Binsyar/Sihat/Provinsi/'); ?>' + a + "/" + c + '">' + b + '</a>';
                    }
                },
                {data: "jum_teropong", className: "text-center sum_ter"},
                {data: "jum_altimeter", className: "text-center sum_alt"},
                {data: "jum_theodolit", className: "text-center sum_theo"},
                {data: "jum_mizwala", className: "text-center sum_miz"},
                {data: "jum_gps", className: "text-center sum_gps"},
                {data: "jum_kompas", className: "text-center sum_kom"},
                {data: "jum_rubu", className: "text-center sum_rub"},
                {data: "jum_binoculer", className: "text-center sum_bin"},
                {data: "jum_kalkulator", className: "text-center sum_cal"},
                {data: "jum_gawanglokasi", className: "text-center sum_gwg"}
            ],
            footerCallback: function () {
                var api = this.api();
                var numFormat = $.fn.dataTable.render.number('\.', '', 0, '').display;
                api.columns(['.sum_ter', '.sum_alt', '.sum_theo', '.sum_miz', '.sum_gps', '.sum_kom', '.sum_rub', '.sum_bin', '.sum_cal', '.sum_gwg'], {page: 'all'}).every(function () {
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
        var a, b, c, d, e, f, g, h, i, j, k;
        a = document.getElementsByClassName('sum_ter')[2].innerText;
        b = document.getElementsByClassName('sum_alt')[2].innerText;
        c = document.getElementsByClassName('sum_theo')[2].innerText;
        d = document.getElementsByClassName('sum_miz')[2].innerText;
        e = document.getElementsByClassName('sum_gps')[2].innerText;
        f = document.getElementsByClassName('sum_kom')[2].innerText;
        g = document.getElementsByClassName('sum_rub')[2].innerText;
        h = document.getElementsByClassName('sum_bin')[2].innerText;
        i = document.getElementsByClassName('sum_cal')[2].innerText;
        j = document.getElementsByClassName('sum_gwg')[2].innerText;
        k = parseFloat(a) + parseFloat(b) + parseFloat(c) + parseFloat(d) + parseFloat(e) + parseFloat(f) + parseFloat(g) + parseFloat(h) + parseFloat(i) + parseFloat(j);
        var jumlah_hisab = document.getElementById('jumlah_hisab').innerHTML = "<b>Jumlah Alat Bantu Hisab Rukyat " + k + "</b>";
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.data = [
                {alat: "Teropong", jumlah: a},
                {alat: "Altimeter", jumlah: b},
                {alat: "Theodolit", jumlah: c},
                {alat: "Mizwala", jumlah: d},
                {alat: "GPS", jumlah: e},
                {alat: "Kompas", jumlah: f},
                {alat: "Rubu", jumlah: g},
                {alat: "binoculer", jumlah: h},
                {alat: "Kalkulator", jumlah: i},
                {alat: "Gawang", jumlah: j}
            ];
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.title.fontWeight = 800;
            categoryAxis.title.text = 'Alat Bantu Hisab Rukyat';
            categoryAxis.dataFields.category = "alat";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 100;
            valueAxis.title.text = "Jumlah Hisab Rukyat";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.dataFields.valueY = "jumlah";
            series.dataFields.categoryX = "alat";
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