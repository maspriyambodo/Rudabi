<div class="row">
    <div class="col-12 col-xs-12">
        <!--begin::Mixed Widget 1-->
        <div class="card card-custom bg-gray-100 card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 bg-success py-5">
                <h3 class="card-title font-weight-bolder text-white">Sekretariat Ditjen Bimas Islam</h3>
            </div>
            <!--end::Header-->

            <!--begin::Body-->
            <div class="card-body p-0 position-relative overflow-hidden shortcut-wrapper">

                <div class="row m-0">
                    <div class="col-md-8 p-0">
                        <h5>e-SBSN</h5>
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col-6 shortcut-item">
                                <a href="<?php echo base_url('Users/Sekertariat/Satker/index/'); ?>">
                                    <i class="icon-2x flaticon-map"></i>
                                    Satuan Kerja
                                </a>
                            </div>
                            <div class="col-6 shortcut-item">
                                <a href="<?php echo base_url('Users/Sekertariat/Usulan/index/' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt(date("Y")))); ?>">
                                    <i class="icon-2x flaticon-statistics"></i>
                                    Usulan Triwulan
                                </a>
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col-6 shortcut-item">
                                <a href="<?php echo base_url('Users/Sekertariat/Input/index/' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt(date("Y")))); ?>">
                                    <i class="icon-2x flaticon-edit"></i>
                                    Input Triwulan
                                </a>
                            </div>
                            <div class="col-6 shortcut-item">
                                <a href="<?php echo base_url('Users/Sekertariat/Approved/index/' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt(date("Y")))); ?>">
                                    <i class="icon-2x flaticon-like"></i>
                                    Usulan Disetujui
                                </a>
                            </div>
                        </div>
                        <!--end::Row-->
                    </div>
                    <div class="col-md-4 p-0">
                        <h5>SICAKEP</h5>
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col-12 shortcut-item">
                                <a href="<?php echo base_url('Users/Sekertariat/Pegawai/index'); ?>">
                                    <i class="icon-2x flaticon-users"></i>
                                    Data Pegawai
                                </a>
                            </div>
                        </div>
                        <div class="row m-0">
                            <div class="col-12 shortcut-item">
                                <a href="<?php echo base_url('Users/Sekertariat/Pensiun/index'); ?>">
                                    <i class="icon-2x flaticon-profile-1"></i>
                                    Data Pensiun
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--end::Body-->
        </div>
        <!--end::Mixed Widget 1-->
    </div>
</div>