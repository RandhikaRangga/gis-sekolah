<div class="col-sm-12">
<?php
//notifikasi pesan data berhasil disimpan
if ($this->session->flashdata('pesan')) {
    echo '<div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
    echo $this->session->flashdata('pesan');
    echo '</div>';
}
?>
    <table class="table table-responsive table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Sekolah</th>
                <th>Jenjang Sekolah</th>
                <th>Alamat</th>
                <th>Status Sekolah</th>
                <th>Akreditasi</th>
                <th>Keterangan</th>
                <?php if ($this->session->userdata('username')<>"") { ?>
                <th>Action</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach ($sekolah as $key => $value) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $value->nama_sekolah ?></td>
                <td><?= $value->jenjang ?></td>
                <td><?= $value->alamat ?></td>
                <td><?= $value->status_sekolah ?></td>
                <td><?= $value->akreditasi ?></td>
                <td><?= $value->ket ?></td>
                <?php if ($this->session->userdata('username')<>"") { ?>
                    <td>
                        <a href="<?= base_url('sekolah/edit/'.$value->id_sekolah) ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= base_url('sekolah/hapus/'.$value->id_sekolah) ?>" class="btn btn-sm btn-danger" onClick="return confirm('Apakah Data Ingin Dihapus?')">Hapus</a>
                    </td>
                <?php } ?>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>