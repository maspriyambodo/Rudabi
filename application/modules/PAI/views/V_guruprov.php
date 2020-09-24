<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-uppercase">data Guru Ngaji provinsi {provinsi}</h5>
        </div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?= base_url('PAI/Guru_ngaji/index/'); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <div id="title_chartdiv_a" class="text-center"></div>
        <div id="chartdiv_a" class="chartdivs"></div>
        <hr class="clear" style="margin:5% 0px;">
        <div id="chartdiv_pendidikan" class="chartdivs"></div>
        <hr class="clear" style="margin:5% 0px;">
        <div id="chartdiv_b" class="chartdivs"></div>
        <hr class="clear" style="margin:5% 0px;">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">kota/kabupaten</th>
                        <th rowspan="2">jumlah</th>
                        <th colspan="2">jenis kelamin</th>
                        <th colspan="2">status nikah</th>
                        <th colspan="9">pendidikan</th>
                    </tr>
                    <tr>
                        <th>laki-laki</th>
                        <th>perempuan</th>
                        <th>kawin</th>
                        <th>belum</th>
                        <th>smp</th>
                        <th>sma</th>
                        <th>pesantren</th>
                        <th>DI</th>
                        <th>dii</th>
                        <th>diii</th>
                        <th>s1</th>
                        <th>s2</th>
                        <th>s3</th>
                    </tr>
                </thead>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>jumlah</th>
                        <th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
                    </tr>
                </tfoot>
            </table>
            <input type="hidden" name="dewantxt" readonly="true"/>
            <input type="hidden" name="lakitxt" readonly="true"/>
            <input type="hidden" name="perempuantxt" readonly="true"/>
            <input type="hidden" name="nikahtxt" readonly="true"/>
            <input type="hidden" name="blmtxt" readonly="true"/>
            <input type="hidden" name="smptxt" readonly="true"/>
            <input type="hidden" name="smatxt" readonly="true"/>
            <input type="hidden" name="pesantrentxt" readonly="true"/>
            <input type="hidden" name="d1txt" readonly="true"/>
            <input type="hidden" name="d2txt" readonly="true"/>
            <input type="hidden" name="d3txt" readonly="true"/>
            <input type="hidden" name="s1txt" readonly="true"/>
            <input type="hidden" name="s2txt" readonly="true"/>
            <input type="hidden" name="s3txt" readonly="true"/>
        </div>
    </div>
</div>

