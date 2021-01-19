<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-uppercase">Dashboard Urusan Agama Islam &amp; Binsyar</h5>
        </div>
    </div>
</div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-body">
        <div class="row">
            <div class="col bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
                <a href="<?php echo base_url('Users/Binsyar/Sihat/index/'); ?>" class="text-warning font-weight-bold font-size-h6">
                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                        <i class="fas fa-tools" style="font-size: 48px;"></i><b style="font-size: 30px;margin-left: 10px;"><?php echo number_format($total['sihat'][0]->alat_hisab_rukyat); ?></b>
                    </span>
                    Alat Hisab Rukyat
                </a>
            </div>

            <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
                <a href="<?php echo base_url('Users/Binsyar/Ahli/index/'); ?>" class="text-warning font-weight-bold font-size-h6">
                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                        <i class="fas fa-user-tie" style="font-size: 48px;"></i><b style="font-size: 30px;margin-left: 10px;"><?php echo number_format($total['sihat'][1]->tenaga_ahli); ?></b>
                    </span>
                    Tenaga Ahli
                </a>
            </div>

            <div class="col bg-light-success px-6 py-8 rounded-xl mr-7 mb-7">
                <a href="<?php echo base_url('Users/Binsyar/Pengukuran/index/'); ?>" class="text-warning font-weight-bold font-size-h6">
                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                        <i class="fas fa-ruler-combined" style="font-size: 48px;"></i><b style="font-size: 30px;margin-left: 10px;"><?php echo number_format($total['sihat'][2]->hisab_pengukuran); ?></b>
                    </span>
                    Hisab Pengukuran
                </a>
            </div>

            <div class="col bg-light-danger px-6 py-8 rounded-xl mr-7 mb-7">
                <a href="<?php echo base_url('Users/Binsyar/Lokasi/index/'); ?>" class="text-warning font-weight-bold font-size-h6">
                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                        <i class="fas fa-map-marked-alt" style="font-size: 48px;"></i><b style="font-size: 30px;margin-left: 10px;"><?php echo number_format($total['sihat'][3]->total); ?></b>
                    </span>
                    Hisab Lokasi
                </a>
            </div>

            <div class="col bg-light-danger px-6 py-8 rounded-xl mr-7 mb-7">
                <a href="<?php echo base_url('Users/Binsyar/Laporan/index/'); ?>" class="text-warning font-weight-bold font-size-h6">
                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                        <i class="fas fa-file" style="font-size: 48px;"></i><b style="font-size: 30px;margin-left: 10px;"><?php echo number_format($total['sihat'][4]->hisab_laporan); ?></b>
                    </span>
                    Hisab Laporan
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col bg-light-danger px-6 py-8 rounded-xl mr-7 mb-7">
                <a href="<?php echo base_url('Users/Binsyar/Lintang/index/'); ?>" class="text-warning font-weight-bold font-size-h6">
                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                        <i class="far fa-compass" style="font-size: 48px;"></i><b style="font-size: 30px;margin-left: 10px;"><?php echo number_format($total['sihat'][5]->lintang_kota); ?></b>
                    </span>
                    Lintang Kota
                </a>
            </div>

            <div class="col bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
                <a href="<?php echo base_url('Users/Binsyar/Simas/index/'); ?>" class="text-warning font-weight-bold font-size-h6">
                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                        <i class="fas fa-mosque" style="font-size: 48px;"></i><b style="font-size: 30px;margin-left: 10px;"><?php echo number_format($total['simas'][0]->data_masjid); ?></b>
                    </span>
                    Data Masjid
                </a>
            </div>

            <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
                <a href="<?php echo base_url('Users/Binsyar/Mushalla/index/'); ?>" class="text-warning font-weight-bold font-size-h6">
                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                        <i class="fas fa-place-of-worship" style="font-size: 48px;"></i><b style="font-size: 30px;margin-left: 10px;"><?php echo number_format($total['simas'][1]->data_mushalla); ?></b>
                    </span>
                    Data Mushalla
                </a>
            </div>

            <div class="col bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
                <a href="<?php echo base_url('Users/Binsyar/Tipologi/index/'); ?>" class="text-warning font-weight-bold font-size-h6">
                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                        <i class="fas fa-building" style="font-size: 48px;"></i><b style="font-size: 30px;margin-left: 10px;"><?php echo number_format($total['simas'][2]->masjid_tipologi); ?></b>
                    </span>
                    Masjid Tipologi
                </a>
            </div>

            <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
                <a href="<?php echo base_url('Users/Binsyar/Tipologi/Mushalla/'); ?>" class="text-warning font-weight-bold font-size-h6">
                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                        <i class="far fa-building" style="font-size: 48px;"></i><b style="font-size: 30px;margin-left: 10px;"><?php echo number_format($total['simas'][3]->mushalla_tipologi); ?></b>
                    </span>
                    Mushalla Tipologi
                </a>
            </div>
        </div>
    </div>
</div>