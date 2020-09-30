<div class="row">
    <div class="col-md-6">
        <div class="card card-custom card-stretch" id="kt_page_stretched_card">
            <div class="card-header">
                <div class="card-title">
                    DIREKTORAT BINA KUA DAN KELUARGA SAKINAH
                </div>
            </div>
            <div class="card-body">
                <div class="card-scroll">
                    <div class="d-flex flex-wrap align-items-center mb-10">
                        <div class="symbol symbol-60 symbol-2by3 flex-shrink-0">
                            <div class="symbol-label">
                                <span class="svg-icon menu-icon"> <i class="fas fa-ring"></i> </span>
                            </div>
                        </div>
                        <div class="d-flex flex-column ml-4 flex-grow-1 mr-2">
                            <a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">
                                BIMWIN
                            </a>
                            <span class="text-muted font-weight-bold">Bimbingan Perkawinan</span>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap align-items-center mb-10">
                        <div class="symbol symbol-60 symbol-2by3 flex-shrink-0">
                            <div class="symbol-label">
                                <span class="svg-icon menu-icon"> <i class="fas fa-chalkboard-teacher"></i> </span>
                            </div>
                        </div>
                        <div class="d-flex flex-column ml-4 flex-grow-1 mr-2">
                            <a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">
                                e-MONEV
                            </a>
                            <span class="text-muted font-weight-bold">Sisem Aplikasi Monitoring KUA</span>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap align-items-center mb-10">
                        <div class="symbol symbol-60 symbol-2by3 flex-shrink-0">
                            <div class="symbol-label">
                                <span class="svg-icon menu-icon"> <i class="fas fa-genderless"></i> </span>
                            </div>
                        </div>
                        <div class="d-flex flex-column ml-4 flex-grow-1 mr-2">
                            <a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">
                                SIK
                            </a>
                            <span class="text-muted font-weight-bold">Sistem Informasi Kepenghuluan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-custom card-stretch" id="kt_page_stretched_card">
            <div class="card-header">
                <div class="card-title">
                    DIREKTORAT PEMBERDAYAAN ZAKAT DAN WAKAF
                </div>
            </div>
            <div class="card-body">
                <div class="card-scroll">
                    <div class="d-flex flex-wrap align-items-center mb-10">
                        <div class="symbol symbol-60 symbol-2by3 flex-shrink-0">
                            <div class="symbol-label">
                                <span class="svg-icon menu-icon"> <i class="fas fa-hand-holding-usd"></i> </span>
                            </div>
                        </div>
                        <div class="d-flex flex-column ml-4 flex-grow-1 mr-2">
                            <a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">
                                SIMZAT
                            </a>
                            <span class="text-muted font-weight-bold">Sistem Informasi Zakat</span>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap align-items-center mb-10">
                        <div class="symbol symbol-60 symbol-2by3 flex-shrink-0">
                            <div class="symbol-label">
                                <span class="svg-icon menu-icon"> <i class="fas fa-hand-holding-heart"></i> </span>
                            </div>
                        </div>
                        <div class="d-flex flex-column ml-4 flex-grow-1 mr-2">
                            <a href="#" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">
                                SIWAK
                            </a>
                            <span class="text-muted font-weight-bold">Sistem Informasi Wakaf</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clear" style="margin:5% 0px;"></div>

<script>


    var KTLayoutStretchedCard = function () {
        var _element;
        var _init = function () {
            var scroll = KTUtil.find(_element, '.card-scroll');
            var cardBody = KTUtil.find(_element, '.card-body');
            var cardHeader = KTUtil.find(_element, '.card-header');

            var height = KTLayoutContent.getHeight();

            height = height - parseInt(KTUtil.actualHeight(cardHeader));

            height = height - parseInt(KTUtil.css(_element, 'marginTop')) - parseInt(KTUtil.css(_element, 'marginBottom'));
            height = height - parseInt(KTUtil.css(_element, 'paddingTop')) - parseInt(KTUtil.css(_element, 'paddingBottom'));

            height = height - parseInt(KTUtil.css(cardBody, 'paddingTop')) - parseInt(KTUtil.css(cardBody, 'paddingBottom'));
            height = height - parseInt(KTUtil.css(cardBody, 'marginTop')) - parseInt(KTUtil.css(cardBody, 'marginBottom'));

            height = height - 3;

            KTUtil.css(scroll, 'height', height + 'px');
        };
        return {
            init: function (id) {
                _element = KTUtil.getById(id);

                if (!_element) {
                    return;
                }
                _init();
                KTUtil.addResizeHandler(function () {
                    _init();
                }
                );
            },

            update: function () {
                _init();
            }
        };
    }();
    if (typeof module !== 'undefined') {
        module.exports = KTLayoutStretchedCard;
    }


</script>