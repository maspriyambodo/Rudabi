<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"> Data KUA Provinsi </h5>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div id="chartdiv" class="chartdivs"></div>
        <div class="clear" style="margin:5% 0px;"></div>
        <hr>
        <div class="clear" style="margin:5% 0px;"></div>
        <div class="container-fluid">
            <div class="table-responsive">
                <table id="t_kuaprov" class="table table-bordered table-hover table-striped" style="width:100%;">
                    <thead class="text-center text-uppercase">
                        <tr>
                            <th rowspan="2">kabupaten</th>
                            <th rowspan="2">jumlah<br>kua</th>
                            <th rowspan="2">jumlah<br>penghulu</th>
                            <th colspan="3">golongan</th>
                            <th colspan="9">tingkat</th>
                            <th colspan="4">pendidikan<br>terakhir</th>
                        </tr>
                        <tr>
                            <th>pratama</th>
                            <th>muda</th>
                            <th>madya</th>
                            <th>iii/a</th>
                            <th>iii/b</th>
                            <th>iii/c</th>
                            <th>iii/d</th>
                            <th>iv/a</th>
                            <th>iv/b</th>
                            <th>iv/c</th>
                            <th>iv/d</th>
                            <th>iv/e</th>
                            <th>s1</th>
                            <th>s2</th>
                            <th>s3</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
        $('#t_kuaprov').append('<tfoot class="text-center"> <tr> <th>JUMLAH</th> <th></th> <th></th> <th></th> <th></th> <th></th> <th></th> <th></th> <th></th> <th></th> <th></th> <th></th> <th></th> <th></th> <th></th> <th></th> <th></th> <th></th> </tr> </tfoot>');
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
            "fixedColumns": {
                leftColumns: 3
            },
            "ajax": {
                dataSrc: '',
                method: "GET",
                async: false,
                url: "https://simas.kemenag.go.id/rudabi/datapi/simpenghulu?KEY=BOBA&province_id=<?= $id ?>"
            },
            columns: [
                {
                    data: null, "render": function (data) {
                        var id = data.city_id;
                        return '<a href="<?= base_url('Simpenghulu/KUA/Detail/'); ?>' + id + '">' + data.city_title + '</a>';
                    }},
                {data: "jumlah_kua", className: 'text-center sum_kua'},
                {data: "jumlah_penghulu", className: 'text-center sum_peng'},
                {data: "jumlah_pratama", className: 'text-center sum_prat'},
                {data: "jumlah_muda", className: 'text-center sum_mud'},
                {data: "jumlah_madya", className: 'text-center sum_mad'},
                {data: "jumlah_IIIa", className: 'text-center sum_tiga_a'},
                {data: "jumlah_IIIb", className: 'text-center sum_tiga_b'},
                {data: "jumlah_IIIc", className: 'text-center sum_tiga_c'},
                {data: "jumlah_IIId", className: 'text-center sum_tiga_d'},
                {data: "jumlah_IVa", className: 'text-center sum_empat_a'},
                {data: "jumlah_IVb", className: 'text-center sum_empat_b'},
                {data: "jumlah_IVc", className: 'text-center sum_empat_c'},
                {data: "jumlah_IVd", className: 'text-center sum_empat_d'},
                {data: "jumlah_IVe", className: 'text-center sum_empat_e'},
                {data: "jumlah_S1", className: 'text-center sum_s1'},
                {data: "jumlah_S2", className: 'text-center sum_s2'},
                {data: "jumlah_S3", className: 'text-center sum_s3'}
            ],
            "footerCallback": function () {
                var api = this.api();
                var numFormat = $.fn.dataTable.render.number('\.', '', 0, '').display;
                api.columns('.sum_kua', {page: 'current'}).every(function () {
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
                api.columns('.sum_prat', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });
                api.columns('.sum_mud', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });
                api.columns('.sum_mad', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });
                api.columns('.sum_tiga_a', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });
                api.columns('.sum_tiga_b', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });
                api.columns('.sum_tiga_c', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });
                api.columns('.sum_tiga_d', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });
                api.columns('.sum_empat_a', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });
                api.columns('.sum_empat_b', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });
                api.columns('.sum_empat_c', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });
                api.columns('.sum_empat_d', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });
                api.columns('.sum_empat_e', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });
                api.columns('.sum_s1', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });
                api.columns('.sum_s2', {page: 'current'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });
                api.columns('.sum_s3', {page: 'current'}).every(function () {
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
    };</script>
<script>
    am4core.ready(function () {
        am4core.useTheme(am4themes_animated);
        var chart = am4core.create("chartdiv", am4charts.XYChart);
        chart.scrollbarX = new am4core.Scrollbar();
        chart.dataSource.url = "https://simas.kemenag.go.id/rudabi/datapi/simpenghulu?KEY=BOBA&province_id=" +<?= $id ?>;
        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.title.text = 'Daerah Tingkat Kota';
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
        valueAxis.title.text = "Jumlah";
        valueAxis.title.fontWeight = 800;
        var series = chart.series.push(new am4charts.ColumnSeries());
        series.dataFields.valueY = "jumlah_kua";
        series.dataFields.categoryX = "city_title";
        series.clustered = false;
        series.tooltipText = "Jumlah KUA di {categoryX}: [bold]{valueY}[/]";
        var series2 = chart.series.push(new am4charts.ColumnSeries());
        series2.dataFields.valueY = "jumlah_penghulu";
        series2.dataFields.categoryX = "city_title";
        series2.clustered = false;
        series2.columns.template.width = am4core.percent(50);
        series2.tooltipText = "Jumlah Penghulu di {categoryX}: [bold]{valueY}[/]";
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