<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th rowspan="2">
                            kecamatan
                        </th>
                        <th rowspan="2">
                            nama
                        </th>
                        <th rowspan="2">
                            Jenis<br>Kelamin
                        </th>
                        <th colspan="2">
                            lahir
                        </th>
                    </tr>
                    <tr>
                        <th>
                            tempat
                        </th>
                        <th>
                            tanggal
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
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
                url: "https://simas.kemenag.go.id/rudabi/datapi/epay/penyuluh?penyuluh_KabKota_Kode=%27<?= $kode; ?>%27"
            },
            columns: [
                {data: "penyuluh_Kecamatan"},
                {data: "penyuluh_Nama"},
                {
                    data: null, className: "text-center", render: function (data) {
                        var a = data.penyuluh_JK;
                        var b;
                        if (a === "L") {
                            b = "LAKI-LAKI";
                        } else if (a === "P") {
                            b = "PEREMPUAN";
                        } else {
                            b = '';
                        }
                        return b;
                    }
                },
                {data: "penyuluh_TempatLahir", className: "text-center"},
                {data: "penyuluh_TanggalLahir", className: "text-center"}
            ]
        });
    };
</script>