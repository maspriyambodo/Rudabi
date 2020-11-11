<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Data Hisab Laporan tahun <?= date('Y'); ?></h5>
        </div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <div class="text-uppercase">
                data Hisab Laporan per provinsi
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>provinsi</th>
                        <th>pengukuran</th>
                        <th>terlihat</th>
                        <th>non<br>terlihat</th>
                        <th>muharram</th>
                        <th>safar</th>
                        <th>rabiul awal</th>
                        <th>rabiul akhir</th>
                        <th>jumadal<br>awal</th>
                        <th>jumadal<br>akhir</th>
                        <th>rajab</th>
                        <th>syakban</th>
                        <th>ramadhan</th>
                        <th>syawal</th>
                        <th>zulkadah</th>
                        <th>zulhijjah</th>
                    </tr>
                </thead>
                <tfoot class="text-center text-uppercase">
                    <tr>
                        <th>jumlah</th>
                        <th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
        var url = "https://simas.kemenag.go.id/rudabi/datapi/siihat/hisablaporan?KEY=BOBA";
        $('table').dataTable({
            "ServerSide": true,
            "order": [[0, "asc"]],
            "paging": false,
            "ordering": true,
            "info": true,
            "processing": true,
            "deferRender": true,
            "scrollCollapse": true,
            "scrollX": true,
            "scrollY": "400px",
            dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
                        <'row'<'col-sm-12'tr>>
                        <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,

            buttons: [
                {extend: 'print', footer: true},
                {extend: 'copyHtml5', footer: true},
                {extend: 'excelHtml5', footer: true},
                {extend: 'csvHtml5', footer: true},
                {extend: 'pdfHtml5', footer: true}
            ],
            "fixedColumns": {
                leftColumns: 1
            },
            "ajax": {
                dataSrc: '',
                method: "GET",
                async: false,
                url: url
            },
            columns: [
                {data: "province_title"},
                {data: "jum_pengukuran", className: "text-center jum_pengukuran"},
                {data: "jum_terlihat", className: "text-center jum_terlihat"},
                {data: "jum_nonterlihat", className: "text-center jum_nonterlihat"},
                {data: "bln_muharram", className: "text-center bln_muharram"},
                {data: "bln_safar", className: "text-center bln_safar"},
                {data: "bln_rabiulawal", className: "text-center bln_rabiulawal"},
                {data: "bln_rabiulakhir", className: "text-center bln_rabiulakhir"},
                {data: "bln_jumadalula", className: "text-center bln_jumadalula"},
                {data: "bln_jumadalakhirah", className: "text-center bln_jumadalakhirah"},
                {data: "bln_rajab", className: "text-center bln_rajab"},
                {data: "bln_syakban", className: "text-center bln_syakban"},
                {data: "bln_ramadan", className: "text-center bln_ramadan"},
                {data: "bln_syawal", className: "text-center bln_syawal"},
                {data: "bln_zulkadah", className: "text-center bln_zulkadah"},
                {data: "bln_zulhijjah", className: "text-center bln_zulhijjah"}
            ],
            footerCallback: function () {
                var api = this.api();
                var numFormat = $.fn.dataTable.render.number('\.', '', 0, '').display;
                api.columns(['.jum_pengukuran', '.jum_terlihat', '.jum_nonterlihat', '.bln_muharram', '.bln_safar', '.bln_rabiulawal', '.bln_rabiulakhir', '.bln_jumadalula', '.bln_jumadalakhirah', '.bln_rajab', '.bln_syakban', '.bln_ramadan', '.bln_syawal', '.bln_zulkadah', '.bln_zulhijjah'], {page: 'all'}).every(function () {
                    var sum = this
                            .data()
                            .reduce(function (a, b) {
                                var x = parseFloat(a) || 0;
                                var y = parseFloat(b) || 0;
                                return x + y;
                            }, 0);
                    $(this.footer()).html(numFormat(sum));
                });
            }
        });
    };
</script>