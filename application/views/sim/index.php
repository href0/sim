<div class="card">
    <div class="card-header">
        <!-- <?= $this->session->flashdata('message') ?>
        <?php unset($_SESSION['message']) ?> -->
        <div id="message"></div>
        <div class="float-sm-right">
            <a href="<?= base_url('sim/add') ?>" class="btn btn-primary">+ Tambah</a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Register</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Umur</th>
                    <th>Golongan SIM</th>
                    <th>Jenis Pemohon</th>
                    <th>Pekerjaan</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($table as $row) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['no_register'] ?></td>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['umur'] ?></td>
                        <td><?= $row['jenis_kelamin'] ?></td>
                        <td><?= $row['golongan'] ?></td>
                        <td><?= $row['jenis_pemohon'] ?></td>
                        <td><?= $row['pekerjaan'] ?></td>
                        <td><?= $row['alamat'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td>
                            <a href="<?= base_url('sim/edit/') . $row['sim_id'] ?>" class="btn btn-success">Ubah</a>
                            <button data-toggle="modal" data-id="<?= $row['no_register'] ?>" class="btn btn-warning tambah_golongan">Tambah Golongan</button>
                            <button data-id="<?= $row['sim_id'] ?>" class="btn btn-info ubah-status">Ubah Status</button>
                            <!-- <a href="<?= base_url('sim/addgolongan/') . $row['sim_id'] ?>" class="btn btn-warning">Tambah Golongan</a> -->
                            <a onClick="return confirm('Yakin ingin menghapus sim ini ?')" href="<?= base_url('sim/delete/') . $row['sim_id'] ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>

<!-- /.card -->

<!-- MODAL -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Golongan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formAddGolongan" action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="golongan">Pilih Golongan</label>
                        <select class="custom-select<?= form_error('golongan') ? ' is-invalid' : '' ?>" name="golongan" aria-label="Default select example">
                            <option selected disabled>-- Pilih Golongan --</option>
                            <?php foreach ($golongan as $row) : ?>
                                <option value="<?= $row['golongan_id'] ?>"><?= $row['golongan'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-ubah-status">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Status</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formUbahStatus" action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="status">Pilih Status</label>
                        <select class="custom-select" name="status" aria-label="Default select example">
                            <option selected disabled>-- Pilih Status --</option>
                            <option value="perpanjang">Perpanjang</option>
                            <option value="hilang">Hilang</option>
                            <option value="rusak">Rusak</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>