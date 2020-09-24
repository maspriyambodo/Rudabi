<?php
$target_pusat = str_replace(',', '', $catin[0]->target_pusat);
$jumlah_catin = str_replace(',', '', $catin[0]->jumlah_catin);
$hadir_suami = str_replace(',', '', $catin[0]->hadir_suami);
$nonhadir_istri = str_replace(',', '', $catin[0]->nonhadir_istri);
?>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Data CATIN Tahun <?= $datedex; ?></h5>
        </div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-body">
        <div class="form-group row">
            <label class="col-2 col-form-label">Pilih Tahun</label>
            <div class="col-4">
                <select name="tahun" class="form-control form-control-solid" onchange="Tahun()">
                    <?php
                    foreach ($data as $value) {
                        if ($datedex == $value->tahun_target_pusat) {
                            $selected = 'selected=""';
                        } else {
                            $selected = null;
                        }
                        echo '<option value="' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt($value->tahun_target_pusat)) . '" ' . $selected . '>' . $value->tahun_target_pusat . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <hr>
        <div id="chartdiv" class="chartdivs"></div>
    </div>
</div>
<script>
    function Tahun() {
        var a = $('select[name=tahun]').val();
        return window.location.href = "KUA/Catin/index/" + a;
    }
    am4core.ready(function () {
        am4core.useTheme(am4themes_animated);
        var data = [
            {
                "country": "Dummy",
                "disabled": true,
                "litres": <?= $target_pusat; ?>,
                "color": am4core.color("#dadada"),
                "opacity": 0.3,
                "strokeDasharray": "4,4"
            },
            {
                "country": "Jumlah Catin",
                "litres": <?= $jumlah_catin; ?>
            },
            {
                "country": "Hadir Suami",
                "litres": <?= $hadir_suami; ?>
            },
            {
                "country": "Nonhadir Istri",
                "litres": <?= $nonhadir_istri; ?>
            }
        ];

        var container = am4core.create("chartdiv", am4core.Container);
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
        series1.dataFields.value = "litres";
        series1.dataFields.category = "country";
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
        series2.dataFields.value = "litres";
        series2.dataFields.category = "country";
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
</script>