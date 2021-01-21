<div class="card" style="margin-top: -4%;">
    <div class="position-absolute w-100 h-50 rounded-card-top bg-dark"></div>
    <div class="card-body position-relative">
        <h3 class="7 text-white text-center my-10 my-lg-15">DIREKTORAT<br>Urusan Agama Islam &amp; Pembinaan Syariah</h3>
        <div class="card-body bg-white col-11 col-lg-12 col-xxl-10 mx-auto">
            <div class="row">
                <div class="col">
                    <a href="<?php echo base_url('Users/Binsyar/Simas/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-mosque" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['simas'][0]->data_masjid); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Total Masjid</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="javascript:void(0)" class="card card-custom bg-info bg-hover-state-info card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-mosque" style="font-size: 48px;color: white;"></i><b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['tipo_masjid'][2]->total); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Masjid Jami</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="javascript:void(0)" class="card card-custom bg-info bg-hover-state-info card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-mosque" style="font-size: 48px;color: white;"></i><b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['tipo_masjid'][1]->total); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Masjid di Tempat Publik</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="javascript:void(0)" class="card card-custom bg-info bg-hover-state-info card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-mosque" style="font-size: 48px;color: white;"></i><b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['tipo_masjid'][3]->total); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Masjid Besar</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="javascript:void(0)" class="card card-custom bg-info bg-hover-state-info card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-mosque" style="font-size: 48px;color: white;"></i><b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['tipo_masjid'][0]->total); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Masjid Agung</div>
                        </div>
                    </a>
                </div>
            </div>
            
            <div class="row">
                <div class="col">
                    <a href="javascript:void(0)" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-place-of-worship" style="font-size: 48px;color: white;"></i><b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['simas'][1]->data_mushalla); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Total Mushalla</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="javascript:void(0)" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-place-of-worship" style="font-size: 48px;color: white;"></i><b style="font-size: 30px;color: white;margin-left: 10px;"></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Mushalla Perumahan</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="javascript:void(0)" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-place-of-worship" style="font-size: 48px;color: white;"></i><b style="font-size: 30px;color: white;margin-left: 10px;"></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Mushalla di Tempat Publik</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="javascript:void(0)" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-place-of-worship" style="font-size: 48px;color: white;"></i><b style="font-size: 30px;color: white;margin-left: 10px;"></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Mushalla Pendidikan</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="javascript:void(0)" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-place-of-worship" style="font-size: 48px;color: white;"></i><b style="font-size: 30px;color: white;margin-left: 10px;"></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Mushalla Perkantoran</div>
                        </div>
                    </a>
                </div>
            </div>
            
            <div class="row">
                <div class="col">
                    <a href="<?php echo base_url('Users/Binsyar/Sihat/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-tools" style="font-size: 48px;color: white;"></i><b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['sihat'][0]->alat_hisab_rukyat); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Alat Hisab Rukyat</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="javascript:void(0)" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-tools" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['alat'][0]->gps); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Jumlah GPS</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="javascript:void(0)" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-tools" style="font-size: 48px;color: white;"></i><b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['alat'][0]->theodolit); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Jumlah Theodolit</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="javascript:void(0)" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-tools" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['alat'][0]->teropong); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Jumlah Teropong</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="javascript:void(0)" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-tools" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['alat'][0]->binoculer); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Jumlah Binoculer</div>
                        </div>
                    </a>
                </div>
            </div>
            
            <div class="row">
                <div class="col">
                    <a href="<?php echo base_url('Users/Binsyar/Lintang/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="far fa-compass" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['sihat'][5]->lintang_kota); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Lintang Kota</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#" class="card card-custom bg-primary bg-hover-state-primary card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;"></div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Users/Binsyar/Mushalla/index/'); ?>" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-place-of-worship" style="font-size: 48px;color: white;"></i><b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['simas'][1]->data_mushalla); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Data Mushalla</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Users/Binsyar/Tipologi/index/'); ?>" class="card card-custom bg-warning bg-hover-state-warning card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-building" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['simas'][2]->masjid_tipologi); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Masjid Tipologi</div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Users/Binsyar/Tipologi/Mushalla/'); ?>" class="card card-custom bg-info bg-hover-state-info card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="far fa-building" style="font-size: 48px;color: white;"></i> <b style="font-size: 30px;color: white;margin-left: 10px;"><?php echo number_format($total['simas'][3]->mushalla_tipologi); ?></b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 15px;">Mushalla Tipologi</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
