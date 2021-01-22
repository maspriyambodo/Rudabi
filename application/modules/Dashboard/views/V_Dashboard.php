<div class="card" style="margin-top: -4%;">
    <div class="position-absolute w-100 h-50 rounded-card-top bg-dark"></div>
    <div class="card-body position-relative">
        <div style="font-size:40px;" class="7 text-white text-center my-10">
            <b>DIREKTORAT JENDERAL</b><br>Bimbingan Masyarakat Islam
        </div>
        <div class="card-body bg-white col-11 col-lg-12 col-xxl-10 mx-auto">
            <div class="row">
                <div class="col">
                    <a href="<?php echo base_url('Sekertariat/Satker/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-sitemap" style="font-size: 48px;color: white;"></i>
                                <b style="font-size: 30px;color: white;margin-left: 10px;">
                                    <?php echo number_format($total); ?>
                                </b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">
                                Data Satker
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Sekertariat/Usulan/index?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . date("Y")))); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-chart-line" style="font-size: 48px;color: white;"></i>
                                <b style="font-size: 30px;color: white;margin-left: 10px;">
                                    <?php echo number_format($total); ?>
                                </b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">
                                Usulan Triwulan
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Sekertariat/Approved/index?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . date("Y")))); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="far fa-thumbs-up" style="font-size: 48px;color: white;"></i>
                                <b style="font-size: 30px;color: white;margin-left: 10px;">
                                    <?php echo number_format($total); ?>
                                </b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">
                                Approved Usulan
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Sekertariat/Sicakep/Pegawai/index'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-users" style="font-size: 48px;color: white;"></i>
                                <b style="font-size: 30px;color: white;margin-left: 10px;">
                                    <?php echo number_format($total); ?>
                                </b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">
                                Data Pegawai
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Sekertariat/Sicakep/Pensiun/index/'); ?>" class="card card-custom bg-danger bg-hover-state-danger card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-house-user" style="font-size: 48px;color: white;"></i>
                                <b style="font-size: 30px;color: white;margin-left: 10px;">
                                    <?php echo number_format($total); ?>
                                </b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">
                                Data Pensiun
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            
            <div class="row">
                <div class="col">
                    <a href="<?php echo base_url('Binsyar/Sihat/index/'); ?>" class="card card-custom bg-info bg-hover-state-info card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-tools" style="font-size: 48px;color: white;"></i>
                                <b style="font-size: 30px;color: white;margin-left: 10px;">
                                    <?php echo number_format($total); ?>
                                </b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">
                                Alat Hisab Rukyat
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Binsyar/Ahli/index/'); ?>" class="card card-custom bg-info bg-hover-state-info card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-user-tie" style="font-size: 48px;color: white;"></i>
                                <b style="font-size: 30px;color: white;margin-left: 10px;">
                                    <?php echo number_format($total); ?>
                                </b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">
                                Tenaga Ahli
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Binsyar/Pengukuran/index/'); ?>" class="card card-custom bg-info bg-hover-state-info card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-ruler-combined" style="font-size: 48px;color: white;"></i>
                                <b style="font-size: 30px;color: white;margin-left: 10px;">
                                    <?php echo number_format($total); ?>
                                </b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">
                                Hisab Pengukuran
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Binsyar/Simas/index/'); ?>" class="card card-custom bg-info bg-hover-state-info card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-mosque" style="font-size: 48px;color: white;"></i>
                                <b style="font-size: 30px;color: white;margin-left: 10px;">
                                    <?php echo number_format($total); ?>
                                </b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">
                                Data Masjid
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Binsyar/Mushalla/index/'); ?>" class="card card-custom bg-info bg-hover-state-info card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-place-of-worship" style="font-size: 48px;color: white;"></i>
                                <b style="font-size: 30px;color: white;margin-left: 10px;">
                                    <?php echo number_format($total); ?>
                                </b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">
                                Data Mushalla
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            
            <div class="row">
                <div class="col">
                    <a href="<?php echo base_url('KUA/Bimwin/index/'); ?>" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="far fa-list-alt" style="font-size: 48px;color: white;"></i>
                                <b style="font-size: 30px;color: white;margin-left: 10px;">
                                    <?php echo number_format($total); ?>
                                </b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">
                                Target Catin
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Emonev/index/'); ?>" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="far fa-chart-bar" style="font-size: 48px;color: white;"></i>
                                <b style="font-size: 30px;color: white;margin-left: 10px;">
                                    <?php echo number_format($total); ?>
                                </b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">
                                Rekap Data KUA
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-home" style="font-size: 48px;color: white;"></i>
                                <b style="font-size: 30px;color: white;margin-left: 10px;">
                                    <?php echo number_format($total); ?>
                                </b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">
                                Data KUA
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Simpenghulu/Penghulu/index/'); ?>" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-user-tie" style="font-size: 48px;color: white;"></i>
                                <b style="font-size: 30px;color: white;margin-left: 10px;">
                                    <?php echo number_format($total); ?>
                                </b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">
                                Data Penghulu
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="<?php echo base_url('Simpenghulu/Peristiwa/index/'); ?>" class="card card-custom bg-success bg-hover-state-success card-stretch gutter-b">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ml-n1">
                                <i class="fas fa-restroom" style="font-size: 48px;color: white;"></i>
                                <b style="font-size: 30px;color: white;margin-left: 10px;">
                                    <?php echo number_format($total); ?>
                                </b>
                            </span>
                            <div class="font-weight-bold text-inverse-danger" style="margin: 5px 0px;font-size: 20px;">
                                Peristiwa Nikah
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
