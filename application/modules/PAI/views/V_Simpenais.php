<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Data Penyuluh Agama Islam tahun <?= date('Y'); ?></h5>
        </div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-uppercase">data penyuluh agama islam per provinsi</h3>
        </div>
    </div>
    <div class="card-body">
        <div id="chartdiv" style="width:100%;height:600px;"></div>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="text-uppercase">data pernikahan penyuluh agama islam pns</h3>
        </div>
    </div>
    <div class="card-body">
        <div id="chartdivs" style="width:100%;height:600px;"></div>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-body">
        <div class="table-responsive">
            <table id="penyuluh" class="table table-bordered table-hover table-striped">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">
                            provinsi
                        </th>
                        <th colspan="2">
                            penyuluh
                        </th>
                    </tr>
                    <tr>
                        <td>
                            pns
                        </td>
                        <td>
                            non-pns
                        </td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <div class="text-center">
                <h3 class="text-uppercase">data penyuluh agama islam tidak valid</h3>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="pns_nonvalid" class="table table-bordered table-hover table-striped">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">
                            status
                        </th>
                        <th colspan="4">penyuluh pns</th>
                        <th colspan="4">administrator</th>
                    </tr>
                    <tr>
                        <th>
                            nama
                        </th>
                        <th>
                            tgl<br>lahir
                        </th>
                        <th>
                            kota
                        </th>
                        <th>
                            provinsi
                        </th>
                        <th>
                            tgl<br>input
                        </th>
                        <th>
                            username
                        </th>
                        <th>
                            full name
                        </th>
                        <th>
                            email
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script>
    am4core.ready(function () {
        am4core.useTheme(am4themes_animated);
        var b = am4core.create("chartdivs", am4charts.PieChart);
        b.hiddenState.properties.opacity = 0;
        b.dataSource.url = "https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/statuskawin";
        b.radius = am4core.percent(70);
        b.innerRadius = am4core.percent(40);
        b.startAngle = 180;
        b.endAngle = 360;
        var a = b.series.push(new am4charts.PieSeries());
        a.dataFields.value = "jumlah";
        a.dataFields.category = "kategori";
        a.slices.template.cornerRadius = 10;
        a.slices.template.innerCornerRadius = 7;
        a.slices.template.draggable = true;
        a.slices.template.inert = true;
        a.alignLabels = false;
        a.hiddenState.properties.startAngle = 90;
        a.hiddenState.properties.endAngle = 90;
        b.legend = new am4charts.Legend();
    });

</script>
<script>
    var url = "https://simas.kemenag.go.id/rudabi/datapi/simpenaiss";
    window.onload = function () {
        $('#pns_nonvalid').dataTable({
            "ServerSide": true,
            "order": [[0, "DESC"]],
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
                url: "https://simas.kemenag.go.id/rudabi/datapi/Simpenaiss/pnsinvalid"
            },
            columns: [
                {data: "status_pns", className: "text-center text-uppercase"},
                {data: "penyuluh_pns_nama"},
                {data: "penyuluh_pns_tgl_lahir", className: "text-center"},
                {data: "city_title", className: "text-center"},
                {data: "province_title", className: "text-center"},
                {data: "time_add", className: "text-center"},
                {data: "user_name", className: "text-center"},
                {data: "user_fullname", className: "text-center"},
                {data: "user_email", className: "text-center"}
            ]
        });

        $('#penyuluh').dataTable({
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
                url: "https://simas.kemenag.go.id/rudabi/datapi/simpenaiss"
            },
            columns: [
                {data: "province_title"},
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a, b, c, d;
                        a = data.jumlah_pns;
                        b = data.province_id;
                        c = data.province_title;
                        d = c.replace(' ', '_');
                        return '<a href="<?= base_url('PAI/Simpenais/PNS/'); ?>' + b + "/" + d + '" title="Detail Jumlah PNS">' + a + '</a>';
                    }
                },
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a, b, c, d;
                        a = data.jumlah_non_pns;
                        b = data.penyuluh_nonpns_provinsi;
                        c = data.province_title;
                        d = c.replace(' ', '_');
                        return '<a href="<?= base_url('PAI/Simpenais/Nonpns/'); ?>' + b + "/" + d + '" title="Detail Jumlah Non-PNS">' + a + '</a>';
                    }
                }
            ]
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
        valueAxis.title.text = "Jumlah";
        valueAxis.title.fontWeight = 800;
        var series = chart.series.push(new am4charts.ColumnSeries());
        series.dataFields.valueY = "jumlah_non_pns";
        series.dataFields.categoryX = "province_title";
        series.clustered = false;
        series.tooltipText = "Jumlah Penyuluh Non PNS di {categoryX}: [bold]{valueY}[/]";
        var series2 = chart.series.push(new am4charts.ColumnSeries());
        series2.dataFields.valueY = "jumlah_pns";
        series2.dataFields.categoryX = "province_title";
        series2.clustered = false;
        series2.columns.template.width = am4core.percent(50);
        series2.tooltipText = "Jumlah Penyuluh PNS di {categoryX}: [bold]{valueY}[/]";
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