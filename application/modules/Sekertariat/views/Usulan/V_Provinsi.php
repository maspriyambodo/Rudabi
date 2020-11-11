<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-uppercase">Data Usulan provinsi {provinsi} Tahun {tahun}</h5>
        </div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <?php $url = str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt($tahun)); ?>
            <a href="<?= base_url('Sekertariat/Usulan/index/' . $url . ''); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <p <?= $hide; ?>>{msg}</p>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-uppercase text-center">
                    <tr>
                        <th rowspan="2">kota/kabupaten</th>
                        <th rowspan="2">jumlah<br>data</th>
                        <th colspan="2">sertifikat</th>
                        <th rowspan="2">jumlah<br>kua</th>
                        <th rowspan="2">luas<br>tanah</th>
                        <th rowspan="2">penghapusan<br>gedung</th>
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
                    $totpenghapusan_gedung = 0;
                    $tottanah_kosong = 0;
                    $totperluasan_bangunan = 0;
                    $totnilai_dipa = 0;
                    foreach ($usulan as $usulan) {
                        ?>
                        <tr>
                            <td>
                                <?php
                                $kab_nama = str_replace('Kab.', '', $usulan->kab_nama);
                                echo $kab_nama;
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $jum_data = str_replace(',', '', $usulan->jum_data);
                                $totjum_data += $jum_data;
                                echo number_format($jum_data);
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $sert_kemanag = str_replace(',', '', $usulan->sert_kemanag);
                                $totsert_kemanag += $sert_kemanag;
                                echo number_format($sert_kemanag);
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $sert_baliknama = str_replace(',', '', $usulan->sert_baliknama);
                                $totsert_baliknama += $sert_baliknama;
                                echo number_format($sert_baliknama);
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $jum_kua = str_replace(',', '', $usulan->jum_kua);
                                $totjum_kua += $jum_kua;
                                echo number_format($jum_kua);
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $luas_tanah = str_replace(',', '', $usulan->luas_tanah);
                                $totluas_tanah += $luas_tanah;
                                echo number_format($luas_tanah);
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $penghapusan_gedung = str_replace(',', '', $usulan->penghapusan_gedung);
                                $totpenghapusan_gedung += $penghapusan_gedung;
                                echo number_format($penghapusan_gedung);
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $tanah_kosong = str_replace(',', '', $usulan->tanah_kosong);
                                $tottanah_kosong += $tanah_kosong;
                                echo number_format($tanah_kosong);
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $perluasan_bangunan = str_replace(',', '', $usulan->perluasan_bangunan);
                                $totperluasan_bangunan += $perluasan_bangunan;
                                echo number_format($perluasan_bangunan);
                                ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $nilai_dipa= str_replace(',', '', $usulan->nilai_dipa);
                                $totnilai_dipa += $nilai_dipa;
                                echo number_format($nilai_dipa);
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>jumlah</th>
                        <th>
                            <?= number_format($totjum_data); ?>
                        </th>
                        <th><?= number_format($totsert_kemanag); ?></th>
                        <th><?= number_format($totsert_baliknama); ?></th>
                        <th><?= number_format($totjum_kua); ?></th>
                        <th><?= number_format($totluas_tanah); ?></th>
                        <th><?= number_format($totpenghapusan_gedung); ?></th>
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
                {extend: 'print', footer: true},
                {extend: 'copyHtml5', footer: true},
                {extend: 'excelHtml5', footer: true},
                {extend: 'csvHtml5', footer: true},
                {extend: 'pdfHtml5', footer: true}
            ]
        });
    };
</script>