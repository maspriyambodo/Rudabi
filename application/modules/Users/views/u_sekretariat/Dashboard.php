<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-uppercase">Dashboard Sekretariat</h5>
        </div>
    </div>
</div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Aplikasi e-SBSN
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
                    <i class="flaticon-map" style="font-size: 48px;"></i>
                </span>
                <a href="<?php echo base_url('Users/Sekretariat/Satker/index/'); ?>" class="text-warning font-weight-bold font-size-h6">Satker</a>
            </div>

            <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                    <i class="fas fa-chart-line" style="font-size: 48px;"></i>
                </span>
                <a href="<?php echo base_url('Users/Sekretariat/Usulan/index/' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt(date("Y"))) . ''); ?>" class="text-warning font-weight-bold font-size-h6">Usulan Triwulan</a>
            </div>

            <div class="col bg-light-success px-6 py-8 rounded-xl mr-7 mb-7">
                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                    <i class="fas fa-pencil-alt" style="font-size: 48px;"></i>
                </span>
                <a href="<?php echo base_url('Users/Sekretariat/Input/index/' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt(date("Y"))) . ''); ?>" class="text-warning font-weight-bold font-size-h6">Input Triwulan</a>
            </div>

            <div class="col bg-light-danger px-6 py-8 rounded-xl mr-7 mb-7">
                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                    <i class="far fa-thumbs-up" style="font-size: 48px;"></i>
                </span>
                <a href="<?php echo base_url('Users/Sekretariat/Approved/index/' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt(date("Y"))) . ''); ?>" class="text-warning font-weight-bold font-size-h6">Approved Usulan</a>
            </div>
        </div>
    </div>
</div>
<div class="clearfix" style="margin:5%;"></div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-header">
        <div class="card-title">
            Aplikasi SICAKEP
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
                    <i class="fas fa-users" style="font-size: 48px;"></i>
                </span>
                <a href="<?php echo base_url('Users/Sekretariat/Sicakep/Pegawai/index'); ?>" class="text-warning font-weight-bold font-size-h6">Data Pegawai</a>
            </div>

            <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                    <i class="fas fa-house-user" style="font-size: 48px;"></i>
                </span>
                <a href="<?php echo base_url('Users/Sekretariat/Pensiun/index'); ?>" class="text-warning font-weight-bold font-size-h6">Data Pensiun</a>
            </div>
        </div>
    </div>
</div>