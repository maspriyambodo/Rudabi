<div class="card" style="margin-top: -4%;">
    <div class="position-absolute w-100 h-50 rounded-card-top bg-dark"></div>
    <div class="card-body position-relative">
        <h2 class="7 text-white text-center my-10"><b>DIREKTORAT</b><br>Pemberdayaan Zakat &amp; Wakaf</h2>
        <div class="card-body bg-white col-11 col-lg-12 col-xxl-10 mx-auto">
            <div class="row">
                <div class="col">
                    <a href="<?php echo base_url('Users/Wakaf/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-hand-holding-heart" style="font-size: 48px;color: white;"></i>
                                <b style="font-size: 30px;color: white;margin-left: 10px;">
                                    <?php echo number_format($total['simas'][0]->data_masjid); ?>
                                </b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">
                                Total Data Wakaf
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="javascript:void(0)" class="card card-custom bg-info bg-hover-state-info card-stretch gutter-b">
                        <div class="card-body text-center">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <b style="font-size: 30px;color: white;">
                                    <?php echo number_format($total['tipo_masjid'][2]->total); ?>
                                </b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">
                                Luas Tanah Wakaf (HA)
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="javascript:void(0)" class="card card-custom bg-info bg-hover-state-info card-stretch gutter-b">
                        <div class="card-body text-center">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <b style="font-size: 30px;color: white;">
                                    <?php echo number_format($total['tipo_masjid'][1]->total); ?>
                                </b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">
                                Sudah Sertifikat
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="javascript:void(0)" class="card card-custom bg-info bg-hover-state-info card-stretch gutter-b">
                        <div class="card-body text-center">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <b style="font-size: 30px;color: white;">
                                    <?php echo number_format($total['tipo_masjid'][3]->total); ?>
                                </b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">
                                Belum Sertifikat
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
