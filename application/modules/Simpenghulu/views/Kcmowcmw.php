<style>
    #chartdiv {
        width: 100%;
        height: 600px;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th>
                            nama
                        </th>
                        <th>
                            usia
                        </th>
                        <th>
                            tempat<br>tanggal lahir
                        </th>
                        <th>
                            agama
                        </th>
                        <th>
                            golongan
                        </th>
                        <th>
                            pendidikan
                        </th>
                        <th>
                            tmt<br>capeg
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
            "colReorder": true,
            "order": [[0, "asc"]],
            "paging": true,
            "ordering": true,
            "info": true,
            "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
            "processing": true,
            "deferRender": true,
            "ajax": {
                dataSrc: '',
                method: "GET",
                async: false,
                url: "https://simas.kemenag.go.id/rudabi/datapi/simpenghulu/penghulu?city_id=<?= $id ?>"
            },
            columns: [
                {data: "nama"},
                {
                    data: null, className: 'text-center',
                    "render": function (data) {
                        var dob = moment().diff(moment(data.lahir, 'YYYY-MM-DD'), 'years');
                        return dob;
                    }
                },
                {
                    data: null, className: 'text-center', orderable: false,
                    "render": function (data) {
                        var dob = new Date(data.lahir);
                        return data.tempat + '<br>' +  moment(dob).format('D MMMM YYYY');
                    }
                },
                {data: "agama", className: 'text-center'},
                {data: "pangkat", className: 'text-center text-uppercase'},
                {data: "pendidikan", className: 'text-center'},
                {data: "tgl_sk", className: 'text-center'}
            ]
        });
    };
</script>