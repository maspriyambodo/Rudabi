<!DOCTYPE html>
<html lang="en">

    <head>
        <base href="<?= base_url(); ?>">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta property="og:image" content="https://kemenag.go.id/public/images/icon.png">
        <meta property='og:title' content='{title}'>
        <meta property='og:description' content='Rudabi - Rumah Data Bimas Islam Kementerian Agama RI'>
        <meta property='og:type' content='article'>
        <meta property='og:url' content='<?= base_url(); ?>'>
        <meta property="og:locale" content="en_US">
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name="description" content="Rudabi - Rumah Data Bimas Islam Kementerian Agama RI" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <link href="https://cdn.maspriyambodo.com/Metronic/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.maspriyambodo.com/Metronic/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.6" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.maspriyambodo.com/Metronic/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.maspriyambodo.com/Metronic/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.maspriyambodo.com/Metronic/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.maspriyambodo.com/Metronic/assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.maspriyambodo.com/Metronic/assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.maspriyambodo.com/Metronic/assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.maspriyambodo.com/Metronic/assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="https://kemenag.go.id/public/images/icon.png" />
        <title>{title}</title>
    </head>

    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
        <div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed"><a href="index.html"><img alt="Logo" src="https://kemenag.go.id/public/images/icon.png" /></a>
            <div class="d-flex align-items-center">
                <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle"><span></span></button>
                <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle"><span class="svg-icon svg-icon-xl"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24" /><path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" /><path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" /></g></svg></span></button>
            </div>
        </div>
        <div class="d-flex flex-column flex-root">
            <div class="d-flex flex-row flex-column-fluid page">
                <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
                    <div class="brand flex-column-auto" id="kt_brand">
                        <a href="<?= base_url('Dashboard/index/'); ?>" class="brand-logo">
                            <img alt="Logo" src="https://kemenag.go.id/public/images/icon.png" /></a>
                        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle"><span class="svg-icon svg-icon svg-icon-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24" /><path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" /><path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" /></g></svg></span></button>
                    </div>
                    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
                        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
                            <ul class="menu-nav">
                                <li class="menu-item menu-item-active" aria-haspopup="true">
                                    <a href="<?= base_url('Dashboard/index/'); ?>" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-tv"></i>
                                        </span>
                                        <span class="menu-text">Dashboard</span>
                                    </a>
                                </li>

                                <li class="menu-section">
                                    <h4 class="menu-text text-info user-select-none">Sekertariat</h4>
                                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                                </li>
                                <div class="separator separator-dashed"></div>
                                <li class="menu-item menu-item-active" aria-haspopup="true" title="e-planning Bimas Islam">
                                    <a href="#" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-clipboard-list"></i>
                                        </span>
                                        <span class="menu-text">EBI</span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item-active" aria-haspopup="true" title="e-Planning Surat Berharga Syariah Negara">
                                    <a href="#" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-file-invoice-dollar"></i>
                                        </span>
                                        <span class="menu-text">e-SBSN</span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item-active" aria-haspopup="true" title="sistem informasi capaian kinerja">
                                    <a href="#" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-chart-line"></i>
                                        </span>
                                        <span class="menu-text">SICAKEP</span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item-active" aria-haspopup="true" title="Sistem Informasi Persuratan Bimas Islam">
                                    <a href="#" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-mail-bulk"></i>
                                        </span>
                                        <span class="menu-text">SIPBI</span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item-active" aria-haspopup="true" title="Tim Cyber Anti Narkoba, Pornografi, dan Radikalisme">
                                    <a href="#" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-user-shield"></i>
                                        </span>
                                        <span class="menu-text">Cyber</span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item-active" aria-haspopup="true" title="Sistem Informasi Manajemen Bimas Islam">
                                    <a href="#" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-cogs"></i>
                                        </span>
                                        <span class="menu-text">SIMBI</span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item-active" aria-haspopup="true" title="Sistem Informasi Laporan Pimpinan">
                                    <a href="#" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-book"></i>
                                        </span>
                                        <span class="menu-text">SILP</span>
                                    </a>
                                </li>


                                <li class="menu-section">
                                    <h4 class="menu-text text-info user-select-none">Agama Islam & BinSyar</h4>
                                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                                </li>
                                <div class="separator separator-dashed"></div>
                                <li class="menu-item menu-item-active" aria-haspopup="true" title="Sistem Informasi Hisab Rukyat">
                                    <a href="<?= base_url('Binsyar/Sihat/index/'); ?>" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-toolbox"></i>
                                        </span>
                                        <span class="menu-text">SIHAT</span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item-active" aria-haspopup="true" title="Sistem Informasi Masjid">
                                    <a href="<?= base_url('Simas/index/'); ?>" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-mosque"></i>
                                        </span>
                                        <span class="menu-text">SIMAS</span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item-active" aria-haspopup="true" title="Sistem Informasi Paham Keagamaan">
                                    <a href="#" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-moon"></i>
                                        </span>
                                        <span class="menu-text">SIPAHAM</span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item-active" aria-haspopup="true" title="Pustaka Bimas Islam">
                                    <a href="#" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-book-open"></i>
                                        </span>
                                        <span class="menu-text">PUSBIM</span>
                                    </a>
                                </li>

                                <li class="menu-section">
                                    <h4 class="menu-text text-info user-select-none">Bina KUA & Keluarga Sakinah</h4>
                                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                                </li>
                                <div class="separator separator-dashed"></div>
                                <li class="menu-item menu-item-active" aria-haspopup="true" title="sistem informasi kepenghuluan">
                                    <a href="#" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-genderless"></i>
                                        </span>
                                        <span class="menu-text">SIK</span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item-active" aria-haspopup="true">
                                    <a href="<?= base_url('Emonev/index/'); ?>" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-chalkboard-teacher"></i>
                                        </span>
                                        <span class="menu-text">E-Monev</span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item-active" aria-haspopup="true">
                                    <a href="<?= base_url('Simpenghulu/index/'); ?>" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-handshake"></i>
                                        </span>
                                        <span class="menu-text">Simpenghulu</span>
                                    </a>
                                </li>

                                <li class="menu-section">
                                    <h4 class="menu-text text-info user-select-none">Penerangan Agama Islam</h4>
                                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                                </li>
                                <div class="separator separator-dashed"></div>
                                <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                    <a href="javascript:;" class="menu-link menu-toggle">
                                        <span class="svg-icon menu-icon">
                                            <i class="far fa-lightbulb"></i>
                                        </span>
                                        <span class="menu-text">Simpenais</span><i class="menu-arrow"></i>
                                    </a>
                                    <div class="menu-submenu" style="" kt-hidden-height="360">
                                        <i class="menu-arrow"></i>
                                        <ul class="menu-subnav">
                                            <li class="menu-item menu-item-parent" aria-haspopup="true">
                                                <span class="menu-link"><span class="menu-text">Simpenais</span></span>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?= base_url('PAI/Simpenais/index/'); ?>" class="menu-link menu-toggle">
                                                    <span class="menu-text">Penyuluh</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?= base_url('PAI/Majelis/index/'); ?>" class="menu-link menu-toggle">
                                                    <span class="menu-text">Majelis Taklim</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?= base_url('PAI/Seni_Islam/index/'); ?>" class="menu-link menu-toggle">
                                                    <span class="menu-text">Seni Islam</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?= base_url('PAI/Dakwah/index/'); ?>" class="menu-link menu-toggle">
                                                    <span class="menu-text">Lembaga Dakwah</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?= base_url('PAI/Ormas/index/'); ?>" class="menu-link menu-toggle">
                                                    <span class="menu-text">Ormas Islam</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?= base_url('PAI/Dewan/index/'); ?>" class="menu-link menu-toggle">
                                                    <span class="menu-text">Dewan Hakim</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?= base_url('PAI/Guru_ngaji/index/'); ?>" class="menu-link menu-toggle">
                                                    <span class="menu-text">Guru Ngaji</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?= base_url('PAI/LPTQ/index/'); ?>" class="menu-link menu-toggle">
                                                    <span class="menu-text">L P T Q</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?= base_url('PAI/Hafiz/index/'); ?>" class="menu-link menu-toggle">
                                                    <span class="menu-text">Hafidz</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?= base_url('PAI/Qari/index/'); ?>" class="menu-link menu-toggle">
                                                    <span class="menu-text">Qari</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?= base_url('PAI/Mufassir/index/'); ?>" class="menu-link menu-toggle">
                                                    <span class="menu-text">Mufassir</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?= base_url('PAI/Kaligrafer/index/'); ?>" class="menu-link menu-toggle">
                                                    <span class="menu-text">Kaligrafer</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?= base_url('PAI/Seniman/index/'); ?>" class="menu-link menu-toggle">
                                                    <span class="menu-text">Seniman</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?= base_url('PAI/Budayawan/index/'); ?>" class="menu-link menu-toggle">
                                                    <span class="menu-text">Budayawan</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?= base_url('PAI/Radio_Islam/index/'); ?>" class="menu-link menu-toggle">
                                                    <span class="menu-text">Radio Islam</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                            <li class="menu-item menu-item" aria-haspopup="true" data-menu-toggle="hover">
                                                <a href="<?= base_url('PAI/Penulis/index/'); ?>" class="menu-link menu-toggle">
                                                    <span class="menu-text">Penulis Islam</span><span class="menu-label"></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="menu-item menu-item-active" aria-haspopup="true" title="e-penyuluh agama islam">
                                    <a href="<?= base_url('PAI/Epai/index/'); ?>" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-bullhorn"></i>
                                        </span>
                                        <span class="menu-text">E-PAI</span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item-active" aria-haspopup="true" title="sistem aplikasi pendaftaran MTQ">
                                    <a href="#" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-book-reader"></i>
                                        </span>
                                        <span class="menu-text">E-MTQ</span>
                                    </a>
                                </li>

                                <li class="menu-section">
                                    <h4 class="menu-text text-info user-select-none">Pemberdayaan Zakat & Wakaf</h4>
                                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                                </li>
                                <div class="separator separator-dashed"></div>
                                <li class="menu-item menu-item-active" aria-haspopup="true" title="sistem informasi zakat">
                                    <a href="#" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-hand-holding-usd"></i>
                                        </span>
                                        <span class="menu-text">Simzat</span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item-active" aria-haspopup="true" title="sistem informasi wakaf">
                                    <a href="#" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-hand-holding-heart"></i>
                                        </span>
                                        <span class="menu-text">Siwak</span>
                                    </a>
                                </li>

                                <li class="menu-section">
                                    <h4 class="menu-text text-info user-select-none">SYSTEM</h4>
                                    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                                </li>
                                <li class="menu-item menu-item-active" aria-haspopup="true" title="sistem informasi wakaf">
                                    <a href="<?= base_url('Auth/Management/'); ?>" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-users-cog"></i>
                                        </span>
                                        <span class="menu-text">User Management</span>
                                    </a>
                                </li>
                                <li class="menu-item menu-item-active" aria-haspopup="true" title="sistem informasi wakaf">
                                    <a href="<?= base_url('Auth/Subdit/'); ?>" class="menu-link">
                                        <span class="svg-icon menu-icon">
                                            <i class="fas fa-code-branch"></i>
                                        </span>
                                        <span class="menu-text">Sub Direktorat</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                    <div id="kt_header" class="header header-fixed">
                        <div class="container-fluid d-flex align-items-stretch justify-content-between">
                            <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                                <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default"></div>
                            </div>
                            <div class="topbar">
                                <div class="dropdown" id="kt_quick_search_toggle">
                                    <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                                        <div class="btn btn-icon btn-clean btn-lg btn-dropdown mr-1"><span class="svg-icon svg-icon-xl svg-icon-primary"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24" /><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" /><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" /></g></svg></span></div>
                                    </div>
                                    <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                                        <div class="quick-search quick-search-dropdown" id="kt_quick_search_dropdown">
                                            <form method="get" class="quick-search-form">
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><span class="svg-icon svg-icon-lg"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24" /><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" /><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" /></g></svg></span></span>
                                                    </div><input type="text" class="form-control" placeholder="Search..." />
                                                    <div class="input-group-append"><span class="input-group-text"><i class="quick-search-close ki ki-close icon-sm text-muted"></i></span></div>
                                                </div>
                                            </form>
                                            <div class="quick-search-wrapper scroll" data-scroll="true" data-height="325" data-mobile-height="200"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="topbar-item">
                                    <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle"> <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span><span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{username}</span>
                                        <span class="symbol symbol-35 symbol-light-success">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <script src="https://cdn.maspriyambodo.com/Metronic/assets/plugins/global/plugins.bundle.js?v=7.0.6"></script>
                        <script src="https://cdn.maspriyambodo.com/Metronic/assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6"></script>
                        <script src="https://cdn.maspriyambodo.com/Metronic/assets/js/scripts.bundle.js?v=7.0.6"></script>
                        <script src="https://cdn.maspriyambodo.com/Metronic/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
                        <script src="https://cdn.maspriyambodo.com/Metronic/assets/js/pages/widgets.js"></script>
                        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/af-2.3.5/b-1.6.2/b-colvis-1.6.2/b-flash-1.6.2/b-html5-1.6.2/b-print-1.6.2/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.2/r-2.2.5/rg-1.1.2/rr-1.2.7/sc-2.0.2/sp-1.1.1/sl-1.3.1/datatables.min.css"/>
                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
                        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/af-2.3.5/b-1.6.2/b-colvis-1.6.2/b-flash-1.6.2/b-html5-1.6.2/b-print-1.6.2/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.2/r-2.2.5/rg-1.1.2/rr-1.2.7/sc-2.0.2/sp-1.1.1/sl-1.3.1/datatables.min.js"></script>
                        <!--<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.3.1/js/dataTables.fixedColumns.min.js"></script>-->
                        <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
                        <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
                        <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
                        <div class="d-flex flex-column-fluid"><div class="container">{content}</div></div>
                    </div>
                    <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
                        <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                            <div class="text-dark order-2 order-md-1"><span class="text-muted font-weight-bold mr-2">2020©</span><a href="https://kemenag.go.id" target="_blank" class="text-dark-75 text-hover-primary">RUDABI | Kementerian Agama RI</a></div>
                            <div class="nav nav-dark"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
            <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
                <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close"><i class="ki ki-close icon-xs text-muted"></i></a>
            </div>
            <div class="offcanvas-content pr-5 mr-n5">
                <div class="d-flex align-items-center mt-5">
                    <div class="symbol symbol-100 mr-5">
                        <i class="fas fa-user" style="font-size: 5.25rem;"></i>
                    </div>
                    <div class="d-flex flex-column">
                        <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{username}</a>
                        <div class="text-muted mt-1"></div>
                        <div class="navi mt-2">
                            <a href="#" class="navi-item"></a>
                            <a href="<?= base_url('Auth/Logout/'); ?>" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">
                                Sign Out
                            </a>
                        </div>
                    </div>
                </div>
                <div class="separator separator-dashed mt-8 mb-5"></div>
            </div>
        </div>
        <div id="kt_scrolltop" class="scrolltop"><span class="svg-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24" /><rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" /><path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" /></g></svg></span></div>
        <script>var KTAppSettings = {breakpoints: {sm: 576, md: 768, lg: 992, xl: 1200, xxl: 1200}, colors: {theme: {base: {white: "#ffffff", primary: "#6993FF", secondary: "#E5EAEE", success: "#1BC5BD", info: "#8950FC", warning: "#FFA800", danger: "#F64E60", light: "#F3F6F9", dark: "#212121"}, light: {white: "#ffffff", primary: "#E1E9FF", secondary: "#ECF0F3", success: "#C9F7F5", info: "#EEE5FF", warning: "#FFF4DE", danger: "#FFE2E5", light: "#F3F6F9", dark: "#D6D6E0"}, inverse: {white: "#ffffff", primary: "#ffffff", secondary: "#212121", success: "#ffffff", info: "#ffffff", warning: "#ffffff", danger: "#ffffff", light: "#464E5F", dark: "#ffffff"}}, gray: {"gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121"}}, "font-family": "Poppins"};</script>
    </body>

</html>