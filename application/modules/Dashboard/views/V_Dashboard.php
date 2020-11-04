<div class="row">
    <div class="col-6 col-xs-12">
        <!--begin::Mixed Widget 1-->
        <div class="card card-custom bg-gray-100 card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 bg-success py-5">
                <h3 class="card-title font-weight-bolder text-white">Sekretariat</h3>
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
                                <a href="<?php echo base_url('Sekertariat/Satker/index/'); ?>">
                                    <i class="icon-2x flaticon-map"></i>
                                    Satuan Kerja
                                </a>
                            </div>
                            <div class="col-6 shortcut-item">
                                <a href="<?php echo base_url('Sekertariat/Usulan/index/' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt(date("Y")))); ?>">
                                    <i class="icon-2x flaticon-statistics"></i>
                                    Usulan Triwulan
                                </a>
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col-6 shortcut-item">
                                <a href="<?php echo base_url('Sekertariat/Input/index/' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt(date("Y")))); ?>">
                                    <i class="icon-2x flaticon-edit"></i>
                                    Input Triwulan
                                </a>
                            </div>
                            <div class="col-6 shortcut-item">
                                <a href="<?php echo base_url('Sekertariat/Approved/index/' . str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt(date("Y")))); ?>">
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
                                <a href="<?php echo base_url('Sekertariat/Sicakep/Pegawai/index'); ?>">
                                    <i class="icon-2x flaticon-users"></i>
                                    Data Pegawai
                                </a>
                            </div>
                        </div>
                        <div class="row m-0">
                            <div class="col-12 shortcut-item">
                                <a href="<?php echo base_url('Sekertariat/Sicakep/Pensiun/index'); ?>">
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
    <div class="col-6 col-xs-12">
        <!--begin::Mixed Widget 1-->
        <div class="card card-custom bg-gray-100 card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 bg-warning py-5">
                <h3 class="card-title font-weight-bolder text-white">Agama Islam &amp; Binsyar</h3>
            </div>
            <!--end::Header-->

            <!--begin::Body-->
            <div class="card-body p-0 position-relative overflow-hidden shortcut-wrapper">

                <div class="row m-0">
                    <div class="col-md-8 p-0">
                        <h5>SIHAT</h5>
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col-6 shortcut-item">
                                <a href="<?php echo base_url('Binsyar/Sihat/index/'); ?>">
                                    <i class="icon-2x flaticon-time-1"></i>
                                    Alat Hisab Rukyat
                                </a>
                            </div>
                            <div class="col-6 shortcut-item">
                                <a href="<?php echo base_url('Binsyar/Ahli/index/'); ?>">
                                    <i class="icon-2x flaticon-suitcase"></i>
                                    Tenaga Ahli
                                </a>
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col-6 shortcut-item">
                                <a href="<?php echo base_url('Binsyar/Pengukuran/index/'); ?>">
                                    <i class="icon-2x flaticon-interface-7"></i>
                                    Hisab Pengukuran
                                </a>
                            </div>
                            <div class="col-6 shortcut-item">
                                <a href="<?php echo base_url('Binsyar/Lokasi/index/'); ?>">
                                    <i class="icon-2x flaticon-placeholder-2"></i>
                                    Hisab Lokasi
                                </a>
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col-6 shortcut-item">
                                <a href="<?php echo base_url('Binsyar/Laporan/index/'); ?>">
                                    <i class="icon-2x flaticon-file-2"></i>
                                    Hisab Laporan
                                </a>
                            </div>
                            <div class="col-6 shortcut-item">
                                <a href="<?php echo base_url('Binsyar/Lintang/index/'); ?>">
                                    <i class="icon-2x flaticon-map-location"></i>
                                    Lintang Kota
                                </a>
                            </div>
                        </div>
                        <!--end::Row-->
                    </div>
                    <div class="col-md-4 p-0">
                        <h5>SIMAS</h5>
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col-12 shortcut-item">
                                <a href="<?php echo base_url('Binsyar/Simas/index/'); ?>">
                                    <i class="icon-2x flaticon-users"></i>
                                    Data Masjid
                                </a>
                            </div>
                        </div>
                        <div class="row m-0">
                            <div class="col-12 shortcut-item">
                                <a href="<?php echo base_url('Binsyar/Mushalla/index/'); ?>">
                                    <i class="icon-2x flaticon-profile-1"></i>
                                    Data Mushalla
                                </a>
                            </div>
                        </div>
                        <div class="row m-0">
                            <div class="col-12 shortcut-item">
                                <a href="<?php echo base_url('Binsyar/Tipologi/index/'); ?>">
                                    <i class="icon-2x flaticon-users"></i>
                                    Masjid Tipologi
                                </a>
                            </div>
                        </div>
                        <div class="row m-0">
                            <div class="col-12 shortcut-item">
                                <a href="<?php echo base_url('Binsyar/Tipologi/Mushalla/'); ?>">
                                    <i class="icon-2x flaticon-profile-1"></i>
                                    Mushalla Tipologi
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
    <div class="col-12 col-xs-12">
        <!--begin::Mixed Widget 1-->
        <div class="card card-custom bg-gray-100 card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 bg-primary py-5">
                <h3 class="card-title font-weight-bolder text-white">Bina KUA &amp; Keluarga Sakinah</h3>
            </div>
            <!--end::Header-->

            <!--begin::Body-->
            <div class="card-body p-0 position-relative overflow-hidden shortcut-wrapper">

                <div class="row m-0">
                    <div class="col-md-2 p-0">
                        <h5>BIMWIN</h5>
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col-12 shortcut-item">
                                <a href="<?php echo base_url('KUA/Bimwin/index/'); ?>">
                                    <i class="icon-2x flaticon-time-1"></i>
                                    Target Catin
                                </a>
                            </div>
                        </div>
                        <div class="row m-0">
                            <div class="col-12 shortcut-item">
                                <a href="<?php echo base_url('KUA/Catin/index/'); ?>">
                                    <i class="icon-2x flaticon-suitcase"></i>
                                    Data Catin
                                </a>
                            </div>
                        </div>
                        <!--end::Row-->
                    </div>
                    <div class="col-md-6 p-0">
                        <h5>e-Monev</h5>
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col-4 shortcut-item">
                                <a href="<?php echo base_url('Emonev/index/'); ?>">
                                    <i class="icon-2x flaticon-users"></i>
                                    Rekap Data KUA
                                </a>
                            </div>
                            <div class="col-4 shortcut-item">
                                <a href="<?php echo base_url('Emonev/Tipologi/index/'); ?>">
                                    <i class="icon-2x flaticon-users"></i>
                                    Tipologi KUA
                                </a>
                            </div>
                            <div class="col-4 shortcut-item">
                                <a href="<?php echo base_url('Emonev/Tanah/index/'); ?>">
                                    <i class="icon-2x flaticon-profile-1"></i>
                                    Status Tanah KUA
                                </a>
                            </div>
                        </div>
                        <div class="row m-0">
                            <div class="col-4 shortcut-item">
                                <a href="<?php echo base_url('Emonev/Penilaian/index/'); ?>">
                                    <i class="icon-2x flaticon-profile-1"></i>
                                    Rekapitulasi Penilaian KUA
                                </a>
                            </div>
                            <div class="col-4 shortcut-item">
                                <a href="<?php echo base_url('Emonev/Rekap/index/'); ?>">
                                    <i class="icon-2x flaticon-profile-1"></i>
                                    Rekapitulasi Data KUA
                                </a>
                            </div>
                            <div class="col-4 shortcut-item">
                                <a href="<?php echo base_url('Emonev/Isian/index/'); ?>">
                                    <i class="icon-2x flaticon-profile-1"></i>
                                    Rekap Isian KUA
                                </a>
                            </div>
                        </div>
                        <div class="row m-0">
                            <div class="col-4 shortcut-item">
                                <a href="<?php echo base_url('Emonev/Bangunan/index/'); ?>">
                                    <i class="icon-2x flaticon-profile-1"></i>
                                    Status Bangunan KUA
                                </a>
                            </div>
                            <div class="col-4 shortcut-item">
                                <a href="<?php echo base_url('Emonev/Simkah/index/'); ?>">
                                    <i class="icon-2x flaticon-profile-1"></i>
                                    Penggunaan SIMKAH
                                </a>
                            </div>
                            <div class="col-4 shortcut-item">
                                <a href="<?php echo base_url('Emonev/Registrasi/index/'); ?>">
                                    <i class="icon-2x flaticon-profile-1"></i>
                                    Rekapitulasi Registrasi
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 p-0">
                        <h5>Simpenghulu</h5>
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col-6 shortcut-item">
                                <a href="<?php echo base_url('Simpenghulu/KUA/index/'); ?>">
                                    <i class="icon-2x flaticon-users"></i>
                                    Data KUA
                                </a>
                            </div>
                            <div class="col-6 shortcut-item">
                                <a href="<?php echo base_url('Simpenghulu/Penghulu/index/'); ?>">
                                    <i class="icon-2x flaticon-users"></i>
                                    Data Penghulu
                                </a>
                            </div>
                        </div>
                        <div class="row m-0">
                            <div class="col-6 shortcut-item">
                                <a href="<?php echo base_url('Simpenghulu/Peristiwa/index/'); ?>">
                                    <i class="icon-2x flaticon-profile-1"></i>
                                    Data Peristiwa Nikah
                                </a>
                            </div>
                            <div class="col-6 shortcut-item">
                                <a href="<?php echo base_url('Simpenghulu/Nikah_Rujuk/index/'); ?>">
                                    <i class="icon-2x flaticon-profile-1"></i>
                                    Data Nikah &amp; Rujuk
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
    <div class="col-9 col-xs-12">
        <!--begin::Mixed Widget 1-->
        <div class="card card-custom bg-gray-100 card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 bg-info py-5">
                <h3 class="card-title font-weight-bolder text-white">Penerangan Agama Islam</h3>
            </div>
            <!--end::Header-->

            <!--begin::Body-->
            <div class="card-body p-0 position-relative overflow-hidden shortcut-wrapper">

                <div class="row m-0">
                    <div class="col-md-9 p-0">
                        <h5>Simpenais</h5>
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col-3 shortcut-item">
                                <a href="<?php echo base_url('PAI/Simpenais/index/'); ?>">
                                    <i class="icon-2x flaticon-map"></i>
                                    Penyuluh
                                </a>
                            </div>
                            <div class="col-3 shortcut-item">
                                <a href="<?php echo base_url('PAI/Majelis/index/'); ?>">
                                    <i class="icon-2x flaticon-statistics"></i>
                                    Majelis Taklim
                                </a>
                            </div>
                            <div class="col-3 shortcut-item">
                                <a href="<?php echo base_url('PAI/Seni_Islam/index/'); ?>">
                                    <i class="icon-2x flaticon-statistics"></i>
                                    Seni Islam
                                </a>
                            </div>
                            <div class="col-3 shortcut-item">
                                <a href="<?php echo base_url('PAI/Dakwah/index/'); ?>">
                                    <i class="icon-2x flaticon-statistics"></i>
                                    Lembaga Dakwah
                                </a>
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col-3 shortcut-item">
                                <a href="<?php echo base_url('PAI/Ormas/index/'); ?>">
                                    <i class="icon-2x flaticon-edit"></i>
                                    Ormas Islam
                                </a>
                            </div>
                            <div class="col-3 shortcut-item">
                                <a href="<?php echo base_url('PAI/Dewan/index/'); ?>">
                                    <i class="icon-2x flaticon-like"></i>
                                    Dewan Hakim
                                </a>
                            </div>
                            <div class="col-3 shortcut-item">
                                <a href="<?php echo base_url('PAI/Guru_ngaji/index/'); ?>">
                                    <i class="icon-2x flaticon-statistics"></i>
                                    Guru Ngaji
                                </a>
                            </div>
                            <div class="col-3 shortcut-item">
                                <a href="<?php echo base_url('PAI/LPTQ/index/'); ?>">
                                    <i class="icon-2x flaticon-statistics"></i>
                                    L T P Q
                                </a>
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col-3 shortcut-item">
                                <a href="<?php echo base_url('PAI/Hafiz/index/'); ?>">
                                    <i class="icon-2x flaticon-edit"></i>
                                    Hafidz
                                </a>
                            </div>
                            <div class="col-3 shortcut-item">
                                <a href="<?php echo base_url('PAI/Qari/index/'); ?>">
                                    <i class="icon-2x flaticon-like"></i>
                                    Qari
                                </a>
                            </div>
                            <div class="col-3 shortcut-item">
                                <a href="<?php echo base_url('PAI/Mufassir/index/'); ?>">
                                    <i class="icon-2x flaticon-statistics"></i>
                                    Mufassir
                                </a>
                            </div>
                            <div class="col-3 shortcut-item">
                                <a href="<?php echo base_url('PAI/Kaligrafer/index/'); ?>">
                                    <i class="icon-2x flaticon-statistics"></i>
                                    Kaligrafer
                                </a>
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col-3 shortcut-item">
                                <a href="<?php echo base_url('PAI/Seniman/index/'); ?>">
                                    <i class="icon-2x flaticon-edit"></i>
                                    Seniman
                                </a>
                            </div>
                            <div class="col-3 shortcut-item">
                                <a href="<?php echo base_url('PAI/Budayawan/index/'); ?>">
                                    <i class="icon-2x flaticon-like"></i>
                                    Budayawan
                                </a>
                            </div>
                            <div class="col-3 shortcut-item">
                                <a href="<?php echo base_url('PAI/Radio_Islam/index/'); ?>">
                                    <i class="icon-2x flaticon-statistics"></i>
                                    Radio Islam
                                </a>
                            </div>
                            <div class="col-3 shortcut-item">
                                <a href="<?php echo base_url('PAI/Penulis/index/'); ?>">
                                    <i class="icon-2x flaticon-statistics"></i>
                                    Penulis Islam
                                </a>
                            </div>
                        </div>
                        <!--end::Row-->
                    </div>
                    <div class="col-md-3 p-0">
                        <h5>E-PAI</h5>
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col-12 shortcut-item">
                                <a href="<?php echo base_url('PAI/Epai/index/'); ?>">
                                    <i class="icon-2x flaticon-users"></i>
                                    E-PAI
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
    <div class="col-3 col-xs-12">
        <!--begin::Mixed Widget 1-->
        <div class="card card-custom bg-gray-100 card-stretch gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 bg-danger py-5">
                <h3 class="card-title font-weight-bolder text-white">Pemberdayaan Zakat &amp; Wakaf</h3>
            </div>
            <!--end::Header-->

            <!--begin::Body-->
            <div class="card-body p-0 position-relative overflow-hidden shortcut-wrapper">

                <div class="row m-0">
                    <div class="col-md-12 p-0">
                        <h5>Siwak</h5>
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col-12 shortcut-item">
                                <a href="<?php echo base_url('Siwak/index/'); ?>">
                                    <i class="icon-2x flaticon-map"></i>
                                    Siwak
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