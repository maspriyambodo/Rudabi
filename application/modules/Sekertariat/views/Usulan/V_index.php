<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Data Usulan Triwulan Tahun {tahun}</h5>
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
                        <th colspan="2">sertifikat</th>
                        <th rowspan="2">KUA</th>
                        <th rowspan="2">lt</th>
                        <th rowspan="2">tanah<br>kosong</th>
                        <th rowspan="2">perluasan<br>bangunan</th>
                        <th rowspan="2">dipa</th>
                    </tr>
                    <tr>
                        <th>kemenag</th>
                        <th>balik<br>nama</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $usulan = json_decode($data);
                    $totjum_data = 0;
                    $totsert_kemanag = 0;
                    $totsert_baliknama = 0;
                    $totjum_kua = 0;
                    $totluas_tanah = 0;
                    $tottanah_kosong = 0;
                    $totperluasan_bangunan = 0;
                    $totnilai_dipa = 0;
                    foreach ($usulan as $value) {
                        ?>
                        <tr>
                            <td>
                                <?php
                                $url = str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt($tahun . '/' . $value->usul_propinsi . '/' . $value->propinsi_nama));
                                echo '<a href=' . base_url('Sekertariat/Usulan/Provinsi/' . $url . '') . '>' . $value->propinsi_nama . '</a>';
                                ?>
                            </td>
                            <td class="text-center jum_data">
                                <?php
                                $jum_data = str_replace(',', '', $value->jum_data);
                                $totjum_data += $jum_data;
                                echo number_format($jum_data);
                                ?>
                            </td>
                            <td class="text-center sert_kemanag">
                                <?php
                                $sert_kemanag = str_replace(',', '', $value->sert_kemanag);
                                $totsert_kemanag += $sert_kemanag;
                                echo number_format($sert_kemanag);
                                ?>
                            </td>
                            <td class="text-center sert_baliknama">
                                <?php
                                $sert_baliknama = str_replace(',', '', $value->sert_baliknama);
                                $totsert_baliknama += $sert_baliknama;
                                echo number_format($sert_baliknama);
                                ?>
                            </td>
                            <td class="text-center jum_kua">
                                <?php
                                $jum_kua = str_replace(',', '', $value->jum_kua);
                                $totjum_kua += $jum_data;
                                echo number_format($jum_kua);
                                ?>
                            </td>
                            <td class="text-center luas_tanah">
                                <?php
                                $luas_tanah = str_replace(',', '', $value->luas_tanah);
                                $totluas_tanah += $luas_tanah;
                                echo number_format($luas_tanah);
                                ?>
                            </td>
                            <td class="text-center tanah_kosong">
                                <?php
                                $tanah_kosong = str_replace(',', '', $value->tanah_kosong);
                                $tottanah_kosong += $tanah_kosong;
                                echo number_format($tanah_kosong);
                                ?>
                            </td>
                            <td class="text-center perluasan_bangunan">
                                <?php
                                $perluasan_bangunan = str_replace(',', '', $value->perluasan_bangunan);
                                $totperluasan_bangunan += $perluasan_bangunan;
                                echo number_format($perluasan_bangunan);
                                ?>
                            </td>
                            <td class="text-center nilai_dipa">
                                <?php
                                $dipa = str_replace(',', '', $value->nilai_dipa);
                                $totnilai_dipa += $dipa;
                                echo number_format($dipa);
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>jumlah</th>
                        <th><?= number_format($totjum_data); ?></th>
                        <th><?= number_format($totsert_kemanag); ?></th>
                        <th><?= number_format($totsert_baliknama); ?></th>
                        <th><?= number_format($totjum_kua); ?></th>
                        <th><?= number_format($totluas_tanah); ?></th>
                        <th><?= number_format($tottanah_kosong); ?></th>
                        <th><?= number_format($totperluasan_bangunan); ?></th>
                        <th><?= number_format($totnilai_dipa); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
    function Tahun() {
        var a = $('select[name=tahun]').val();
        return window.location.href = "Sekertariat/Usulan/index/" + a;
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
    };
</script>