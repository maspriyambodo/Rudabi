<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="<?= base_url(); ?>">
        <meta charset="utf-8" />
        <title>Login System</title>
        <meta name="description" content="Login System" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <link href="https://cdn.maspriyambodo.com/Metronic/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.maspriyambodo.com/Metronic/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.maspriyambodo.com/Metronic/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.maspriyambodo.com/Metronic/assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.maspriyambodo.com/Metronic/assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.maspriyambodo.com/Metronic/assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.maspriyambodo.com/Metronic/assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="https://kemenag.go.id/public/images/icon.png" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/css/login-1.css" rel="stylesheet" type="text/css" />
    </head>
    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
        <div class="d-flex flex-column flex-root">
            <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-row-fluid owl-carousel" id="kt_login">
                <div class="login-aside d-flex flex-row-auto flex-grow-1">
                    <div class="d-flex flex-row-fluid flex-column login-img-bg"></div>
                </div>
                <div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 ml-auto mr-auto">
                    <div class="d-flex flex-column-fluid flex-center mt-6 mt-lg-0">
                        <div class="login-form login-signin">
                            <a href="#" class="text-center nav-brand"> <img src="https://simas.kemenag.go.id/assets/img/rudabilogo.png" style="width:70%;" alt="Rudabi Logo" /> </a>
                            <h3 class="login-title">Sign in to system</h3>
                            <form class="form" novalidate="novalidate" id="kt_login_signin_form" action="<?= base_url('Auth/Login/'); ?>" method="post">
                                <div class="form-group">
                                    <label class="font-size-h6 font-weight-bolder text-dark">Username</label>
                                    <input class="form-control form-control-solid h-auto rounded-md" type="text" name="username" autocomplete="off" required=""/>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex justify-content-between mt-n5">
                                        <label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
                                        <a href="javascript:" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" id="kt_login_forgot">
                                            Forgot Password ?
                                        </a>
                                    </div>
                                    <input class="form-control form-control-solid h-auto rounded-md" type="password" name="password" autocomplete="off" required="" />
                                </div>
                                <div class="pb-lg-0 pb-10">
                                    <input type="hidden" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>"/>
                                    <?= $this->session->flashdata('error'); ?>
                                    <button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign In</button>
                                </div>
                            </form>
                            <div class="login-footer"><?= $this->bodo->Since(); ?> &copy; RUDABI | Ditjen Bimas Islam</div>
                        </div>
                        <div class="login-form login-forgot">
                            <form class="form" novalidate="novalidate" id="kt_login_forgot_form">
                                <div class="text-center pt-lg-40 mt-lg-20 pb-15">
                                    <h3 class="font-weight-bolder text-dark display5">Forgotten Password ?</h3>
                                    <p class="text-muted font-weight-bold font-size-h4">Enter your email to reset your password</p>
                                </div>
                                <div class="form-group"> <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="email" placeholder="Email" name="email" autocomplete="off" /> </div>
                                <div class="form-group d-flex flex-wrap flex-center pb-lg-0">
                                    <button type="button" id="kt_login_forgot_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">Submit</button> 
                                    <button type="button" id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.maspriyambodo.com/Metronic/assets/plugins/global/plugins.bundle.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
        <script>var a = "<?= $this->session->flashdata('gagal'); ?>"; if (a === ""){} else{toastr.options = {closeButton:true, debug:false, newestOnTop:false, progressBar:false, positionClass:"toast-top-full-width", preventDuplicates:false, onclick:null, showDuration:"300", hideDuration:"1000", timeOut:"5000", extendedTimeOut:"1000", showEasing:"swing", hideEasing:"linear", showMethod:"fadeIn", hideMethod:"fadeOut"}; toastr.error(a)}var KTAppSettings = {breakpoints:{sm:576, md:768, lg:992, xl:1200, xxl:1200}, colors:{theme:{base:{white:"#ffffff", primary:"#6993FF", secondary:"#E5EAEE", success:"#1BC5BD", info:"#8950FC", warning:"#FFA800", danger:"#F64E60", light:"#F3F6F9", dark:"#212121"}, light:{white:"#ffffff", primary:"#E1E9FF", secondary:"#ECF0F3", success:"#C9F7F5", info:"#EEE5FF", warning:"#FFF4DE", danger:"#FFE2E5", light:"#F3F6F9", dark:"#D6D6E0"}, inverse:{white:"#ffffff", primary:"#ffffff", secondary:"#212121", success:"#ffffff", info:"#ffffff", warning:"#ffffff", danger:"#ffffff", light:"#464E5F", dark:"#ffffff"}}, gray:{"gray-100":"#F3F6F9", "gray-200":"#ECF0F3", "gray-300":"#E5EAEE", "gray-400":"#D6D6E0", "gray-500":"#B5B5C3", "gray-600":"#80808F", "gray-700":"#464E5F", "gray-800":"#1B283F", "gray-900":"#212121"}}, "font-family":"Poppins"};</script>
        <script src="https://cdn.maspriyambodo.com/Metronic/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
        <script src="https://cdn.maspriyambodo.com/Metronic/assets/js/scripts.bundle.js"></script>
        <script src="https://cdn.maspriyambodo.com/Metronic/assets/js/pages/custom/login/login.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    </body>

</html>