<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-uppercase">Dashboard Sekretariat</h5>
        </div>
    </div>
</div>
<div class="card card-custom" data-card="true" id="kt_card_1">
    <div class="card-body">
        <div class="row">
            <div class="col bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
                <a href="<?php echo base_url('Users/Sekretariat/Satker/index/'); ?>" class="text-warning font-weight-bold font-size-h6">
                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                        <i class="flaticon-map" style="font-size: 48px;"></i><b style="font-size: 35px;margin-left: 10px;"><?php echo number_format($data['satker'][0]->satker); ?></b>
                    </span>
                    Satker
                </a>
            </div>

            <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">

                <a href="<?php echo base_url('Users/Sekretariat/Usulan/index/' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt(date("Y"))) . ''); ?>" class="text-warning font-weight-bold font-size-h6">
                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                        <i class="fas fa-chart-line" style="font-size: 48px;"></i><b style="font-size: 35px;margin-left: 10px;"><?php echo number_format($data['satker'][1]->usulan_triwulan); ?></b>
                    </span>
                    Usulan Triwulan
                </a>
            </div>

            <div class="col bg-light-success px-6 py-8 rounded-xl mr-7 mb-7">
                <a href="<?php echo base_url('Users/Sekretariat/Input/index?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . date("Y"))) . ''); ?>" class="text-warning font-weight-bold font-size-h6">
                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                        <i class="fas fa-pencil-alt" style="font-size: 48px;"></i><b style="font-size: 35px;margin-left: 10px;"><?php echo number_format($data['satker'][2]->input_triwulan); ?></b>
                    </span>
                    Input Triwulan
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col bg-light-danger px-6 py-8 rounded-xl mr-7 mb-7">
                <a href="<?php echo base_url('Users/Sekretariat/Approved/index?key=' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt('?a=' . date("Y"))) . ''); ?>" class="text-warning font-weight-bold font-size-h6">
                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                        <i class="far fa-thumbs-up" style="font-size: 48px;"></i><b style="font-size: 35px;margin-left: 10px;"><?php echo number_format($data['satker'][3]->approved_usulan); ?></b>
                    </span>
                    Approved Usulan
                </a>
            </div>

            <div class="col bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                    <i class="fas fa-users" style="font-size: 48px;"></i><b style="font-size: 35px;margin-left: 10px;"><?php echo number_format($data['sicakep'][0]->data_pegawai); ?></b>
                </span>
                <a href="<?php echo base_url('Users/Sekretariat/Pegawai/index'); ?>" class="text-warning font-weight-bold font-size-h6">Data Pegawai</a>
            </div>

            <div class="col bg-light-warning px-6 py-8 rounded-xl mr-7 mb-7">
                <a href="<?php echo base_url('Users/Sekretariat/Pensiun/index'); ?>" class="text-warning font-weight-bold font-size-h6">
                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
                        <i class="fas fa-house-user" style="font-size: 48px;"></i><b style="font-size: 35px;margin-left: 10px;"><?php echo number_format($data['sicakep'][1]->data_pensiun); ?></b>
                    </span>
                    Data Pensiun
                </a>
            </div>
        </div>
    </div>
</div>