<?php
$a = json_decode($data);
$c = 0; //rekap_wali_nasab
$d = 0; //rekap_wali_hakim
$e = 0; //rekap_wali_adhal
$f = 0; //rekap_wali_chairul_adhal
$g = 0; //rekap_wali_campuran
$h = 0; //rekap_poligami_2
$i = 0; //rekap_poligami_3
$j = 0; //rekap_poligami_4
$k = 0; //rekap_bu_pria
$l = 0; //rekap_bu_wanita
$m = 0; //rekap_nikah_dikantor
$n = 0; //rekap_nikah_luar_kantor
$o = 0; //rekap_nikah_bnpb
$p = 0; //rekap_pdd_pria_sd
$q = 0; //rekap_pdd_pria_dibawah_smp
$r = 0; //rekap_pdd_pria_sma
$s = 0; //rekap_pdd_pria_diatas_s1
$t = 0; //rekap_pdd_wanita_sma
$u = 0; //rekap_pdd_wanita_dibawah_smp
$v = 0; //rekap_pdd_wanita_diatas_s1
?>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                Detail <?= $param[4] ?>
            </h5>
        </div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?= base_url('Simpenghulu/Nikah_Rujuk/Provinsi?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[0] . '&b=' . $param[1] . '&c=' . $param[2]))); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">kota/kabupaten</th>
                        <th rowspan="2">nama<br>kua</th>
                        <th rowspan="2">wali<br>nasab</th>
                        <th rowspan="2">wali<br>hakim</th>
                        <th rowspan="2">wali<br>adhal</th>
                        <th rowspan="2">wali<br>chairul adhal</th>
                        <th rowspan="2">wali<br>campuran</th>
                        <th rowspan="2">rekap<br>poligami 2</th>
                        <th rowspan="2">rekap<br>poligami 3</th>
                        <th rowspan="2">rekap<br>poligami 4</th>
                        <th rowspan="2">pria<br>dibawah umur</th>
                        <th rowspan="2">wanita<br>dibawah umur</th>
                        <th rowspan="2">nikah<br>bnpb</th>
                        <th colspan="2">lokasi nikah</th>
                        <th colspan="4">pendidikan pria</th>
                        <th colspan="3">pendidikan wanita</th>
                    </tr>
                    <tr>
                        <th>kua</th>
                        <th>diluar kua</th>
                        <th>sd</th>
                        <th>&le; smp</th>
                        <th>sma</th>
                        <th>&ge; s1</th>
                        <th>sma</th>
                        <th>&le; smp</th>
                        <th>&ge; s1</th>
                    </tr>
                </thead>
                <tbody class="text-center text-uppercase">
                    <?php
                    foreach ($a as $b) {
                        $c += $b->rekap_wali_nasab; //rekap_wali_nasab
                        $d += $b->rekap_wali_hakim; //rekap_wali_hakim
                        $e += $b->rekap_wali_adhal; //rekap_wali_adhal
                        $f += $b->rekap_wali_chairul_adhal; //rekap_wali_chairul_adhal
                        $g += $b->rekap_wali_campuran; //rekap_wali_campuran
                        $h += $b->rekap_poligami_2; //rekap_poligami_2
                        $i += $b->rekap_poligami_3; //rekap_poligami_3
                        $j += $b->rekap_poligami_4; //rekap_poligami_4
                        $k += $b->rekap_bu_pria; //rekap_bu_pria
                        $l += $b->rekap_bu_wanita; //rekap_bu_wanita
                        $m += $b->rekap_nikah_dikantor; //rekap_nikah_dikantor
                        $n += $b->rekap_nikah_luar_kantor; //rekap_nikah_luar_kantor
                        $o += $b->rekap_nikah_bnpb; //rekap_nikah_bnpb
                        $p += $b->rekap_pdd_pria_sd; //rekap_pdd_pria_sd
                        $q += $b->rekap_pdd_pria_dibawah_smp; //rekap_pdd_pria_dibawah_smp
                        $r += $b->rekap_pdd_pria_sma; //rekap_pdd_pria_sma
                        $s += $b->rekap_pdd_pria_diatas_s1; //rekap_pdd_pria_diatas_s1
                        $t += $b->rekap_pdd_wanita_sma; //rekap_pdd_wanita_sma
                        $u += $b->rekap_pdd_wanita_dibawah_smp; //rekap_pdd_wanita_dibawah_smp
                        $v += $b->rekap_pdd_wanita_diatas_s1; //rekap_pdd_wanita_diatas_s1
                        ?>
                        <tr>
                            <td style="text-align:left;"><?= $b->city_title; ?></td>
                            <td style="text-align:left;"><?= $b->kua_title; ?></td>
                            <td><?= number_format($b->rekap_wali_nasab); ?></td>
                            <td><?= number_format($b->rekap_wali_hakim); ?></td>
                            <td><?= number_format($b->rekap_wali_adhal); ?></td>
                            <td><?= number_format($b->rekap_wali_chairul_adhal); ?></td>
                            <td><?= number_format($b->rekap_wali_campuran); ?></td>
                            <td><?= number_format($b->rekap_poligami_2); ?></td>
                            <td><?= number_format($b->rekap_poligami_3); ?></td>
                            <td><?= number_format($b->rekap_poligami_4); ?></td>
                            <td><?= number_format($b->rekap_bu_pria); ?></td>
                            <td><?= number_format($b->rekap_bu_wanita); ?></td>
                            <td><?= number_format($b->rekap_nikah_dikantor); ?></td>
                            <td><?= number_format($b->rekap_nikah_luar_kantor); ?></td>
                            <td><?= number_format($b->rekap_nikah_bnpb); ?></td>
                            <td><?= number_format($b->rekap_pdd_pria_sd); ?></td>
                            <td><?= number_format($b->rekap_pdd_pria_dibawah_smp); ?></td>
                            <td><?= number_format($b->rekap_pdd_pria_sma); ?></td>
                            <td><?= number_format($b->rekap_pdd_pria_diatas_s1); ?></td>
                            <td><?= number_format($b->rekap_pdd_wanita_sma); ?></td>
                            <td><?= number_format($b->rekap_pdd_wanita_dibawah_smp); ?></td>
                            <td><?= number_format($b->rekap_pdd_wanita_diatas_s1); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <td colspan="2">total</td>
                        <td><?= number_format($c); ?></td>
                        <td><?= number_format($d); ?></td>
                        <td><?= number_format($e); ?></td>
                        <td><?= number_format($f); ?></td>
                        <td><?= number_format($g); ?></td>
                        <td><?= number_format($h); ?></td>
                        <td><?= number_format($i); ?></td>
                        <td><?= number_format($j); ?></td>
                        <td><?= number_format($k); ?></td>
                        <td><?= number_format($l); ?></td>
                        <td><?= number_format($m); ?></td>
                        <td><?= number_format($n); ?></td>
                        <td><?= number_format($o); ?></td>
                        <td><?= number_format($p); ?></td>
                        <td><?= number_format($q); ?></td>
                        <td><?= number_format($r); ?></td>
                        <td><?= number_format($s); ?></td>
                        <td><?= number_format($t); ?></td>
                        <td><?= number_format($u); ?></td>
                        <td><?= number_format($v); ?></td>
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
            "processing": false,
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