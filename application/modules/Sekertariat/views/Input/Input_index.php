<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Data Input Triwulan Tahun {tahun}</h5>
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
                    $usul_tahun = json_decode($pertahun);
                    foreach ($usul_tahun as $usul_tahun) {
                        if ($usul_tahun->usul_tahun == $tahun) {
                            $selected = 'selected=""';
                        } else {
                            $selected = null;
                        }
                        echo '<option value="' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt($usul_tahun->usul_tahun)) . '" ' . $selected . '>' . $usul_tahun->usul_tahun . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <hr>
        <div id="chartdiv" class="chartdivs"></div>
    </div>
</div>
<div class="clear" style="margin:5%;"></div>
<div class="card card-custom">
    <div class="card-body">
        <p>Status Data Input Triwulan</p>
        <hr>
        <div id="chartdiv_a" class="chartdivs"></div>
    </div>
</div>
<div class="clear" style="margin:5%;"></div>
<div class="card card-custom">
    <div class="card-body">
        <?php
        if ($data == false) {
            $hide = "hidden";
            $msgs = null;
        } else {
            $hide = null;
            $msgs = "hidden";
        }
        ?>
        <p <?= $msgs; ?>>{msg}</p>
        <div class="table-responsive" <?= $hide; ?>>
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">provinsi</th>
                        <th rowspan="2">jumlah<br>data</th>
                        <th rowspan="2">jumlah<br>kua</th>
                        <th rowspan="2">luas<br>tanah</th>
                        <th rowspan="2">penghapusan<br>gedung</th>
                        <th rowspan="2">tanah<br>kosong</th>
                        <th rowspan="2">perluasan<br>bangunan</th>
                        <th rowspan="2">dipa</th>
                        <th colspan="2">status</th>
                    </tr>
                    <tr>
                        <th>pending</th>
                        <th>approve</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $input = json_decode($data);
                    $totjum_kabkot = 0;
                    $totjum_kua = 0;
                    $totluas_tanah = 0;
                    $totpenghapusan_gedung = 0;
                    $tottanah_kosong = 0;
                    $totperluasan_bangunan = 0;
                    $totnilai_dipa = 0;
                    $totstatus_pending = 0;
                    $totstatus_req_approve = 0;
                    foreach ($input as $input) {
                        ?>
                        <tr>
                            <td>
                                <?php
                                $url = str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt($tahun . '/' . $input->usul_propinsi . '/' . $input->propinsi_nama));
                                echo '<a href=' . base_url('Sekertariat/Input/Provinsi/' . $url . '') . '>' . $input->propinsi_nama . '</a>';
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $jum_kabkot = str_replace(',', '', $input->jum_kabkot);
                                $totjum_kabkot += $jum_kabkot;
                                echo number_format($jum_kabkot);
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $jum_kua = str_replace(',', '', $input->jum_kua);
                                $totjum_kua += $jum_kua;
                                echo number_format($jum_kua);
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $luas_tanah = str_replace(',', '', $input->luas_tanah);
                                $totluas_tanah += $luas_tanah;
                                echo number_format($luas_tanah);
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $penghapusan_gedung = str_replace(',', '', $input->penghapusan_gedung);
                                $totpenghapusan_gedung += $penghapusan_gedung;
                                echo number_format($penghapusan_gedung);
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $tanah_kosong = str_replace(',', '', $input->tanah_kosong);
                                $tottanah_kosong += $tanah_kosong;
                                echo number_format($tanah_kosong);
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $perluasan_bangunan = str_replace(',', '', $input->perluasan_bangunan);
                                $totperluasan_bangunan += $perluasan_bangunan;
                                echo number_format($perluasan_bangunan);
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $nilai_dipa = str_replace(',', '', $input->nilai_dipa);
                                $totnilai_dipa += $nilai_dipa;
                                echo number_format($nilai_dipa);
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $status_pending = str_replace(',', '', $input->status_pending);
                                $totstatus_pending += $status_pending;
                                echo number_format($status_pending);
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $status_req_approve = str_replace(',', '', $input->status_req_approve);
                                $totstatus_req_approve += $status_req_approve;
                                echo number_format($status_req_approve);
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>jumlah</th>
                        <th><?= number_format($totjum_kabkot); ?></th>
                        <th><?= number_format($totjum_kua); ?></th>
                        <th><?= number_format($totluas_tanah); ?></th>
                        <th><?= number_format($totpenghapusan_gedung); ?></th>
                        <th><?= number_format($tottanah_kosong); ?></th>
                        <th><?= number_format($totperluasan_bangunan); ?></th>
                        <th><?= number_format($totnilai_dipa); ?></th>
                        <th><?= number_format($totstatus_pending); ?></th>
                        <th><?= number_format($totstatus_req_approve); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
    function Tahun() {
        var a = $('select[name=tahun]').val();
        return window.location.href = "Sekertariat/Input/index/" + a;
    }
    window.onload = function () {
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
                'pdfHtml5'
            ]
        });
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();
            chart.data = <?= $data; ?>;
            chart.exporting.menu = new am4core.ExportMenu();
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.title.fontWeight = 800;
            categoryAxis.title.text = 'Daerah Tingkat Provinsi';
            categoryAxis.dataFields.category = "propinsi_nama";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 30;
            categoryAxis.renderer.labels.template.horizontalCenter = "right";
            categoryAxis.renderer.labels.template.verticalCenter = "middle";
            categoryAxis.renderer.labels.template.rotation = 270;
            categoryAxis.tooltip.disabled = true;
            categoryAxis.renderer.minHeight = 110;
            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 100;
            valueAxis.title.text = "Jumlah Data Input Triwulan";
            valueAxis.title.fontWeight = 800;
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.dataFields.valueY = "jum_kabkot";
            series.dataFields.categoryX = "propinsi_nama";
            series.clustered = false;
            series.tooltipText = "Jumlah Input Triwulan {categoryX}: [bold]{valueY}[/]";
            var series2 = chart.series.push(new am4charts.ColumnSeries());
            series2.dataFields.valueY = "status_pending";
            series2.dataFields.categoryX = "propinsi_nama";
            series2.clustered = false;
            series2.columns.template.width = am4core.percent(50);
            series2.tooltipText = "Status Pending {categoryX} : [bold]{valueY}[/]";
            var series3 = chart.series.push(new am4charts.ColumnSeries());
            series3.dataFields.valueY = "status_req_approve";
            series3.dataFields.categoryX = "propinsi_nama";
            series3.clustered = false;
            series3.columns.template.width = am4core.percent(50);
            series3.tooltipText = "Status Approved {categoryX} : [bold]{valueY}[/]";
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
        am4core.ready(function () {
            am4core.useTheme(am4themes_animated);
            var chart = am4core.create("chartdiv_a", am4charts.PieChart3D);
            chart.hiddenState.properties.opacity = 0;

            chart.legend = new am4charts.Legend();

            chart.data = [
                {
                    country: "Status Pending",
                    litres: <?= $totstatus_pending; ?>
                },
                {
                    country: "Status Approved",
                    litres: <?= $totstatus_req_approve; ?>
                }
            ];

            chart.innerRadius = 100;

            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "litres";
            series.dataFields.category = "country";

        });
    };
</script>