<div class="card">
    <div class="card-header">
        <!-- <?= $this->session->flashdata('message') ?>
        <?php unset($_SESSION['message']) ?> -->
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
                        <td>
                            <a href="<?= base_url('sim/edit/') . $row['sim_id'] ?>" class="btn btn-success">Ubah</a>
                            <a href="#" class="btn btn-warning">Tambah Golongan</a>
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