<script>
    var url = "https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/tokoh?province_id=<?= $id; ?>";
    am4core.ready(function () {
        var tot_dewan = $('input[name=dewantxt]').val();
        var tot_laki = $('input[name=lakitxt]').val();
        var tot_perem = $('input[name=perempuantxt]').val();
        var tot_nikah = $('input[name=nikahtxt]').val();
        var tot_blm_nikah = $('input[name=blmtxt]').val();
        am4core.useTheme(am4themes_animated);

        var data = [
            {
                "kategori": "Dummy",
                "disabled": true,
                "jumlah": tot_dewan,
                "color": am4core.color("#dadada"),
                "opacity": 0.3,
                "strokeDasharray": "4,4"
            },
            {
                "kategori": "laki-laki",
                "jumlah": tot_laki
            },
            {
                "kategori": "perempuan",
                "jumlah": tot_perem
            },
            {
                "kategori": "Kawin",
                "jumlah": tot_nikah
            },
            {
                "kategori": "Belum Kawin",
                "jumlah": tot_blm_nikah
            }
        ];

        var container = am4core.create("chartdiv_b", am4core.Container);
        container.width = am4core.percent(100);
        container.height = am4core.percent(100);
        container.layout = "horizontal";

        container.events.on("maxsizechanged", function () {
            chart1.zIndex = 0;
            separatorLine.zIndex = 1;
            dragText.zIndex = 2;
            chart2.zIndex = 3;
        });

        var chart1 = container.createChild(am4charts.PieChart);
        chart1.fontSize = 11;
        chart1.hiddenState.properties.opacity = 0;
        chart1.data = data;
        chart1.radius = am4core.percent(70);
        chart1.innerRadius = am4core.percent(40);
        chart1.zIndex = 1;

        var series1 = chart1.series.push(new am4charts.PieSeries());
        series1.dataFields.value = "jumlah";
        series1.dataFields.category = "kategori";
        series1.colors.step = 2;
        series1.alignLabels = false;
        series1.labels.template.bent = true;
        series1.labels.template.radius = 3;
        series1.labels.template.padding(0, 0, 0, 0);

        var sliceTemplate1 = series1.slices.template;
        sliceTemplate1.cornerRadius = 5;
        sliceTemplate1.draggable = true;
        sliceTemplate1.inert = true;
        sliceTemplate1.propertyFields.fill = "color";
        sliceTemplate1.propertyFields.fillOpacity = "opacity";
        sliceTemplate1.propertyFields.stroke = "color";
        sliceTemplate1.propertyFields.strokeDasharray = "strokeDasharray";
        sliceTemplate1.strokeWidth = 1;
        sliceTemplate1.strokeOpacity = 1;

        var zIndex = 5;

        sliceTemplate1.events.on("down", function (event) {
            event.target.toFront();
            var series = event.target.dataItem.component;
            series.chart.zIndex = zIndex++;
        });

        series1.ticks.template.disabled = true;

        sliceTemplate1.states.getKey("active").properties.shiftRadius = 0;

        sliceTemplate1.events.on("dragstop", function (event) {
            handleDragStop(event);
        });

        var separatorLine = container.createChild(am4core.Line);
        separatorLine.x1 = 0;
        separatorLine.y2 = 300;
        separatorLine.strokeWidth = 3;
        separatorLine.stroke = am4core.color("#dadada");
        separatorLine.valign = "middle";
        separatorLine.strokeDasharray = "5,5";


        var dragText = container.createChild(am4core.Label);
        dragText.text = "Drag slices over the line";
        dragText.rotation = 90;
        dragText.valign = "middle";
        dragText.align = "center";
        dragText.paddingBottom = 5;

        var chart2 = container.createChild(am4charts.PieChart);
        chart2.hiddenState.properties.opacity = 0;
        chart2.fontSize = 11;
        chart2.radius = am4core.percent(70);
        chart2.data = data;
        chart2.innerRadius = am4core.percent(40);
        chart2.zIndex = 1;

        var series2 = chart2.series.push(new am4charts.PieSeries());
        series2.dataFields.value = "jumlah";
        series2.dataFields.category = "kategori";
        series2.colors.step = 2;

        series2.alignLabels = false;
        series2.labels.template.bent = true;
        series2.labels.template.radius = 3;
        series2.labels.template.padding(0, 0, 0, 0);
        series2.labels.template.propertyFields.disabled = "disabled";

        var sliceTemplate2 = series2.slices.template;
        sliceTemplate2.copyFrom(sliceTemplate1);

        series2.ticks.template.disabled = true;

        function handleDragStop(event) {
            var targetSlice = event.target;
            var dataItem1;
            var dataItem2;
            var slice1;
            var slice2;

            if (series1.slices.indexOf(targetSlice) != -1) {
                slice1 = targetSlice;
                slice2 = series2.dataItems.getIndex(targetSlice.dataItem.index).slice;
            } else if (series2.slices.indexOf(targetSlice) != -1) {
                slice1 = series1.dataItems.getIndex(targetSlice.dataItem.index).slice;
                slice2 = targetSlice;
            }

            dataItem1 = slice1.dataItem;
            dataItem2 = slice2.dataItem;

            var series1Center = am4core.utils.spritePointToSvg({x: 0, y: 0}, series1.slicesContainer);
            var series2Center = am4core.utils.spritePointToSvg({x: 0, y: 0}, series2.slicesContainer);

            var series1CenterConverted = am4core.utils.svgPointToSprite(series1Center, series2.slicesContainer);
            var series2CenterConverted = am4core.utils.svgPointToSprite(series2Center, series1.slicesContainer);

            var targetSlicePoint = am4core.utils.spritePointToSvg({x: targetSlice.tooltipX, y: targetSlice.tooltipY}, targetSlice);

            if (targetSlice == slice1) {
                if (targetSlicePoint.x > container.pixelWidth / 2) {
                    var value = dataItem1.value;

                    dataItem1.hide();

                    var animation = slice1.animate([{property: "x", to: series2CenterConverted.x}, {property: "y", to: series2CenterConverted.y}], 400);
                    animation.events.on("animationprogress", function (event) {
                        slice1.hideTooltip();
                    });

                    slice2.x = 0;
                    slice2.y = 0;

                    dataItem2.show();
                } else {
                    slice1.animate([{property: "x", to: 0}, {property: "y", to: 0}], 400);
                }
            }
            if (targetSlice == slice2) {
                if (targetSlicePoint.x < container.pixelWidth / 2) {

                    var value = dataItem2.value;

                    dataItem2.hide();

                    var animation = slice2.animate([{property: "x", to: series1CenterConverted.x}, {property: "y", to: series1CenterConverted.y}], 400);
                    animation.events.on("animationprogress", function (event) {
                        slice2.hideTooltip();
                    });

                    slice1.x = 0;
                    slice1.y = 0;
                    dataItem1.show();
                } else {
                    slice2.animate([{property: "x", to: 0}, {property: "y", to: 0}], 400);
                }
            }

            toggleDummySlice(series1);
            toggleDummySlice(series2);

            series1.hideTooltip();
            series2.hideTooltip();
        }

        function toggleDummySlice(series) {
            var show = true;
            for (var i = 1; i < series.dataItems.length; i++) {
                var dataItem = series.dataItems.getIndex(i);
                if (dataItem.slice.visible && !dataItem.slice.isHiding) {
                    show = false;
                }
            }

            var dummySlice = series.dataItems.getIndex(0);
            if (show) {
                dummySlice.show();
            } else {
                dummySlice.hide();
            }
        }

        series2.events.on("datavalidated", function () {

            var dummyDataItem = series2.dataItems.getIndex(0);
            dummyDataItem.show(0);
            dummyDataItem.slice.draggable = false;
            dummyDataItem.slice.tooltipText = undefined;

            for (var i = 1; i < series2.dataItems.length; i++) {
                series2.dataItems.getIndex(i).hide(0);
            }
        });

        series1.events.on("datavalidated", function () {
            var dummyDataItem = series1.dataItems.getIndex(0);
            dummyDataItem.hide(0);
            dummyDataItem.slice.draggable = false;
            dummyDataItem.slice.tooltipText = undefined;
        });

    });
    am4core.ready(function () {
        am4core.useTheme(am4themes_animated);
        var chart = am4core.create("chartdiv_a", am4charts.XYChart);
        chart.dataSource.url = url;
        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.title.fontWeight = 800;
        categoryAxis.title.text = 'Daerah Tingkat Kota/Kabupaten';
        categoryAxis.dataFields.category = "city_title";
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.minGridDistance = 10;
        categoryAxis.renderer.labels.template.horizontalCenter = "right";
        categoryAxis.renderer.labels.template.verticalCenter = "middle";
        categoryAxis.renderer.labels.template.rotation = 270;
        categoryAxis.tooltip.disabled = true;
        categoryAxis.renderer.minHeight = 110;
        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.renderer.minWidth = 100;
        valueAxis.title.text = "Jumlah Guru Ngaji";
        valueAxis.title.fontWeight = 800;
        var series = chart.series.push(new am4charts.ColumnSeries());
        series.dataFields.valueY = "jum_tokoh";
        series.dataFields.categoryX = "city_title";
        series.clustered = false;
        series.tooltipText = "Jumlah Guru Ngaji di {categoryX}: [bold]{valueY}[/]";
        var hoverState = series.columns.template.column.states.create("hover");
        hoverState.properties.cornerRadiusTopLeft = 0;
        hoverState.properties.cornerRadiusTopRight = 0;
        hoverState.properties.fillOpacity = 1;
        series.columns.template.adapter.add("fill", function (fill, target) {
            return chart.colors.getIndex(target.dataItem.index);
        });
        chart.cursor = new am4charts.XYCursor();
    });

    am4core.ready(function () {
        var smp = $('input[name=smptxt]').val();
        var sma = $('input[name=smatxt]').val();
        var pesantren = $('input[name=pesantrentxt]').val();
        var d1 = $('input[name=d1txt]').val();
        var d2 = $('input[name=d2txt]').val();
        var d3 = $('input[name=d3txt]').val();
        var s1 = $('input[name=s1txt]').val();
        var s2 = $('input[name=s2txt]').val();
        var s3 = $('input[name=s3txt]').val();
        am4core.useTheme(am4themes_animated);
        var chart = am4core.create("chartdiv_pendidikan", am4charts.XYChart);
        chart.data = [
            {pendidikan: "S M P", jumlah: smp},
            {pendidikan: "S M A", jumlah: sma},
            {pendidikan: "Pesantren", jumlah: pesantren},
            {pendidikan: "Diploma I", jumlah: d1},
            {pendidikan: "Diploma II", jumlah: d2},
            {pendidikan: "Diploma III", jumlah: d3},
            {pendidikan: "S 1", jumlah: s1},
            {pendidikan: "S 2", jumlah: s2},
            {pendidikan: "S 3", jumlah: s3}
        ];
        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.title.fontWeight = 800;
        categoryAxis.title.text = 'Daerah Tingkat Kota/Kabupaten';
        categoryAxis.dataFields.category = "pendidikan";
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.renderer.minGridDistance = 10;
        categoryAxis.renderer.labels.template.horizontalCenter = "right";
        categoryAxis.renderer.labels.template.verticalCenter = "middle";
        categoryAxis.renderer.labels.template.rotation = 270;
        categoryAxis.tooltip.disabled = true;
        categoryAxis.renderer.minHeight = 110;
        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
        valueAxis.renderer.minWidth = 100;
        valueAxis.title.text = "Jumlah Pendidikan Guru Ngaji";
        valueAxis.title.fontWeight = 800;
        var series = chart.series.push(new am4charts.ColumnSeries());
        series.dataFields.valueY = "jumlah";
        series.dataFields.categoryX = "pendidikan";
        series.clustered = false;
        series.tooltipText = "Pendidikan Guru Ngaji {categoryX}: [bold]{valueY}[/]";
        var hoverState = series.columns.template.column.states.create("hover");
        hoverState.properties.cornerRadiusTopLeft = 0;
        hoverState.properties.cornerRadiusTopRight = 0;
        hoverState.properties.fillOpacity = 1;
        series.columns.template.adapter.add("fill", function (fill, target) {
            return chart.colors.getIndex(target.dataItem.index);
        });
        chart.cursor = new am4charts.XYCursor();
    });

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
        "fixedColumns": {
            leftColumns: 2
        },
        columns: [
            {
                data: null,
                render: function (data) {
                    var a, b, c;
                    a = data.city_id;
                    b = data.city_title;
                    c = b.replace(' ', '_');
                    return '<a href="<?= base_url('PAI/Guru_ngaji/Kabupaten/'); ?>' + a + "/" + c + '">' + b + '</a>';
                }
            },
            {data: "jum_tokoh", className: "text-center sum_dw"},
            {data: "jum_pria", className: "text-center sum_pria"},
            {data: "jum_perempuan", className: "text-center sum_per"},
            {data: "jum_kawin", className: "text-center sum_kaw"},
            {data: "jum_belum_kawin", className: "text-center sum_blm"},
            {data: "pend_smp", className: "text-center sum_smp"},
            {data: "pend_sma", className: "text-center sum_sma"},
            {data: "pend_pesantren", className: "text-center sum_pes"},
            {data: "pend_diploma1", className: "text-center sum_d1"},
            {data: "pend_diploma2", className: "text-center sum_d2"},
            {data: "pend_diploma3", className: "text-center sum_d3"},
            {data: "pend_s1", className: "text-center sum_s1"},
            {data: "pend_s2", className: "text-center sum_s2"},
            {data: "pend_s3", className: "text-center sum_s3"}
        ],
        footerCallback: function () {
            var api = this.api();
            var numFormat = $.fn.dataTable.render.number('\.', '', 0, '').display;
            api.columns('.sum_dw', {page: 'all'}).every(function () {
                var sum = this
                        .data()
                        .reduce(function (a, b) {
                            var x = parseFloat(a) || 0;
                            var y = parseFloat(b) || 0;
                            return x + y;
                        }, 0);
                $('input[name=dewantxt]').val(sum);
                document.getElementById('title_chartdiv_a').innerHTML = "<b>Jumlah Guru Ngaji Provinsi " + "<?= $provinsi; ?> " + numFormat(sum) + "</b>";
                $(this.footer()).html(numFormat(sum));
            });
            api.columns('.sum_pria', {page: 'all'}).every(function () {
                var sum = this
                        .data()
                        .reduce(function (a, b) {
                            var x = parseFloat(a) || 0;
                            var y = parseFloat(b) || 0;
                            return x + y;
                        }, 0);
                $('input[name=lakitxt]').val(sum);
                $(this.footer()).html(numFormat(sum));
            });
            api.columns('.sum_per', {page: 'all'}).every(function () {
                var sum = this
                        .data()
                        .reduce(function (a, b) {
                            var x = parseFloat(a) || 0;
                            var y = parseFloat(b) || 0;
                            return x + y;
                        }, 0);
                $('input[name=perempuantxt]').val(sum);
                $(this.footer()).html(numFormat(sum));
            });
            api.columns('.sum_kaw', {page: 'all'}).every(function () {
                var sum = this
                        .data()
                        .reduce(function (a, b) {
                            var x = parseFloat(a) || 0;
                            var y = parseFloat(b) || 0;
                            return x + y;
                        }, 0);
                $('input[name=nikahtxt]').val(sum);
                $(this.footer()).html(numFormat(sum));
            });
            api.columns('.sum_blm', {page: 'all'}).every(function () {
                var sum = this
                        .data()
                        .reduce(function (a, b) {
                            var x = parseFloat(a) || 0;
                            var y = parseFloat(b) || 0;
                            return x + y;
                        }, 0);
                $('input[name=blmtxt]').val(sum);
                $(this.footer()).html(numFormat(sum));
            });
            api.columns('.sum_smp', {page: 'all'}).every(function () {
                var sum = this
                        .data()
                        .reduce(function (a, b) {
                            var x = parseFloat(a) || 0;
                            var y = parseFloat(b) || 0;
                            return x + y;
                        }, 0);
                $('input[name=smptxt]').val(sum);
                $(this.footer()).html(numFormat(sum));
            });
            api.columns('.sum_sma', {page: 'all'}).every(function () {
                var sum = this
                        .data()
                        .reduce(function (a, b) {
                            var x = parseFloat(a) || 0;
                            var y = parseFloat(b) || 0;
                            return x + y;
                        }, 0);
                $('input[name=smatxt]').val(sum);
                $(this.footer()).html(numFormat(sum));
            });
            api.columns('.sum_pes', {page: 'all'}).every(function () {
                var sum = this
                        .data()
                        .reduce(function (a, b) {
                            var x = parseFloat(a) || 0;
                            var y = parseFloat(b) || 0;
                            return x + y;
                        }, 0);
                $('input[name=pesantrentxt]').val(sum);
                $(this.footer()).html(numFormat(sum));
            });
            api.columns('.sum_d1', {page: 'all'}).every(function () {
                var sum = this
                        .data()
                        .reduce(function (a, b) {
                            var x = parseFloat(a) || 0;
                            var y = parseFloat(b) || 0;
                            return x + y;
                        }, 0);
                $('input[name=d1txt]').val(sum);
                $(this.footer()).html(numFormat(sum));
            });
            api.columns('.sum_d2', {page: 'all'}).every(function () {
                var sum = this
                        .data()
                        .reduce(function (a, b) {
                            var x = parseFloat(a) || 0;
                            var y = parseFloat(b) || 0;
                            return x + y;
                        }, 0);
                $('input[name=d2txt]').val(sum);
                $(this.footer()).html(numFormat(sum));
            });
            api.columns('.sum_d3', {page: 'all'}).every(function () {
                var sum = this
                        .data()
                        .reduce(function (a, b) {
                            var x = parseFloat(a) || 0;
                            var y = parseFloat(b) || 0;
                            return x + y;
                        }, 0);
                $('input[name=d3txt]').val(sum);
                $(this.footer()).html(numFormat(sum));
            });
            api.columns('.sum_s1', {page: 'all'}).every(function () {
                var sum = this
                        .data()
                        .reduce(function (a, b) {
                            var x = parseFloat(a) || 0;
                            var y = parseFloat(b) || 0;
                            return x + y;
                        }, 0);
                $('input[name=s1txt]').val(sum);
                $(this.footer()).html(numFormat(sum));
            });
            api.columns('.sum_s2', {page: 'all'}).every(function () {
                var sum = this
                        .data()
                        .reduce(function (a, b) {
                            var x = parseFloat(a) || 0;
                            var y = parseFloat(b) || 0;
                            return x + y;
                        }, 0);
                $('input[name=s2txt]').val(sum);
                $(this.footer()).html(numFormat(sum));
            });
            api.columns('.sum_s3', {page: 'all'}).every(function () {
                var sum = this
                        .data()
                        .reduce(function (a, b) {
                            var x = parseFloat(a) || 0;
                            var y = parseFloat(b) || 0;
                            return x + y;
                        }, 0);
                $('input[name=s3txt]').val(sum);
                $(this.footer()).html(numFormat(sum));
            });
        }

    });
</script>