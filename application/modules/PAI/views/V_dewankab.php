<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5 text-uppercase">data dewan hakim {kabupaten}</h5>
        </div>
    </div>
</div>
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <button type="button" class="btn btn-light btn-shadow-hover" onclick="Back()"><i class="fas fa-arrow-left"></i> Kembali</button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped" style="width:100%;">
                <thead class="text-uppercase text-center">
                    <tr>
                        <th rowspan="2">nama</th>
                        <th rowspan="2">jenis<br>kelamin</th>
                        <th colspan="3">lahir</th>
                        <th rowspan="2">status<br>kawin</th>
                        <th rowspan="2">pendidikan</th>
                    </tr>
                    <tr>
                        <th>
                            tempat
                        </th>
                        <th>
                            tanggal
                        </th>
                        <th>
                            usia
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script>
    function Back() {
        window.history.back();
    }
    function Detail(id) {
        alert(id);
    }
    window.onload = function () {
        var url = "https://simas.kemenag.go.id/rudabi/datapi/simpenaiss/dewan?KEY=BOBA&city_id=<?= $id; ?>";
        $('table').dataTable({
            "ServerSide": true,
            "order": [[0, "asc"]],
            "paging": true,
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
                {data: "dewan_nama"},
                {data: "dewan_jenis_kelamin", className: "text-center"},
                {data: "dewan_tmp_lahir", className: "text-center"},
                {data: "dewan_tgl_lahir", className: "text-center"},
                {
                    data: null, className: "text-center",
                    render: function (data) {
                        var dob = data.dewan_tgl_lahir;
                        var age = moment().diff(moment(dob, 'YYYY-MM-DD'), 'years');
                        return age;
                    }
                },
                {data: "dewan_status_kawin", className: "text-center"},
                {data: "dewan_pendidikan", className: "text-center"}
            ]
        });
    };
</script>