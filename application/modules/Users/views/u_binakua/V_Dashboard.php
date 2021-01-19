<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-uppercase">Dashboard Bina KUA &amp; Keluarga Sakinah</h5>
        </div>
    </div>
</div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-body">
        <div class="row">
            <div class="col bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                    <i class="fas fa-poll" style="font-size: 48px;"></i> <b style="font-size: 35px;margin-left: 10px;"><?php echo number_format($total['target_catin']); ?></b>
                </span>
                <a href="<?php echo base_url('Users/BKKS/Bimwin/index/'); ?>" class="text-warning font-weight-bold font-size-h6">Target Catin</a>
            </div>

            <div class="col bg-light-danger px-6 py-8 rounded-xl mr-7 mb-7">
                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                    <i class="fas fa-restroom" style="font-size: 48px;"></i> <b style="font-size: 35px;margin-left: 10px;"><?php echo number_format($total['data_catin']); ?></b>
                </span>
                <a href="<?php echo base_url('Users/BKKS/Catin/index/'); ?>" class="text-warning font-weight-bold font-size-h6">Data Catin</a>
            </div>

            <div class="col bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                    <i class="fas fa-shapes" style="font-size: 48px;"></i> <b style="font-size: 35px;margin-left: 10px;"><?php echo number_format($total['fasilitator']); ?></b>
                </span>
                <a href="<?php echo base_url('Users/BKKS/Fasilitator/index/' . date("Y")); ?>" class="text-warning font-weight-bold font-size-h6">Fasilitator Bimwin</a>
            </div>

            <div class="col bg-light-danger px-6 py-8 rounded-xl mr-7 mb-7">
                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                    <i class="fas fa-archive" style="font-size: 48px;"></i> <b style="font-size: 35px;margin-left: 10px;"><?php echo number_format($total['rekap_kua']); ?></b>
                </span>
                <a href="<?php echo base_url('Users/BKKS/Emonev/index/'); ?>" class="text-warning font-weight-bold font-size-h6">Rekap Data KUA</a>
            </div>
        </div>

        <div class="row">
            <div class="col bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                    <i class="fas fa-building" style="font-size: 48px;"></i> <b style="font-size: 35px;margin-left: 10px;"><?php echo number_format($total['tipo_kua']); ?></b>
                </span>
                <a href="<?php echo base_url('Users/BKKS/Tipologi/index/'); ?>" class="text-warning font-weight-bold font-size-h6">Tipologi KUA</a>
            </div>

            <div class="col bg-light-danger px-6 py-8 rounded-xl mr-7 mb-7">
                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                    <i class="far fa-file-alt" style="font-size: 48px;"></i> <b style="font-size: 35px;margin-left: 10px;"><?php echo number_format($total['tanah_kua']); ?></b>
                </span>
                <a href="<?php echo base_url('Users/BKKS/Tanah/index/'); ?>" class="text-warning font-weight-bold font-size-h6">Status Tanah KUA</a>
            </div>

            <div class="col bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                    <i class="fas fa-building" style="font-size: 48px;"></i> <b style="font-size: 35px;margin-left: 10px;"><?php echo number_format($total['bangunan_kua']); ?></b>
                </span>
                <a href="<?php echo base_url('Users/BKKS/Bangunan/index/'); ?>" class="text-warning font-weight-bold font-size-h6">Status Bangunan KUA</a>
            </div>

            <div class="col bg-light-danger px-6 py-8 rounded-xl mr-7 mb-7">
                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                    <i class="fas fa-archive" style="font-size: 48px;"></i> <b style="font-size: 35px;margin-left: 10px;"><?php echo number_format($total['regis_kua']); ?></b>
                </span>
                <a href="<?php echo base_url('Users/BKKS/Registrasi/index/'); ?>" class="text-warning font-weight-bold font-size-h6">Rekapitulasi Registrasi</a>
            </div>

        </div>

        <div class="row">
            <div class="col bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                    <i class="fas fa-chart-pie" style="font-size: 48px;"></i> <b style="font-size: 35px;margin-left: 10px;"><?php echo number_format($total['penggunaan_simkah']); ?></b>
                </span>
                <a href="<?php echo base_url('Users/BKKS/Simkah/index/'); ?>" class="text-warning font-weight-bold font-size-h6">Penggunaan SIMKAH</a>
            </div>

            <div class="col bg-light-danger px-6 py-8 rounded-xl mr-7 mb-7">
                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                    <i class="fas fa-archive" style="font-size: 48px;"></i> <b style="font-size: 35px;margin-left: 10px;"><?php echo number_format($total['penilaian_kua']); ?></b>
                </span>
                <a href="<?php echo base_url('Users/BKKS/Penilaian/index/'); ?>" class="text-warning font-weight-bold font-size-h6">Rekapitulasi Penilaian KUA</a>
            </div>

            <div class="col bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                    <i class="fas fa-poll" style="font-size: 48px;"></i> <b style="font-size: 35px;margin-left: 10px;"><?php echo number_format($total['data_kua']); ?></b>
                </span>
                <a href="<?php echo base_url('Users/BKKS/KUA/index/'); ?>" class="text-warning font-weight-bold font-size-h6">Data KUA</a>
            </div>

            <div class="col bg-light-danger px-6 py-8 rounded-xl mr-7 mb-7">
                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                    <i class="fas fa-user-tie" style="font-size: 48px;"></i> <b style="font-size: 35px;margin-left: 10px;"><?php echo number_format($total['data_penghulu']); ?></b>
                </span>
                <a href="<?php echo base_url('Users/BKKS/Penghulu/index/'); ?>" class="text-warning font-weight-bold font-size-h6">Data Penghulu</a>
            </div>
        </div>
    </div>
</div>