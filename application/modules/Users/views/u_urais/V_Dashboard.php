<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-uppercase">Dashboard Urusan Agama Islam &amp; Binsyar</h5>
        </div>
    </div>
</div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Aplikasi SIHAT
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                    <i class="fas fa-tools" style="font-size: 48px;"></i> <b style="font-size: 35px;margin-left: 10px;"><?php echo number_format($total['sihat']); ?></b>
                </span>
                <a href="<?php echo base_url('Users/Binsyar/Sihat/index/'); ?>" class="text-warning font-weight-bold font-size-h6">Alat Hisab Rukyat</a>
            </div>

            <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                    <i class="fas fa-user-tie" style="font-size: 48px;"></i> <b style="font-size: 35px;margin-left: 10px;"><?php echo number_format($total['tenaga']); ?></b>
                </span>
                <a href="<?php echo base_url('Users/Binsyar/Ahli/index/'); ?>" class="text-warning font-weight-bold font-size-h6">Tenaga Ahli</a>
            </div>

            <div class="col bg-light-success px-6 py-8 rounded-xl mr-7 mb-7">
                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                    <i class="fas fa-ruler-combined" style="font-size: 48px;"></i> <b style="font-size: 35px;margin-left: 10px;"><?php echo number_format($total['pengukuran']); ?></b>
                </span>
                <a href="<?php echo base_url('Users/Binsyar/Pengukuran/index/'); ?>" class="text-warning font-weight-bold font-size-h6">Hisab Pengukuran</a>
            </div>
        </div>
        <div class="row">
            <div class="col bg-light-danger px-6 py-8 rounded-xl mr-7 mb-7">
                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                    <i class="fas fa-map-marked-alt" style="font-size: 48px;"></i> <b style="font-size: 35px;margin-left: 10px;"><?php echo number_format($total['lokasi']); ?></b>
                </span>
                <a href="<?php echo base_url('Users/Binsyar/Lokasi/index/'); ?>" class="text-warning font-weight-bold font-size-h6">Hisab Lokasi</a>
            </div>
            <div class="col bg-light-danger px-6 py-8 rounded-xl mr-7 mb-7">
                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                    <i class="fas fa-file" style="font-size: 48px;"></i> <b style="font-size: 35px;margin-left: 10px;"><?php echo number_format($total['laporan']); ?></b>
                </span>
                <a href="<?php echo base_url('Users/Binsyar/Laporan/index/'); ?>" class="text-warning font-weight-bold font-size-h6">Hisab Laporan</a>
            </div>
            <div class="col bg-light-danger px-6 py-8 rounded-xl mr-7 mb-7">
                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                    <i class="far fa-compass" style="font-size: 48px;"></i> <b style="font-size: 35px;margin-left: 10px;"><?php echo number_format($total['lintang']); ?></b>
                </span>
                <a href="<?php echo base_url('Users/Binsyar/Lintang/index/'); ?>" class="text-warning font-weight-bold font-size-h6">Lintang Kota</a>
            </div>
        </div>
    </div>
</div>
<div class="clearfix" style="margin:5%;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Aplikasi SIMAS
        </div>
        <div class="card-toolbar">
            <a href="#" class="btn btn-icon btn-sm btn-hover-light-primary mr-1" data-card-tool="toggle" data-toggle="tooltip" data-placement="top" title="Minimalkan">
                <i class="ki ki-arrow-down icon-nm"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                    <i class="fas fa-mosque" style="font-size: 48px;"></i> <b style="font-size: 35px;margin-left: 10px;"><?php echo number_format($total['masjid']); ?></b>
                </span>
                <a href="<?php echo base_url('Users/Binsyar/Simas/index/'); ?>" class="text-warning font-weight-bold font-size-h6">Data Masjid</a>
            </div>

            <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                    <i class="fas fa-place-of-worship" style="font-size: 48px;"></i> <b style="font-size: 35px;margin-left: 10px;"><?php echo number_format($total['mushalla']); ?></b>
                </span>
                <a href="<?php echo base_url('Users/Binsyar/Mushalla/index/'); ?>" class="text-warning font-weight-bold font-size-h6">Data Mushalla</a>
            </div>

            <div class="col bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                    <i class="fas fa-building" style="font-size: 48px;"></i>  <b style="font-size: 35px;margin-left: 10px;"><?php echo number_format($total['tipo_masjid']); ?></b>
                </span>
                <a href="<?php echo base_url('Users/Binsyar/Tipologi/index/'); ?>" class="text-warning font-weight-bold font-size-h6">Masjid Tipologi</a>
            </div>

            <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                    <i class="far fa-building" style="font-size: 48px;"></i>  <b style="font-size: 35px;margin-left: 10px;"><?php echo number_format($total['tipo_mushalla']); ?></b>
                </span>
                <a href="<?php echo base_url('Users/Binsyar/Tipologi/Mushalla/'); ?>" class="text-warning font-weight-bold font-size-h6">Mushalla Tipologi</a>
            </div>
        </div>
    </div>
</div>