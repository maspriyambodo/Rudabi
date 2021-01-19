<div class="card" style="margin-top: -5%;">
    <div class="position-absolute w-100 h-50 rounded-card-top" style="background-color: #86a221;"></div>
    <div class="card-body position-relative">
        <h3 class="7 text-white text-center my-10 my-lg-15">DIREKTORAT<br>Urusan Agama Islam &amp; Pembinaan Syariah</h3>
        <div class="card-body bg-white col-11 col-lg-12 col-xxl-10 mx-auto">
            <div class="row">
                <div class="col">
                    <div class="pt-30 pt-md-25 pb-15 px-5 text-center">
                        <div class="d-flex flex-center position-relative mb-25">
                            <span class="svg svg-fill-primary opacity-4 position-absolute">
                                <svg width="175" height="200"><polyline points="87,0 174,50 174,150 87,200 0,150 0,50 87,0"></polyline></svg>
                            </span>
                            <span class="svg-icon svg-icon-5x svg-icon-primary">
                                <i class="fas fa-tools" style="font-size: 48px;color:#86a221 !important;"></i>
                            </span>
                        </div>
                        <h4 class="mb-10">Alat Hisab Rukyat</h4>
                        <span class="font-size-h1 d-block font-weight-boldest text-dark">
                            <?php echo number_format($total['sihat'][0]->alat_hisab_rukyat); ?>
                        </span>
                    </div>
                    <div class="text-center">
                        <a href="<?php echo base_url('Users/Binsyar/Sihat/index/'); ?>" class="btn btn-primary text-uppercase font-weight-bolder px-15 py-3">Detail</a>
                    </div>
                </div>

                <div class="col border-x-md">
                    <div class="pt-30 pt-md-25 pb-15 px-5 text-center">
                        <div class="d-flex flex-center position-relative mb-25">
                            <span class="svg svg-fill-primary opacity-4 position-absolute">
                                <svg width="175" height="200"><polyline points="87,0 174,50 174,150 87,200 0,150 0,50 87,0"></polyline></svg>
                            </span>
                            <span class="svg-icon svg-icon-5x svg-icon-primary">
                                <i class="fas fa-user-tie" style="font-size: 48px;color:#86a221 !important;"></i>
                            </span>
                        </div>
                        <h4 class="mb-10">Tenaga Ahli</h4>
                        <span class="font-size-h1 d-block font-weight-boldest text-dark">
                            <?php echo number_format($total['sihat'][1]->tenaga_ahli); ?>
                        </span>
                    </div>
                    <div class="text-center">
                        <a href="<?php echo base_url('Users/Binsyar/Ahli/index/'); ?>" class="btn btn-primary text-uppercase font-weight-bolder px-15 py-3">Detail</a>
                    </div>
                </div>

                <div class="col">
                    <div class="pt-30 pt-md-25 pb-15 px-5 text-center">
                        <div class="d-flex flex-center position-relative mb-25">
                            <span class="svg svg-fill-primary opacity-4 position-absolute">
                                <svg width="175" height="200"><polyline points="87,0 174,50 174,150 87,200 0,150 0,50 87,0"></polyline></svg>
                            </span>
                            <span class="svg-icon svg-icon-5x svg-icon-primary">
                                <i class="fas fa-ruler-combined" style="font-size: 48px;color:#86a221 !important;"></i>
                            </span>
                        </div>
                        <h4 class="mb-10">Hisab Pengukuran</h4>
                        <span class="font-size-h1 d-block font-weight-boldest text-dark">
                            <?php echo number_format($total['sihat'][2]->hisab_pengukuran); ?>
                        </span>
                    </div>
                    <div class="text-center">
                        <a href="<?php echo base_url('Users/Binsyar/Pengukuran/index/'); ?>" class="btn btn-primary text-uppercase font-weight-bolder px-15 py-3">Detail</a>
                    </div>
                </div>

                <div class="col border-x-md">
                    <div class="pt-30 pt-md-25 pb-15 px-5 text-center">
                        <div class="d-flex flex-center position-relative mb-25">
                            <span class="svg svg-fill-primary opacity-4 position-absolute">
                                <svg width="175" height="200"><polyline points="87,0 174,50 174,150 87,200 0,150 0,50 87,0"></polyline></svg>
                            </span>
                            <span class="svg-icon svg-icon-5x svg-icon-primary">
                                <i class="fas fa-map-marked-alt" style="font-size: 48px;color:#86a221 !important;"></i>
                            </span>
                        </div>
                        <h4 class="mb-10">Hisab Lokasi</h4>
                        <span class="font-size-h1 d-block font-weight-boldest text-dark">
                            <?php echo number_format($total['sihat'][3]->total); ?>
                        </span>
                    </div>
                    <div class="text-center">
                        <a href="<?php echo base_url('Users/Binsyar/Lokasi/index/'); ?>" class="btn btn-primary text-uppercase font-weight-bolder px-15 py-3">Detail</a>
                    </div>
                </div>

                <div class="col">
                    <div class="pt-30 pt-md-25 pb-15 px-5 text-center">
                        <div class="d-flex flex-center position-relative mb-25">
                            <span class="svg svg-fill-primary opacity-4 position-absolute">
                                <svg width="175" height="200"><polyline points="87,0 174,50 174,150 87,200 0,150 0,50 87,0"></polyline></svg>
                            </span>
                            <span class="svg-icon svg-icon-5x svg-icon-primary">
                                <i class="fas fa-file" style="font-size: 48px;color:#86a221 !important;"></i>
                            </span>
                        </div>
                        <h4 class="mb-10">Hisab Laporan</h4>
                        <span class="font-size-h1 d-block font-weight-boldest text-dark">
                            <?php echo number_format($total['sihat'][4]->hisab_laporan); ?>
                        </span>
                    </div>
                    <div class="text-center">
                        <a href="<?php echo base_url('Users/Binsyar/Laporan/index/'); ?>" class="btn btn-primary text-uppercase font-weight-bolder px-15 py-3">Detail</a>
                    </div>
                </div>
            </div>
            <div class="clear" style="margin:5% 0px;border: 0.5px solid #EBEDF3 !important;"></div>
            <div class="row">
                <div class="col">
                    <div class="pt-30 pt-md-25 pb-15 px-5 text-center">
                        <div class="d-flex flex-center position-relative mb-25">
                            <span class="svg svg-fill-primary opacity-4 position-absolute">
                                <svg width="175" height="200"><polyline points="87,0 174,50 174,150 87,200 0,150 0,50 87,0"></polyline></svg>
                            </span>
                            <span class="svg-icon svg-icon-5x svg-icon-primary">
                                <i class="far fa-compass" style="font-size: 48px;color:#86a221 !important;"></i>
                            </span>
                        </div>
                        <h4 class="mb-10">Lintang Kota</h4>
                        <span class="font-size-h1 d-block font-weight-boldest text-dark">
                            <?php echo number_format($total['sihat'][5]->lintang_kota); ?>
                        </span>
                    </div>
                    <div class="text-center">
                        <a href="<?php echo base_url('Users/Binsyar/Lintang/index/'); ?>" class="btn btn-primary text-uppercase font-weight-bolder px-15 py-3">Detail</a>
                    </div>
                </div>

                <div class="col border-x-md">
                    <div class="pt-30 pt-md-25 pb-15 px-5 text-center">
                        <div class="d-flex flex-center position-relative mb-25">
                            <span class="svg svg-fill-primary opacity-4 position-absolute">
                                <svg width="175" height="200"><polyline points="87,0 174,50 174,150 87,200 0,150 0,50 87,0"></polyline></svg>
                            </span>
                            <span class="svg-icon svg-icon-5x svg-icon-primary">
                                <i class="fas fa-mosque" style="font-size: 48px;color:#86a221 !important;"></i>
                            </span>
                        </div>
                        <h4 class="mb-10">Data Masjid</h4>
                        <span class="font-size-h1 d-block font-weight-boldest text-dark">
                            <?php echo number_format($total['simas'][0]->data_masjid); ?>
                        </span>
                    </div>
                    <div class="text-center">
                        <a href="<?php echo base_url('Users/Binsyar/Simas/index/'); ?>" class="btn btn-primary text-uppercase font-weight-bolder px-15 py-3">Detail</a>
                    </div>
                </div>

                <div class="col">
                    <div class="pt-30 pt-md-25 pb-15 px-5 text-center">
                        <div class="d-flex flex-center position-relative mb-25">
                            <span class="svg svg-fill-primary opacity-4 position-absolute">
                                <svg width="175" height="200"><polyline points="87,0 174,50 174,150 87,200 0,150 0,50 87,0"></polyline></svg>
                            </span>
                            <span class="svg-icon svg-icon-5x svg-icon-primary">
                                <i class="fas fa-place-of-worship" style="font-size: 48px;color:#86a221 !important;"></i>
                            </span>
                        </div>
                        <h4 class="mb-10">Data Mushalla</h4>
                        <span class="font-size-h1 d-block font-weight-boldest text-dark">
                            <?php echo number_format($total['simas'][1]->data_mushalla); ?>
                        </span>
                    </div>
                    <div class="text-center">
                        <a href="<?php echo base_url('Users/Binsyar/Mushalla/index/'); ?>" class="btn btn-primary text-uppercase font-weight-bolder px-15 py-3">Detail</a>
                    </div>
                </div>

                <div class="col border-x-md">
                    <div class="pt-30 pt-md-25 pb-15 px-5 text-center">
                        <div class="d-flex flex-center position-relative mb-25">
                            <span class="svg svg-fill-primary opacity-4 position-absolute">
                                <svg width="175" height="200"><polyline points="87,0 174,50 174,150 87,200 0,150 0,50 87,0"></polyline></svg>
                            </span>
                            <span class="svg-icon svg-icon-5x svg-icon-primary">
                                <i class="fas fa-building" style="font-size: 48px;color:#86a221 !important;"></i>
                            </span>
                        </div>
                        <h4 class="mb-10">Masjid Tipologi</h4>
                        <span class="font-size-h1 d-block font-weight-boldest text-dark">
                            <?php echo number_format($total['simas'][2]->masjid_tipologi); ?>
                        </span>
                    </div>
                    <div class="text-center">
                        <a href="<?php echo base_url('Users/Binsyar/Tipologi/index/'); ?>" class="btn btn-primary text-uppercase font-weight-bolder px-15 py-3">Detail</a>
                    </div>
                </div>

                <div class="col">
                    <div class="pt-30 pt-md-25 pb-15 px-5 text-center">
                        <div class="d-flex flex-center position-relative mb-25">
                            <span class="svg svg-fill-primary opacity-4 position-absolute">
                                <svg width="175" height="200"><polyline points="87,0 174,50 174,150 87,200 0,150 0,50 87,0"></polyline></svg>
                            </span>
                            <span class="svg-icon svg-icon-5x svg-icon-primary">
                                <i class="far fa-building" style="font-size: 48px;color:#86a221 !important;"></i>
                            </span>
                        </div>
                        <h4 class="mb-10">Mushalla Tipologi</h4>
                        <span class="font-size-h1 d-block font-weight-boldest text-dark">
                            <?php echo number_format($total['simas'][3]->mushalla_tipologi); ?>
                        </span>
                    </div>
                    <div class="text-center">
                        <a href="<?php echo base_url('Users/Binsyar/Tipologi/Mushalla/'); ?>" class="btn btn-primary text-uppercase font-weight-bolder px-15 py-3">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>