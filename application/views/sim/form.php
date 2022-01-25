<div class="card-body">
    <?= $this->session->flashdata('message') ?>
    <?php unset($_SESSION['message']) ?>
    <?php
    $nama_edit = '';
    $no_regist_edit = '';
    $umur_edit = '';
    $golongan_edit = '';
    $jenis_pemohon_edit = '';
    $tanggal_pembuatan_edit = '';
    $jenis_kelamin_edit = '';
    $pekerjaan_edit = '';
    $alamat_edit = '';
    if ($edit_sim) {
        $no_regist_edit = $edit_sim['no_register'];
        $nama_edit = $edit_sim['nama'];
        $umur_edit = $edit_sim['umur'];
        $golongan_edit = $edit_sim['golongan'];
        $jenis_pemohon_edit = $edit_sim['jenis_pemohon'];
        $tanggal_pembuatan_edit = $edit_sim['tanggal_pembuatan'];
        $jenis_kelamin_edit = $edit_sim['jenis_kelamin'];
        $pekerjaan_edit = $edit_sim['pekerjaan'];
        $alamat_edit = $edit_sim['alamat'];
    }
    ?>
    <form action="<?= base_url('sim/') . $type == 'add' ?? 'edit/' . $type ?>" method="post">

        <!-- No Register -->
        <div class="form-group">
            <label for="no_regist">No Register</label>
            <input type="text" name="no_regist" class="form-control <?= form_error('no_regist') ? '  is-invalid' : '' ?>" value="<?= set_value('no_regist') ? set_value('no_regist') : $no_regist_edit ?>" <?= $type == 'edit' ? 'disabled' : '' ?> placeholder="12345">
            <div class="invalid-feedback"><?= form_error('no_regist') ?></div>
        </div>
        <!-- Nama -->
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control <?= form_error('nama') ? '  is-invalid' : '' ?>" value="<?= set_value('nama') ? set_value('nama') : $nama_edit ?>" placeholder="Alexander">
            <div class="invalid-feedback"><?= form_error('nama') ?></div>
        </div>

        <!-- GOLONGAN -->
        <div class="form-group">
            <label for="golongan">Pilih Golongan</label>
            <?php if ($type == 'add') : ?>
                <select class="custom-select<?= form_error('golongan') ? ' is-invalid' : '' ?>" name="golongan" aria-label="Default select example">
                    <option selected disabled>-- Pilih Golongan --</option>
                    <?php foreach ($golongan as $row) : ?>
                        <option value="<?= $row['golongan_id'] ?>"><?= $row['golongan'] ?></option>
                    <?php endforeach; ?>
                </select>
            <?php else : ?>
                <input class="form-control" disabled value="<?= $golongan_edit ?>">
            <?php endif; ?>
            <div class="invalid-feedback"><?= form_error('golongan') ?></div>
        </div>
        <!-- jenis_pemohon -->
        <div class="form-group">
            <label for="jenis_pemohon">Pilih Jenis Pemohon</label>
            <?php if ($type == 'add') : ?>
                <select class="custom-select<?= form_error('jenis_pemohon') ? ' is-invalid' : '' ?>" name="jenis_pemohon" aria-label="Default select example">
                    <option selected disabled>-- Pilih Jenis Pemohon --</option>
                    <?php foreach ($jenis_pemohon as $row) : ?>
                        <option value="<?= $row['jenis_pemohon_id'] ?>"><?= $row['jenis_pemohon'] ?></option>
                    <?php endforeach; ?>
                </select>
            <?php else : ?>
                <input class="form-control" disabled value="<?= $jenis_pemohon_edit ?>">
            <?php endif; ?>
            <div class="invalid-feedback"><?= form_error('golongan') ?></div>
        </div>

        <!-- tanggal -->
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" class="form-control <?= form_error('tanggal') ? '  is-invalid' : '' ?>" value="<?= set_value('tanggal') ? set_value('tanggal') : $tanggal_pembuatan_edit ?>" placeholder="Alexander">
            <div class="invalid-feedback"><?= form_error('tanggal') ?></div>
        </div>
        <!-- umur -->
        <div class="form-group">
            <label for="umur">Umur</label>
            <input type="number" name="umur" class="form-control <?= form_error('umur') ? '  is-invalid' : '' ?>" value="<?= set_value('umur') ? set_value('umur') : $umur_edit ?>" placeholder="0">
            <div class="invalid-feedback"><?= form_error('umur') ?></div>
        </div>

        <!-- Jenis kelamin -->
        <div class="form-group">
            <label for="umur">Jenis Kelamin</label>
            <div class="form-check">
                <input value="Laki-Laki" class="form-check-input" type="radio" name="jenis_kelamin" <?= $jenis_kelamin_edit == 'Laki-Laki' ? 'checked' : '' ?>>
                <label class="form-check-label">Laki Laki</label>
            </div>
            <div class="form-check">
                <input value="Perempuan" class="form-check-input" type="radio" <?= $jenis_kelamin_edit == 'Perempuan' ? 'checked' : '' ?> name="jenis_kelamin">
                <label class="form-check-label">Perempuan</label>
            </div>
        </div>
        <!-- pekerjaan -->
        <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            <input type="text" name="pekerjaan" class="form-control <?= form_error('pekerjaan') ? '  is-invalid' : '' ?>" value="<?= set_value('pekerjaan') ? set_value('pekerjaan') : $pekerjaan_edit ?>" placeholder="Pegawai Negri">
            <div class="invalid-feedback"><?= form_error('pekerjaan') ?></div>
        </div>
        <!-- alamat -->
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <?php $data = [
                'name'      => 'alamat',
                'value'     => set_value('alamat') ? set_value('alamat') : $alamat_edit,
                'rows'      => '4',
                'class'     => form_error('alamat') ? 'form-control is-invalid' : 'form-control',
            ];
            echo form_textarea($data); ?>
            <div class="invalid-feedback"><?= form_error('alamat') ?></div>
        </div>

        <input type="text" name="type" value="<?= $type ?>" hidden />
        <button class="btn btn-primary float-right">Simpan</button>
    </form>

</div>
<!-- /.card-body -->