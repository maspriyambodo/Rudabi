<?php
$pegawai = json_decode($data);
?>
<style type="text/css">
    #peg_detail{
        margin-top: 5px;margin-bottom: 5px;
    }
</style>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Data Pegawai <?= $param[1]; ?></h5>
        </div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?= base_url('Users/Sekertariat/Pegawai/Kabupaten?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . $param[2] . '&b=' . $param[3] . '&c=' . $param[4] . '&d=' . $param[5]))); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <b class="text-info"><u>Data Diri</u></b>
        <div class="clear" style="margin:10px 0px;"></div>
        <div class="row">
            <div id="peg_detail" class="col-md-2">
                <strong>NIP</strong>
            </div>
            <div class="col-md-4">: <?= $pegawai->biodata[0]->nip; ?></div>
            <div id="peg_detail" class="col-md-2">
                <strong>Provinsi</strong>
            </div>
            <div class="col-md-4">: <?= $pegawai->biodata[0]->propinsi; ?></div>
        </div>
        <div class="row">
            <div id="peg_detail" class="col-md-2">
                <strong>Nama</strong>
            </div>
            <div class="col-md-4">: <?= $pegawai->biodata[0]->nama; ?></div>
            <div id="peg_detail" class="col-md-2">
                <strong>Kabupaten</strong>
            </div>
            <div class="col-md-4">: <?= $pegawai->biodata[0]->kabupaten; ?></div>
        </div>
        <div class="row">
            <div id="peg_detail" class="col-md-2">
                <strong>Jenis Kelamin</strong>
            </div>
            <div class="col-md-4">: <?= $pegawai->biodata[0]->kelamin; ?></div>
            <div id="peg_detail" class="col-md-2">
                <strong>Kecamatan</strong>
            </div>
            <div class="col-md-4">: <?= $pegawai->biodata[0]->kecamatan; ?></div>
        </div>
        <div class="row">
            <div id="peg_detail" class="col-md-2">
                <strong>Tempat, Tanggal Lahir</strong>
            </div>
            <div class="col-md-4">: <?= $pegawai->biodata[0]->peg_tempat_lahir . ', ' . $pegawai->biodata[0]->peg_tgl_lahir; ?></div>
            <div id="peg_detail" class="col-md-2">
                <strong>Kelurahan</strong>
            </div>
            <div class="col-md-4">: <?= $pegawai->biodata[0]->kelurahan; ?></div>
        </div>
        <div class="row">
            <div id="peg_detail" class="col-md-2">
                <strong>Agama</strong>
            </div>
            <div class="col-md-4">: <?= $pegawai->biodata[0]->agama; ?></div>
            <div id="peg_detail" class="col-md-2">
                <strong>Kodepos</strong>
            </div>
            <div class="col-md-4">: <?= $pegawai->biodata[0]->kodpos; ?></div>
        </div>
        <div class="row">
            <div id="peg_detail" class="col-md-2">
                <strong>Hobi</strong>
            </div>
            <div class="col-md-4">: <?= $pegawai->biodata[0]->hobi; ?></div>
        </div>
        <hr>
        <b class="text-info"><u>Ciri - Ciri</u></b>
        <div class="clear" style="margin:10px 0px;"></div>
        <div class="row">
            <div id="peg_detail" class="col-md-2">
                <strong>Tinggi Badan</strong>
            </div>
            <div class="col-md-4">: <?= $pegawai->biodata[0]->tinggi; ?></div>
            <div id="peg_detail" class="col-md-2">
                <strong>Berat Badan</strong>
            </div>
            <div class="col-md-4">: <?= $pegawai->biodata[0]->berat; ?></div>
        </div>
        <div class="row">
            <div id="peg_detail" class="col-md-2">
                <strong>Rambut</strong>
            </div>
            <div class="col-md-4">: <?= $pegawai->biodata[0]->rambut; ?></div>
            <div id="peg_detail" class="col-md-2">
                <strong>Muka</strong>
            </div>
            <div class="col-md-4">: <?= $pegawai->biodata[0]->muka; ?></div>
        </div>
        <div class="row">
            <div id="peg_detail" class="col-md-2">
                <strong>Kulit</strong>
            </div>
            <div class="col-md-4">: <?= $pegawai->biodata[0]->kulit; ?></div>
            <div id="peg_detail" class="col-md-2">
                <strong>Tanda Khusus</strong>
            </div>
            <div class="col-md-4">: <?= $pegawai->biodata[0]->ciri2; ?></div>
        </div>
        <div class="row">
            <div id="peg_detail" class="col-md-2">
                <strong>Cacat</strong>
            </div>
            <div class="col-md-4">: <?= $pegawai->biodata[0]->cacat; ?></div>
        </div>
    </div>
</div>
<div style="clear:both;margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            Data Pendidikan
        </div>
    </div>
    <div class="card-body">
        <b class="text-info"><u>Pendidikan Formal</u></b>
        <?php foreach ($pegawai->pendidikan as $pdd) { ?>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Tingkat</strong>
                </div>
                <div class="col-md-4">: <?= $pdd->pdd_tingkat; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Nama</strong>
                </div>
                <div class="col-md-4">: <?= $pdd->pdd_nama; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Fakultas</strong>
                </div>
                <div class="col-md-4">: <?= $pdd->pdd_fakultas; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Jurusan</strong>
                </div>
                <div class="col-md-4">: <?= $pdd->pdd_jurusan; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Tempat</strong>
                </div>
                <div class="col-md-4">: <?= $pdd->pdd_tempat; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Tahun Lulus</strong>
                </div>
                <div class="col-md-4">: <?= $pdd->pdd_tahun_lulus; ?></div>
            </div>
            <hr>
        <?php } ?>
        <hr>
        <b class="text-info"><u>Pendidikan Lainnya</u></b>
        <?php foreach ($pegawai->kursus as $kursus) { ?>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Nama</strong>
                </div>
                <div class="col-md-4">: <?= $kursus->kur_nama; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Periode</strong>
                </div>
                <div class="col-md-4">: <?= $kursus->kur_periode; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Jam</strong>
                </div>
                <div class="col-md-4">: <?= $kursus->kur_jam; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Hari</strong>
                </div>
                <div class="col-md-4">: <?= $kursus->kur_hari; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Bulan</strong>
                </div>
                <div class="col-md-4">: <?= $kursus->kur_bulan; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Tahun</strong>
                </div>
                <div class="col-md-4">: <?= $kursus->kur_tahun; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Tempat</strong>
                </div>
                <div class="col-md-4">: <?= $kursus->kur_tempat; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Penyelenggara</strong>
                </div>
                <div class="col-md-4">: <?= $kursus->kur_penyelenggara; ?></div>
            </div>
            <hr>
        <?php } ?>
    </div>
</div>
<div style="clear:both;margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            Data Kepangkatan
        </div>
    </div>
    <div class="card-body">
        <?php foreach ($pegawai->kepangkatan as $kepangkatan) { ?>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Jenis SK</strong>
                </div>
                <div class="col-md-4">: <?= $kepangkatan->pkt_jenis_sk; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Pangkat</strong>
                </div>
                <div class="col-md-4">: <?= $kepangkatan->pkt_pangkat; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Golongan</strong>
                </div>
                <div class="col-md-4">: <?= $kepangkatan->pkt_gol; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>No SK</strong>
                </div>
                <div class="col-md-4">: <?= $kepangkatan->pkt_no_sk; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Akte</strong>
                </div>
                <div class="col-md-4">: <?= $kepangkatan->pkt_akte; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Tgl SK</strong>
                </div>
                <div class="col-md-4">: <?= $kepangkatan->pkt_tgl_sk; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>TMT SK</strong>
                </div>
                <div class="col-md-4">: <?= $kepangkatan->pkt_tmt_sk; ?></div>
            </div>
            <hr>
        <?php } ?>
    </div>
</div>
<div style="clear:both;margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            Data Jabatan
        </div>
    </div>
    <div class="card-body">
        <?php foreach ($pegawai->jabatan as $jabatan) { ?>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Nama Jabatan</strong>
                </div>
                <div class="col-md-4">: <?= $jabatan->jbt_jabatan; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>TMT Jabatan</strong>
                </div>
                <div class="col-md-4">: <?= $jabatan->jbt_tmt; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Golongan</strong>
                </div>
                <div class="col-md-4">: <?= $jabatan->jbt_gol; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Tunjangan</strong>
                </div>
                <div class="col-md-4">: <?= $jabatan->jbt_tunjangan; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>SKEP</strong>
                </div>
                <div class="col-md-4">: <?= $jabatan->jbt_surat_kep; ?></div>
            </div>
            <hr>
        <?php } ?>
    </div>
</div>
<div class="clear" style="clear:both;margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            Data Tanda Jasa
        </div>
    </div>
    <div class="card-body">
        <?php foreach ($pegawai->tanda_jasa as $tanda_jasa) { ?>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Nama</strong>
                </div>
                <div class="col-md-4">: <?= $tanda_jasa->tnj_nama; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Penerbit</strong>
                </div>
                <div class="col-md-4">: <?= $tanda_jasa->tnj_pemberi; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Tahun</strong>
                </div>
                <div class="col-md-4">: <?= $tanda_jasa->tnj_tahun; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Catatan</strong>
                </div>
                <div class="col-md-4">: <?= $tanda_jasa->tnj_note; ?></div>
            </div>
            <hr>
        <?php } ?>
    </div>
</div>
<div class="clear" style="clear: both;margin: 5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            Kegiatan Kunjungan
        </div>
    </div>
    <div class="card-body">
        <?php foreach ($pegawai->kunjungan as $kunjungan) { ?>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Negara</strong>
                </div>
                <div class="col-md-4">: <?= $kunjungan->ln_negara; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Tahun</strong>
                </div>
                <div class="col-md-4">: <?= $kunjungan->ln_tahun; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Lama</strong>
                </div>
                <div class="col-md-4">: <?= $kunjungan->ln_lama; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Biaya</strong>
                </div>
                <div class="col-md-4">: <?= $kunjungan->ln_pembiaya; ?></div>
            </div>
            <hr>
        <?php } ?>
    </div>
</div>
<div class="clear" style="clear:both;margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            Data Mengajar
        </div>
    </div>
    <div class="card-body">
        <?php foreach ($pegawai->mengajar as $mengajar) { ?>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Mata Kuliah</strong>
                </div>
                <div class="col-md-4">: <?= $mengajar->ngjr_matkul; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Jenjang</strong>
                </div>
                <div class="col-md-4">: <?= $mengajar->ngjr_jenjang; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Jurusan</strong>
                </div>
                <div class="col-md-4">: <?= $mengajar->ngjr_jurusan; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Periode</strong>
                </div>
                <div class="col-md-4">: <?= $mengajar->ngjr_periode; ?></div>
            </div>
            <hr>
        <?php } ?>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            Data Seminar
        </div>
    </div>
    <div class="card-body">
        <?php foreach ($pegawai->seminar as $seminar) { ?>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Tahun</strong>
                </div>
                <div class="col-md-4">: <?= $seminar->smnr_tahun; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Judul</strong>
                </div>
                <div class="col-md-4">: <?= $seminar->smnr_judul; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Penyelenggara</strong>
                </div>
                <div class="col-md-4">: <?= $seminar->smnr_penyelenggara; ?></div>
            </div>
            <hr>
        <?php } ?>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            Pengabdian Masyarakat
        </div>
    </div>
    <div class="card-body">
        <?php foreach ($pegawai->abmas as $abmas) { ?>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Tahun</strong>
                </div>
                <div class="col-md-4">: <?= $abmas->abmas_tahun; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Kegiatan</strong>
                </div>
                <div class="col-md-4">: <?= $abmas->abmas_kegiatan; ?></div>
            </div>
            <hr>
        <?php } ?>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            Bimbingan Masyarakat
        </div>
    </div>
    <div class="card-body">
        <?php foreach ($pegawai->bimas as $bimas) { ?>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Tahun</strong>
                </div>
                <div class="col-md-4">: <?= $bimas->bimas_tahun; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Kegiatan</strong>
                </div>
                <div class="col-md-4">: <?= $bimas->bimas_pembimbingan; ?></div>
            </div>
            <hr>
        <?php } ?>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            Data Pasangan
        </div>
    </div>
    <div class="card-body">
        <?php foreach ($pegawai->pasangan as $pasangan) { ?>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Nama</strong>
                </div>
                <div class="col-md-4">: <?= $pasangan->psg_nama; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Tempat, Tanggal Lahir</strong>
                </div>
                <div class="col-md-4">: <?= $pasangan->psg_tmpt_lahir . ', ' . $pasangan->psg_tgl_lahir; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Tanggal Nikah</strong>
                </div>
                <div class="col-md-4">: <?= $pasangan->psg_tgl_nikah; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Pekerjaan</strong>
                </div>
                <div class="col-md-4">: <?= $pasangan->psg_pekerjaan; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Keterangan</strong>
                </div>
                <div class="col-md-4">: <?= $pasangan->psg_keterangan; ?></div>
            </div>
            <hr>
        <?php } ?>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            Data Anak
        </div>
    </div>
    <div class="card-body">
        <?php foreach ($pegawai->anak as $anak) { ?>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Nama</strong>
                </div>
                <div class="col-md-4">: <?= $anak->anak_nama; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Jenis Kelamin</strong>
                </div>
                <div class="col-md-4">: <?= $anak->anak_jenkel; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Tempat Lahir</strong>
                </div>
                <div class="col-md-4">: <?= $anak->anak_tmpt_lahir; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Status Anak</strong>
                </div>
                <div class="col-md-4">: <?= $anak->anak_status; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Pekerjaan</strong>
                </div>
                <div class="col-md-4">: <?= $anak->anak_pekerjaan; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Keterangan</strong>
                </div>
                <div class="col-md-4">: <?= $anak->anak_keterangan; ?></div>
            </div>
            <hr>
        <?php } ?>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            Data Orang Tua
        </div>
    </div>
    <div class="card-body">
        <?php foreach ($pegawai->orang_tua as $orang_tua) { ?>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Nama</strong>
                </div>
                <div class="col-md-4">: <?= $orang_tua->ortu_nama; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Tanggal Lahir</strong>
                </div>
                <div class="col-md-4">: <?= $orang_tua->ortu_tgl_lahir; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Pekerjaan</strong>
                </div>
                <div class="col-md-4">: <?= $orang_tua->ortu_pekerjaan; ?></div>
            </div>
            <hr>
        <?php } ?>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            Data Mertua
        </div>
    </div>
    <div class="card-body">
        <?php foreach ($pegawai->mertua as $mertua) { ?>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Nama</strong>
                </div>
                <div class="col-md-4">: <?= $mertua->mert_nama; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Tanggal Lahir</strong>
                </div>
                <div class="col-md-4">: <?= $mertua->mert_tgl_lahir; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Pekerjaan</strong>
                </div>
                <div class="col-md-4">: <?= $mertua->mert_pekerjaan; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Keterangan</strong>
                </div>
                <div class="col-md-4">: <?= $mertua->mert_keterangan; ?></div>
            </div>
            <hr>
        <?php } ?>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            Data Saudara Kandung
        </div>
    </div>
    <div class="card-body">
        <?php foreach ($pegawai->saudara_kandung as $saudara_kandung) { ?>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Nama</strong>
                </div>
                <div class="col-md-4">: <?= $saudara_kandung->sdr_nama; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Jenis Kelamin</strong>
                </div>
                <div class="col-md-4">: <?= $saudara_kandung->sdr_jenkel; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Tanggal Lahir</strong>
                </div>
                <div class="col-md-4">: <?= $saudara_kandung->sdr_tgl_lahir; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Pekerjaan</strong>
                </div>
                <div class="col-md-4">: <?= $saudara_kandung->sdr_pekerjaan; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Keterangan</strong>
                </div>
                <div class="col-md-4">: <?= $saudara_kandung->sdr_keterangan; ?></div>
            </div>
            <hr>
        <?php } ?>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            Organisasi Pendidikan Pada SLTA ke Bawah
        </div>
    </div>
    <div class="card-body">
        <?php foreach ($pegawai->slta as $slta) { ?>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Nama</strong>
                </div>
                <div class="col-md-4">: <?= $slta->slta_nama; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Kedudukan</strong>
                </div>
                <div class="col-md-4">: <?= $slta->slta_kedudukan; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Periode</strong>
                </div>
                <div class="col-md-4">: <?= $slta->slta_periode; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Tempat</strong>
                </div>
                <div class="col-md-4">: <?= $slta->slta_tempat; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Kepala Sekolah</strong>
                </div>
                <div class="col-md-4">: <?= $slta->slta_nama_pimpinan; ?></div>
            </div>
            <hr>
        <?php } ?>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            Data Kampus
        </div>
    </div>
    <div class="card-body">
        <?php foreach ($pegawai->kampus as $kampus) { ?>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Nama Kampus</strong>
                </div>
                <div class="col-md-4">: <?= $kampus->kmps_nama; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Tempat</strong>
                </div>
                <div class="col-md-4">: <?= $kampus->kmps_kedudukan; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Periode</strong>
                </div>
                <div class="col-md-4">: <?= $kampus->kmps_periode; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Tempat</strong>
                </div>
                <div class="col-md-4">: <?= $kampus->kmps_tempat; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Pimpinan</strong>
                </div>
                <div class="col-md-4">: <?= $kampus->kmps_nama_pimpinan; ?></div>
            </div>
        <?php } ?>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            Data Karya Ilmiah
        </div>
    </div>
    <div class="card-body">
        <b class="text-info"><u>Penelitian</u></b>
        <?php foreach ($pegawai->penelitian as $penelitian) { ?>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Tahun Penelitian</strong>
                </div>
                <div class="col-md-4">: <?= $penelitian->pen_tahun; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Judul Penelitian</strong>
                </div>
                <div class="col-md-4">: <?= $penelitian->pen_judul; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Jabatan Penelitian</strong>
                </div>
                <div class="col-md-4">: <?= $penelitian->pen_jabatan; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Sumber Dana</strong>
                </div>
                <div class="col-md-4">: <?= $penelitian->pen_sumber_dana; ?></div>
            </div>
            <hr>
        <?php } ?>
        <b class="text-info"><u>Buku</u></b>
        <?php foreach ($pegawai->buku as $buku) { ?>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Tahun Terbit</strong>
                </div>
                <div class="col-md-4">: <?= $buku->buku_tahun; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Judul Penelitian</strong>
                </div>
                <div class="col-md-4">: <?= $buku->buku_judul; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Penerbit</strong>
                </div>
                <div class="col-md-4">: <?= $buku->buku_penyelenggara; ?></div>
            </div>
            <hr>
        <?php } ?>
        <b class="text-info"><u>Makalah</u></b>
        <?php foreach ($pegawai->makalah as $makalah) { ?>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Tahun</strong>
                </div>
                <div class="col-md-4">: <?= $makalah->mkl_tahun; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Judul Penelitian</strong>
                </div>
                <div class="col-md-4">: <?= $makalah->mkl_judul; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Penyelenggara</strong>
                </div>
                <div class="col-md-4">: <?= $makalah->mkl_penyelenggara; ?></div>
            </div>
            <hr>
        <?php } ?>
        <b class="text-info"><u>Makalah</u></b>
        <?php foreach ($pegawai->resensi as $resensi) { ?>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Tahun</strong>
                </div>
                <div class="col-md-4">: <?= $resensi->res_tahun; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Judul Resensi</strong>
                </div>
                <div class="col-md-4">: <?= $resensi->res_judul; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Penyelenggara</strong>
                </div>
                <div class="col-md-4">: <?= $resensi->res_penyelenggara; ?></div>
            </div>
            <hr>
        <?php } ?>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            Kenaikan Gaji Berkala
        </div>
    </div>
    <div class="card-body">
        <?php foreach ($pegawai->kgb as $kgb) { ?>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Golongan</strong>
                </div>
                <div class="col-md-4">: <?= $kgb->kgb_gol; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>No SK</strong>
                </div>
                <div class="col-md-4">: <?= $kgb->kgb_no_sk; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Tanggal SK</strong>
                </div>
                <div class="col-md-4">: <?= $kgb->kgb_tgl_sk; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>TMT SK</strong>
                </div>
                <div class="col-md-4">: <?= $kgb->kgb_tmt_sk; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>MK Tahun</strong>
                </div>
                <div class="col-md-4">: <?= $kgb->kgb_mk_tahun; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>MK Bulan</strong>
                </div>
                <div class="col-md-4">: <?= $kgb->kgb_mk_bulan; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Keterangan</strong>
                </div>
                <div class="col-md-4">: <?= $kgb->kgb_ket; ?></div>
            </div>
            <hr>
        <?php } ?>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            Nomor Kepegawaian
        </div>
    </div>
    <div class="card-body">
        <?php foreach ($pegawai->nomor as $nomor) { ?>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Nomor Karpeg</strong>
                </div>
                <div class="col-md-4">: <?= $nomor->nmr_karpeg; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Nomor Karis</strong>
                </div>
                <div class="col-md-4">: <?= $nomor->nmr_karis; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Nomor KPE</strong>
                </div>
                <div class="col-md-4">: <?= $nomor->nmr_kpe; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>Nomor Taspen</strong>
                </div>
                <div class="col-md-4">: <?= $nomor->nmr_taspen; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>Nomor Askes</strong>
                </div>
                <div class="col-md-4">: <?= $nomor->nmr_askes; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>NUPTK</strong>
                </div>
                <div class="col-md-4">: <?= $nomor->nmr_nuptk; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>NIDN</strong>
                </div>
                <div class="col-md-4">: <?= $nomor->nmr_nidn; ?></div>
                <div id="peg_detail" class="col-md-2">
                    <strong>KTP</strong>
                </div>
                <div class="col-md-4">: <?= $nomor->nmr_ktp; ?></div>
            </div>
            <div class="row">
                <div id="peg_detail" class="col-md-2">
                    <strong>NPWP</strong>
                </div>
                <div class="col-md-4">: <?= $nomor->nmr_npwp; ?></div>
            </div>
        <?php } ?>
    </div>
</div>