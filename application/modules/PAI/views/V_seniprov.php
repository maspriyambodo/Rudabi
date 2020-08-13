<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-uppercase">data lsi provinsi {provinsi}</h5>
        </div>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?= base_url('PAI/Seni_Islam/index/'); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <div id="chartdiv" style="width:100%;height:700px;"></div>
        <hr style="margin:5% 0px;">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-uppercase text-center">
                    <tr>
                        <th rowspan="2">kota/kabupaten</th>
                        <th rowspan="2">Jumlah<br>lsi</th>
                        <th colspan="7">jumlah sarana &AMP; prasarana</th>
                    </tr>
                    <tr>
                        <th>papan</th>
                        <th>lemari</th>
                        <th>meja</th>
                        <th>alas</th>
                        <th>komputer</th>
                        <th>rekenig</th>
                        <th>plang</th>
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
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
    var url = "https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/lembagaseni?lembaga_seni_provinsi=<?= $id; ?>";
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
                    return '<a href="<?= base_url('PAI/Seni_Islam/Kabupaten/'); ?>' + a + "/" + c + '">' + b + '</a>';
                }
            },
            {data: "jum_lembaga", className: "text-center sum_lsi"},
            {data: "jum_papan", className: "text-center sum_pap"},
            {data: "jum_lemari", className: "text-center sum_lem"},
            {data: "jum_meja", className: "text-center sum_mej"},
            {data: "jum_alas", className: "text-center sum_als"},
            {data: "jum_komputer", className: "text-center sum_kom"},
            {data: "jum_bank", className: "text-center sum_bank"},
            {data: "jum_plang", className: "text-center sum_plang"}
        ],
        footerCallback: function () {
            var api = this.api();
            api.columns('.sum_lsi', {page: 'current'}).every(function () {
                var sum = this
                        .data()
                        .reduce(function (a, b) {
                            var x = parseFloat(a) || 0;
                            var y = parseFloat(b) || 0;
                            return x + y;
                        }, 0);
                $(this.footer()).html(sum);
            });
            api.columns('.sum_pap', {page: 'current'}).every(function () {
                var sum = this
                        .data()
                        .reduce(function (a, b) {
                            var x = parseFloat(a) || 0;
                            var y = parseFloat(b) || 0;
                            return x + y;
                        }, 0);
                $(this.footer()).html(sum);
            });
            api.columns('.sum_lem', {page: 'current'}).every(function () {
                var sum = this
                        .data()
                        .reduce(function (a, b) {
                            var x = parseFloat(a) || 0;
                            var y = parseFloat(b) || 0;
                            return x + y;
                        }, 0);
                $(this.footer()).html(sum);
            });
            api.columns('.sum_mej', {page: 'current'}).every(function () {
                var sum = this
                        .data()
                        .reduce(function (a, b) {
                            var x = parseFloat(a) || 0;
                            var y = parseFloat(b) || 0;
                            return x + y;
                        }, 0);
                $(this.footer()).html(sum);
            });
            api.columns('.sum_als', {page: 'current'}).every(function () {
                var sum = this
                        .data()
                        .reduce(function (a, b) {
                            var x = parseFloat(a) || 0;
                            var y = parseFloat(b) || 0;
                            return x + y;
                        }, 0);
                $(this.footer()).html(sum);
            });
            api.columns('.sum_kom', {page: 'current'}).every(function () {
                var sum = this
                        .data()
                        .reduce(function (a, b) {
                            var x = parseFloat(a) || 0;
                            var y = parseFloat(b) || 0;
                            return x + y;
                        }, 0);
                $(this.footer()).html(sum);
            });
            api.columns('.sum_bank', {page: 'current'}).every(function () {
                var sum = this
                        .data()
                        .reduce(function (a, b) {
                            var x = parseFloat(a) || 0;
                            var y = parseFloat(b) || 0;
                            return x + y;
                        }, 0);
                $(this.footer()).html(sum);
            });
            api.columns('.sum_plang', {page: 'current'}).every(function () {
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
        valueAxis.title.text = "Jumlah Lembaga Seni Islam";
        valueAxis.title.fontWeight = 800;

        var series = chart.series.push(new am4charts.ColumnSeries());
        series.columns.template.column.cornerRadiusTopLeft = 10;
        series.columns.template.column.cornerRadiusTopRight = 10;
        series.columns.template.column.fillOpacity = 0.8;
        series.dataFields.valueY = "jum_lembaga";
        series.dataFields.categoryX = "city_title";
        series.clustered = false;
        series.tooltipText = "Jumlah LSI di {categoryX}: [bold]{valueY}[/]";

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