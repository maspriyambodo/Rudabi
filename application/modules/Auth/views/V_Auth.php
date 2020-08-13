<!DOCTYPE html>
<html lang="en">

    <head>
        <base href="<?= base_url(); ?>">
        <meta charset="utf-8" />
        <title>Login System</title>
        <meta name="description" content="Login System" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <link href="https://cdn.maspriyambodo.com/Metronic/assets/css/pages/login/login-1.css" rel="stylesheet" type="text/css" />
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
    </head>

    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
        <div class="d-flex flex-column flex-root">
            <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-row-fluid bg-white owl-carousel" id="kt_login">
                <div class="login-aside d-flex flex-row-auto px-lg-0 px-5 pb-sm-40 pb-lg-40 flex-grow-1" style="background-repeat:no-repeat;background-position:bottom;background-image:url(https://cdn.maspriyambodo.com/Metronic/assets/media/svg/illustrations/login-visual-1.svg)">
                    <div class="d-flex flex-row-fluid flex-column mt-lg-30 mb-lg-0 pb-lg-0 mb-20 pb-40 mt-0 pt-15"> <a href="#" class="text-center mb-10"> <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Kementerian_Agama_new_logo.png" style="width:125px;" alt="Kemenag RI Logo" /> </a>
                        <h3 class="font-weight-bolder text-center display5 pb-lg-0 pb-40">RUDABI<br />Rumah Data Bimas Islam</h3>
                    </div>
                </div>
                <div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 ml-auto mr-auto">
                    <div class="d-flex flex-column-fluid flex-center mt-6 mt-lg-0">
                        <div class="login-form login-signin">
                            <form class="form" novalidate="novalidate" id="kt_login_signin_form" action="<?= base_url('Auth/Login/'); ?>" method="POST">
                                <div class="pt-lg-40 mt-lg-10 pb-15">
                                    <h3 class="font-weight-bolder text-dark display5">Sign in to system</h3>
                                </div>
                                <div class="form-group">
                                    <label class="font-size-h6 font-weight-bolder text-dark">Username</label>
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="text" name="username" autocomplete="off" required=""/>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex justify-content-between mt-n5">
                                        <label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
                                        <a href="javascript:" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" id="kt_login_forgot">
                                            Forgot Password ?
                                        </a>
                                    </div>
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg" type="password" name="password" autocomplete="off" required="" />
                                </div>
                                <div class="pb-lg-0 pb-10">
                                    <input type="hidden" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>"/>
                                    <button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign In</button>
                                </div>
                            </form>
                        </div>
                        <div class="login-form login-signup">
                            <form class="form" novalidate="novalidate" id="kt_login_signup_form">
                                <div class="text-center pt-lg-30 pb-15">
                                    <h3 class="font-weight-bolder text-dark display5">Sign Up</h3>
                                    <p class="text-muted font-weight-bold font-size-h4">Enter your details to create your account</p>
                                </div>
                                <div class="form-group"> <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="text" placeholder="Fullname" name="fullname" autocomplete="off" /> </div>
                                <div class="form-group"> <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="email" placeholder="Email" name="email" autocomplete="off" /> </div>
                                <div class="form-group"> <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="password" placeholder="Password" name="password" autocomplete="off" /> </div>
                                <div class="form-group"> <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6" type="password" placeholder="Confirm password" name="cpassword" autocomplete="off" /> </div>
                                <div class="form-group"> <label class="checkbox mb-0"> <input type="checkbox" name="agree" />I Agree the <a href="#">terms and conditions</a>. <span></span></label> </div>
                                <div class="form-group d-flex flex-wrap flex-center pb-lg-0 pb-3"> <button type="button" id="kt_login_signup_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">Submit</button> <button type="button" id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mx-4">Cancel</button>                                </div>
                            </form>
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
        <script>
            window.onload = function () {
                $('.owl-carousel').owlCarousel();
                var a = '<?= $this->session->flashdata('message') ?>';
                var b = '<?= $this->session->flashdata('error') ?>';
                if (a !== '') {
                    toastr.success(a);
                } else if (b !== '') {
                    toastr.success(b);
                } else {
                    return false;
                }
            };
            var KTAppSettings = {
                breakpoints: {
                    sm: 576,
                    md: 768,
                    lg: 992,
                    xl: 1200,
                    xxl: 1200
                },
                colors: {
                    theme: {
                        base: {
                            white: "#ffffff",
                            primary: "#6993FF",
                            secondary: "#E5EAEE",
                            success: "#1BC5BD",
                            info: "#8950FC",
                            warning: "#FFA800",
                            danger: "#F64E60",
                            light: "#F3F6F9",
                            dark: "#212121"
                        },
                        light: {
                            white: "#ffffff",
                            primary: "#E1E9FF",
                            secondary: "#ECF0F3",
                            success: "#C9F7F5",
                            info: "#EEE5FF",
                            warning: "#FFF4DE",
                            danger: "#FFE2E5",
                            light: "#F3F6F9",
                            dark: "#D6D6E0"
                        },
                        inverse: {
                            white: "#ffffff",
                            primary: "#ffffff",
                            secondary: "#212121",
                            success: "#ffffff",
                            info: "#ffffff",
                            warning: "#ffffff",
                            danger: "#ffffff",
                            light: "#464E5F",
                            dark: "#ffffff"
                        }
                    },
                    gray: {
                        "gray-100": "#F3F6F9",
                        "gray-200": "#ECF0F3",
                        "gray-300": "#E5EAEE",
                        "gray-400": "#D6D6E0",
                        "gray-500": "#B5B5C3",
                        "gray-600": "#80808F",
                        "gray-700": "#464E5F",
                        "gray-800": "#1B283F",
                        "gray-900": "#212121"
                    }
                },
                "font-family": "Poppins"
            };
        </script>
        <script src="https://cdn.maspriyambodo.com/Metronic/assets/plugins/global/plugins.bundle.js"></script>
        <script src="https://cdn.maspriyambodo.com/Metronic/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
        <script src="https://cdn.maspriyambodo.com/Metronic/assets/js/scripts.bundle.js"></script>
        <script src="https://cdn.maspriyambodo.com/Metronic/assets/js/pages/custom/login/login.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    </body>

</html>