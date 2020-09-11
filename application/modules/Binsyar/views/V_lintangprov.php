<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-uppercase">data Lintang Kota provinsi {provinsi}</h5>
        </div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <a href="<?= base_url('Binsyar/Lintang/index/'); ?>" class="btn btn-light btn-shadow-hover"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">kota/kabupaten</th>
                        <th colspan="3">tempat</th>
                        <th rowspan="2">zona<br>waktu</th>
                        <th rowspan="2">ketinggian</th>
                    </tr>
                    <tr>
                        <th>lintang</th>
                        <th>bujur</th>
                        <th>maps</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
        var url = "https://simas.kemenag.go.id/rudabi/datapi/siihat/datalintang?nama_propinsi=<?= $id; ?>";
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
            "ajax": {
                dataSrc: '',
                method: "GET",
                async: false,
                url: url
            },
            columns: [
                {data: "city_title"},
                {data: "lintang_tempat", className: "text-center"},
                {data: "bujur_tempat", className: "text-center"},
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a, b, c, find, repl;
                        a = data.lintang_tempat;
                        b = data.bujur_tempat;
                        c = data.city_title;
                        find = ['°', ' ', '"'];
                        repl = ['%C2%B0', '+', '%22'];
                        find.forEach((tag, i) => a = a.replace(new RegExp(tag, "g"), repl[i]));
                        find.forEach((tag, i) => b = b.replace(new RegExp(tag, "g"), repl[i]));
                        return '<a href="https://www.google.com/maps/place/' + a + b + '" target="new" class="btn btn-icon btn-default btn-xs" title="Peta Lokasi ' + c + '"><i class="fas fa-map-marked-alt"></i></a>';
                    }
                },
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var a = data.time_zone;
                        return "GMT +" + a;
                    }
                },
                {data: "h", className: "text-center"}
            ]
        });
    };
</script>