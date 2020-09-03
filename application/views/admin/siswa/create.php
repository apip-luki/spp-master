<?= form_open_multipart(base_url('admin/siswa/create_sis')); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header">
                    Tambah Siswa Baru
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <label>NISN <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nisn" value="<?= set_value('nisn') ?>">
                                <?= form_error('nisn', '<span class="text-danger">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>NIS <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nis" value="<?= set_value('nis') ?>">
                                <?= form_error('nis', '<span class="text-danger">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Nama <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" class="form-control" name="nama" value="<?= set_value('nama') ?>">
                                <?= form_error('nama', '<span class="text-danger">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Kelas <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <select name="id_kelas" class="form-control">
                                    <option></option>
                                    <?php foreach ($kelas as $kelas) { ?>
                                    <option value="<?= $kelas->id_kelas; ?>"><?= $kelas->nama_kelas; ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('id_kelas', '<span class="text-danger">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Alamat <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <textarea class="form-control" name="alamat" id="editor"
                                    value="<?= set_value('alamat') ?>"></textarea>
                                <?= form_error('alamat', '<span class="text-danger">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>No Telp <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" maxlength="13" class="form-control" name="no_telp"
                                    value="<?= set_value('no_telp') ?>">
                                <?= form_error('no_telp', '<span class="text-danger">', '</span>'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Tahun SPP <span class="text-danger">*</span></label>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <select name="id_spp" class="form-control">
                                    <option></option>
                                    <?php foreach ($spp as $spp) { ?>
                                    <option value="<?= $spp->id_spp; ?>"><?= $spp->tahun; ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('id_spp', '<span class="text-danger">', '</span>'); ?>
                            </div>
                        </div>
                    </div>

                    <input type="text" name="bulan" value="2020-01-10" hidden>

                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i>
                            Simpan Siswa</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<?= form_close(); ?>