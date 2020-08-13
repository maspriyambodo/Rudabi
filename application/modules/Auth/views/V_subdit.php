<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<div class="card card-custom">
    <div class="card-body">
        <form action="<?= base_url('Auth/Subdit_save/'); ?>" method="post">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead class="text-center text-uppercase">
                        <tr>
                            <th>Direktorat</th>
                            <th>keterangan</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" name="nama" class="form-control" required="" autocomplete="off"/>
                            </td>
                            <td>
                                <textarea name="keterangan" class="form-control"></textarea>
                            </td>
                            <td class="text-center">
                                <input type="hidden" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>"/>
                                <button type="submit" class="btn btn-icon btn-success btn-xs"><i class="fas fa-save"></i></button>
                            </td>
                        </tr>
                        <?php foreach ($subdit as $subdit_data) { ?>
                            <tr>
                                <td>
                                    <?= $subdit_data->nama; ?>
                                </td>
                                <td>
                                    <?= $subdit_data->keterangan; ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <?php $id_subdit = str_replace(['+', '/', '='], ['-', '_', '~'], $this->encryption->encrypt($subdit_data->id)); ?>
                                        <button type="button" class="btn btn-icon btn-warning btn-xs" title="Edit data" data-toggle="modal" data-target="#Editmodal" onclick="Edit('<?= $id_subdit ?>')"><i class="fas fa-pencil-alt"></i></button>
                                        <button type="button" class="btn btn-icon btn-danger btn-xs" title="Hapus data" data-toggle="modal" data-target="#Hapusmodal" onclick="Hapus('<?= $id_subdit ?>')"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>
<div class="modal" id="Editmodal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center text-uppercase">Edit data</h4>
            </div>
            <form action="<?= base_url('Auth/Subdit_update/'); ?>" method="POST">
                <input type="hidden" name="e_id" readonly=""/>
                <input type="hidden" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>"/>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-uppercase">nama direktorat</label>
                        <input type="text" name="e_nama" class="form-control" required="" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <label class="text-uppercase">keterangan</label>
                        <textarea name="e_keterangan" class="form-control" rows="4"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger text-uppercase" data-dismiss="modal">cancel</button>
                        <button type="submit" class="btn btn-success text-uppercase">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal" id="Hapusmodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center text-uppercase">hapus data subdit</h4>
            </div>
            <form method="post" action="<?= base_url('Auth/Subdit_Delete/'); ?>">
                <div class="modal-body">
                    <input type="hidden" name="h_id" readonly="readonly"/>
                    <p class="text-warning">
                        anda yakin ingin hapus data?
                    </p>
                    <small class="text-danger">* data yang dihapus tidak dapat dikembalikan !</small>
                </div>
                <div class="modal-footer">
                    <div class="text-center">
                        <input type="hidden" name="<?= $csrf['name'] ?>" value="<?= $csrf['hash'] ?>"/>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger text-uppercase" data-dismiss="modal">cancel</button>
                            <button type="submit" class="btn btn-success text-uppercase">Delete</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
        $('table').dataTable();
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
    function Edit(obj) {
        $.ajax({
            url: "<?= base_url('Auth/Get_subdit/'); ?>" + obj,
            dataType: 'JSON',
            success: function (data) {
                $('input[name=e_id]').val(obj);
                $('input[name=e_nama]').val(data[0].nama);
                $('textarea[name=e_keterangan]').val(data[0].keterangan);
            },
            error: function () {
                alert('Fatal Error !');
                location.reload();
            }
        });
    }
    function Hapus(obj) {
        $.ajax({
            url: "<?= base_url('Auth/Get_subdit/'); ?>" + obj,
            dataType: 'JSON',
            success: function () {
                $('input[name=h_id]').val(obj);
            },
            error: function () {
                alert('Fatal Error !');
                location.reload();
            }
        });
    }
</script>