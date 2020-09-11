<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"> Data KUA Provinsi {prov} tahun <?= date('Y'); ?> </h5>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>
                            Kepala KUA
                        </th>
                        <th>kanwil</th>
                        <th>kabupaten</th>
                        <th>alamat</th>
                        <th>telepon</th>
                    </tr>
                </thead>
            </table>
        </div>  
    </div>
</div>
<script src="https://cdn.amcharts.com/lib/4/plugins/venn.js"></script>
<script>
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
            url: "https://simas.kemenag.go.id/rudabi/datapi/monev?kodekua={id}"
        },
        columns: [
            {data: "kepala"},
            {data: "kua"},
            {data: "kabupaten"},
            {data: "alamat"},
            {data: "tlp"}
        ]
    });
</script>